<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $_imgDir = 'media/';
    protected $_imgThumbDir = 'media/thumbnail/';
    protected $_defaultThumbnail = '';

    public function index(Request $request)
    {
        /* @var $s3 \Illuminate\Filesystem\FilesystemAdapter */
        $s3 = \Storage::disk('s3');

        $filterName = $request->exists('filter_name') ? $request->filter_name : '';
        $filterDate = $request->exists('filter_date') ? $request->filter_date : '';
        $filterType = $request->exists('filter_type') ? $request->filter_type : '';

        $media = Media::query();
        if ($filterName != '') $media->where('name', 'like', "%{$filterName}%");
        if ($filterDate != '') $media->where('c_date', 'like', "%{$filterDate}%");
        if ($filterType != '') $media->where('type', $filterType);

        $media = $media->orderBy('c_date', 'desc')->paginate(8);
        return view(
            'admin.media.index',
            [
                'media' => $media,
                'filters' => [
                    'name' => $filterName,
                    'date' => $filterDate,
                    'type' => $filterType
                ]
            ]);
    }

    public function add()
    {
        return view('admin.media.add');
    }

    public function upload(Request $request)
    {
        /* @var $s3 \Illuminate\Filesystem\FilesystemAdapter */
        $s3 = \Storage::disk('s3');

        $allowedExtensions = ['jpg', 'png', 'mp4'];
        $imageExtensions = ['jpg', 'png'];

        if (!$request->hasFile('file')) {
            return view('admin.media.add', ['errorMessage' => __('views.admin.media.add.msg.file_missing')]);
        }
        $file = $request->file('file');
        $fileExtensions = $file->getClientOriginalExtension();
        if (!in_array($fileExtensions, $allowedExtensions)) {
            return view('admin.media.add', ['errorMessage' => __('views.admin.media.add.msg.upload_failed')]);
        }
        $name = $request->name;
        if ($request->name != '') {
            $name .= '.' . $file->getClientOriginalExtension();
        } else {
            $name = $file->getClientOriginalName();
        }
        $fileType = in_array($file->getClientOriginalExtension(), $imageExtensions) ? Media::MEDIA_IMAGE : Media::MEDIA_VIDEO;
        $filePath = $this->_imgDir . $name;
        $thumbFilePath = $this->_imgThumbDir . $name . '.jpg';
        if ($s3->exists($filePath)) {
            return view('admin.media.add', ['errorMessage' => __('views.admin.media.add.msg.file_exist')]);
        }
        $thumbnail = $this->generateThumbnail($file, 200, 100, $fileType);
        if ($thumbnail) {
            $result = $s3->put($thumbFilePath, $thumbnail, 'public');
            if (!$result) $thumbFilePath = $this->_defaultThumbnail;
        } else {
            $thumbFilePath = $this->_defaultThumbnail;
        }
        $result = $s3->put($filePath, file_get_contents($file), 'public');
        if ($result) {
            $media = new Media();
            $media->name = $name;
            $media->url = $s3->url($filePath);
            $media->thumbnail_url = $s3->url($thumbFilePath);
            $media->description = $request->description;
            $media->size = $file->getClientSize();
            $media->type = $fileType;
            $media->save();
            $request->session()->flash('success_message', __('views.admin.media.add.msg.upload_successful'));
        }
        return redirect('admin/media');
    }

    public function delete(Request $request)
    {
        /* @var $s3 \Illuminate\Filesystem\FilesystemAdapter */
        $s3 = \Storage::disk('s3');

        if (!$request->has('name')) {
            $request->session()->flash('error_message', __('views.admin.media.delete.msg.data_mismatch'));
        } else {
            $result = $s3->delete($this->_imgDir . $request->name);
            $result = $s3->delete($this->_imgThumbDir . $request->name);
            if (!$result) {
                $request->session()->flash('error_message', __('views.admin.media.delete.msg.failed'));
            } else {
                Media::where('name', $request->name)->delete();
                $request->session()->flash('success_message', __('views.admin.media.delete.msg.delete_successful'));
            }
        }
    }

    public function listMedia()
    {
        echo Media::where('type', Media::MEDIA_IMAGE)->get()->toJson();
    }

    public function generateThumbnail($file, $width, $height, $type)
    {
        if ($type == Media::MEDIA_IMAGE) {
            $imageDetails = getimagesize($file);
            $originalWidth = $imageDetails[0];
            $originalHeight = $imageDetails[1];
            if ($originalWidth > $originalHeight) {
                $newWidth = $width;
                $newHeight = intval($originalHeight * $newWidth / $originalWidth);
            } else {
                $newHeight = $height;
                $newWidth = intval($originalWidth * $newHeight / $originalHeight);
            }
            $dstX = intval(($width - $newWidth) / 2);
            $dstY = intval(($height - $newHeight) / 2);
            if ($imageDetails[2] == IMAGETYPE_GIF) {
                $imgType = "ImageGIF";
                $createImage = "ImageCreateFromGIF";
            }
            if ($imageDetails[2] == IMAGETYPE_JPEG) {
                $imgType = "ImageJPEG";
                $createImage = "ImageCreateFromJPEG";
            }
            if ($imageDetails[2] == IMAGETYPE_PNG) {
                $imgType = "ImagePNG";
                $createImage = "ImageCreateFromPNG";
            }
            if ($imgType) {
                $oldImage = $createImage($file);
                $newImage = imagecreatetruecolor($width, $height);
                imagecopyresized($newImage, $oldImage, $dstX, $dstY, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

                $tmp = tmpfile();
                $imgType($newImage, $tmp);
                imagedestroy($oldImage);
                imagedestroy($newImage);
                $base64 = file_get_contents(stream_get_meta_data($tmp)['uri']);
                fclose($tmp);
                return $base64;
            }
        } else if ($type == Media::MEDIA_VIDEO) {
            $sec = 2;
            $config = [
                'ffmpeg.binaries'  => env('FFMPEG_BIN'),
                'ffprobe.binaries' => env('FFPROBE_BIN'),
                'timeout'          => env('FFMPEG_TIMEOUT'), // The timeout for the underlying process
                'ffmpeg.threads'   => env('FFMPEG_THREADS'),   // The number of threads that FFMpeg should use
            ];

            $ffmpeg = \FFMpeg\FFMpeg::create($config);
            $video = $ffmpeg->open($file);

            $frame = $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds($sec));

            $tmp = tmpfile();
            $filePath = stream_get_meta_data($tmp)['uri'];
            $frame->save($filePath, true, false);
            $base64 = $this->generateThumbnail($filePath, 200, 100, Media::MEDIA_IMAGE);
            fclose($tmp);

            return $base64;
        }
        return false;
    }
}
