<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Permissions\Permissions;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $check = Permissions::checkPermisison(config('permission.news.view'));
        if (!$check) {
            return view('notify', ['content' => 'danh sách tin tức']);
        }
        $listNew = News::orderBy('id', 'desc');
        if ($request->title != null) {
            $listNew = $listNew->where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->cat != null) {
            $listNew = $listNew->where('cat', $request->cat);
        }
        $listNew = $listNew->paginate(8);
        return view('admin.news.news', ['news' => $listNew, 'cat' => $request->cat, 'title' => $request->title]);
    }

    public function edit($id)
    {
        $check = Permissions::checkPermisison(config('permission.news.edit'));
        if (!$check) {
            return view('notify', ['content' => 'sửa tin tức']);
        }
        return view('admin.news.edit', ['news' => News::find($id)]);
    }

    public function detail($id)
    {
        return view('admin.news.detail', ['news' => News::find($id)]);
    }

    public function add()
    {
        $check = Permissions::checkPermisison(config('permission.news.add'));
        if (!$check) {
            return view('notify', ['content' => 'thêm tin tức']);
        }
        return view('admin.news.add');
    }

    public function insert(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->contents;
        $news->cat = $request->cat;
        $news->status = $request->status;
        $news->save();
        return redirect(route('admin.news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->editor;
        $news->cat = $request->cat;
        $news->status = $request->status;
        $news->save();
        return redirect(route('admin.news'));
    }

    //change status of news
    public function active(Request $request)
    {
        $id = $request->users_id;
        $news = News::find($id);
        if ($news->status == News::PUBLIC) {
            $news->status = News::PRIVATE;
            $news->save();
            $check = 0;
        } else {
            $news->status = News::PUBLIC;
            $news->save();
            $check = 1;
        }
        $succes = new MessageBag(['succes' => 'Change Succes']);
        return response()->json([
            'error' => false,
            'message' => $succes,
            'status' => $check,
        ], 200);
    }

    public function getUrlPhoto(Request $request)
    {
        $data = $request->post_image;
        $filenameWithExt = $data->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $data->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        $data_image = file_get_contents($data);

        $s3 = \Storage::disk('s3');
        $filePath = 'image-news/' . $fileNameToStore;
        $s3->put($filePath, $data_image, 'public');
        $url = \Storage::cloud()->url($filePath);
        return response()->json([
            'url' => $url,
        ], 200);
    }

    public function getNewsTopPage(Request $request)
    {
        $listNew = News::orderBy('id', 'desc');
        if ($request->title != null) {
            $listNew = $listNew->where('title', 'like', '%' . $request->title . '%');
        }
        $listNew = $listNew->get();
        return view('admin.news.top', ['news' => $listNew, 'title' => $request->title]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $newSearch = DB::table('news')->where('title', 'LIKE', '%' . $request->search . "%")->get();

            if ($newSearch) {
                foreach ($newSearch as $key => $new) {
                    $output .= '<tr>' .
                        '<td draggable="true" ondragstart="drag(event)"  style="margin: 0; cursor: pointer;" id= ' . $new->id . '>' .
                        $new->title . '</td>' .
                    '</tr>';
                }
                return Response([$output, $new]);
            }
        }
    }
}