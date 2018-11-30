<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $cat = (int)$request->get('cat', 0);
        $news = News::getAllActiveNews($cat);
        return response()->json($news);
    }

    /**
     * get news detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $news = News::getNewsById($id);
        return response()->json($news);
    }
}
