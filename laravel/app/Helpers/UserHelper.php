<?php

namespace App\Helpers;

use App\Models\Collaborator;
use App\Models\Customer;
use App\Models\Media;
use GuzzleHttp\Exception\RequestException;

class UserHelper
{

    public static function insertCollaborator($Collaborator)
    {
        $modelColl = new Collaborator();
        $modelColl->firstname = $Collaborator['firstname'];
        $modelColl->lastname = $Collaborator['lastname'];
        $modelColl->tel = $Collaborator['tel'];
        $modelColl->car_type_id = $Collaborator['car_type_id'];
        $modelColl->email = $Collaborator['email'];
        $modelColl->source_id = $Collaborator['source_id'];
        $modelColl->status = $Collaborator['status'];
        $modelColl->otp = $Collaborator['otp'];
        $modelColl->area_id = $Collaborator['area_id'];
        $modelColl->invitation_code = $Collaborator['invitation_code'];
        $modelColl->profile_picture = $Collaborator['profile_picture'];
        $modelColl->driver_lic_picture = $Collaborator['driver_lic_picture'];
        $modelColl->id_front_picture = $Collaborator['id_front_picture'];
        $modelColl->id_back_picture = $Collaborator['id_back_picture'];
        $modelColl->save();

    }

    public static function insertCusByPhoto($customer)
    {
        $modelCus = new Customer();
        $modelCus->text = $customer['text'];
        $modelCus->photo = $customer['photo'];
        $modelCus->memo = $customer['memo'];
        $modelCus->name = $customer['name'];
        $modelCus->tel = $customer['tel'];
        $modelCus->invitation_code = $customer['invitation_code'];
        $modelCus->status = $customer['status'];
        $modelCus->save();
    }

    public static function createOTP()
    {
        return rand(0, 999999);
    }

    public static function getIamgeThumbnail($url)
    {
        $thumbDir = 'thumbnail/';

        /* @var $s3 \Illuminate\Filesystem\FilesystemAdapter */
        $s3 = \Storage::disk('s3');

        $matches = [];
        preg_match('/(http(?:s)?:\/+[^\/]*\/)(.*\/)(.*)/', $url, $matches);
        if (count($matches) < 1) return false;

        $host = $matches[1];
        $dir = $matches[2];
        $fileName = $matches[3];

        $thumbPath = $dir . $thumbDir . $fileName;
        if (!$s3->exists($thumbPath)) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) return false;
            $tmp = tmpfile();
            file_put_contents(stream_get_meta_data($tmp)['uri'], $data);
            $base64 = self::generateThumbnail(stream_get_meta_data($tmp)['uri'], 300, 209, Media::MEDIA_IMAGE);
            $s3->put($thumbPath, $base64, 'public');
            fclose($tmp);
        }

        return $host . $thumbPath;
    }

    public static function generateThumbnail($file, $width, $height, $type)
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
            $base64 = self::generateThumbnail($filePath, 200, 100, Media::MEDIA_IMAGE);
            fclose($tmp);

            return $base64;
        }
        return false;
    }

}

?>