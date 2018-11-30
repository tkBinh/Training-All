<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Models\News;
use App\Models\Media;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    //for test layout
    public function testLayout()
    {
        return view('pages.layout.page');
    }

    public function getHomePage()
    {
        $newsTop = collect([]);
        $topNewsConfig = Setting::where('name', 'new_top_post')->first()->value;
        $topNewsIdConfig = json_decode($topNewsConfig, true);
        foreach ($topNewsIdConfig as $value) {
            $listIdNews[] = $value;
        }

        $topNewsConfig = News::whereIn('id', $listIdNews)->where('status', 1)->get();

        foreach ($listIdNews as $idNew) {
            $newsTop = $newsTop->merge($topNewsConfig->where('id', $idNew));
            foreach ($newsTop as $key => $value) {
                $value->image = $this->getIFirstImageUrl($value->content);
                $newsTop[$key] = $value;
            }
        }
        $featuredContent = Setting::where('name', 'featured_content')->first()->value;
        $featuredContent = explode('|', $featuredContent);

        $productLogo = Setting::where('name', 'product_logo')->first()->value;
        $productLogo = explode('|', $productLogo);

        $latestNewsPost = News::where('cat', News::CAT_NEWS)->where('status', 1)->limit(2)->get();
        foreach ($latestNewsPost as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $value->content = $this->trimImgTag($value->content);
            $latestNewsPost[$key] = $value;
        }

        $configVideoPost = array();
        $configVideoPost[] = News::where('id', $topNewsIdConfig['video_post_1'])->where('status', 1)->first();
        $configVideoPost[] = News::where('id', $topNewsIdConfig['video_post_2'])->where('status', 1)->first();
        foreach ($configVideoPost as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $value->content = $this->trimImgTag($value->content);
            $configVideoPost[$key] = $value;
        }

        $latestCommunityPost = News::where('cat', News::CAT_COMMUNITY)->where('status', 1)->limit(2)->get();
        foreach ($latestCommunityPost as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $value->content = $this->trimImgTag($value->content);
            $latestCommunityPost[$key] = $value;
        }

        $photoLibrary = \DB::table('media')->where('type', '1')->limit(12)->get();

        return view(
            'pages.home',
            compact('newsTop', 'featuredContent', 'productLogo', 'latestNewsPost', 'latestCommunityPost',
                'configVideoPost', 'photoLibrary'));

    }

    public function getIFirstImageUrl($html)
    {
        $array = array();
        preg_match('/src="([^"]*)"/i', $html, $array);
        if (count($array) < 2) {
            return "https://demouploadfile.s3.ap-southeast-1.amazonaws.com/image-news/noImage_1543310296.jpg";
        } else {
            return $array[1];
        }
    }

    public function getIntroducePage()
    {
        $introduces = News::where('cat', News::CAT_INTRODUCTION)->where('status', 1)->limit(5)->get();
        $article = Setting::where('name', 'intro_article')->first();

        return view('pages.introduce', compact('introduces', 'article'));
    }

    public function getProductPage()
    {
        $products = Product::where('status', 1)->orderBy('id', 'ASC')->get();
        $featuredContent = Setting::where('name', 'featured_content')->first()->value;
        $featuredContent = explode('|', $featuredContent);

        return view('pages.product', compact('products', 'featuredContent'));
    }

    public function getMediaPage()
    {
        $media = Media::paginate(20);

        return view('pages.media', compact('media'));
    }

    public function getCommunityPage()
    {
        $listNews = News::where('cat', News::CAT_COMMUNITY)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(8);
        foreach ($listNews as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $listNews[$key] = $value;
        }

        return view('pages.community', compact('listNews'));
    }

    public function getRecruitmentPage()
    {
        $listNews = News::where('cat', NEWS::CAT_RECRUITMENT)
            ->orderBy('id', 'DESC')
            ->paginate(8);
        foreach ($listNews as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $listNews[$key] = $value;
        }

        return view('pages.recruitment', compact('listNews'));
    }

    public function getNewsPage()
    {
        $listNews = News::where('cat', NEWS::CAT_NEWS)->where('status', 1)->orderBy('id', 'DESC')->paginate(8);
        foreach ($listNews as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $value->content = $this->trimImgTag($value->content);
            $listNews[$key] = $value;
        }
        return view('pages.news', compact('listNews'));
    }

    public function trimImgTag($content)
    {
        $content = preg_replace("/<img[^>]+\>/i", "", $content);
        return $content;
    }

    public function getContactPage()
    {
        $list = News::Where('cat',News::CUSTOMER_CARE)->where('status', 1)->limit(7)->get();
        $setting = Setting::where('name', 'contact')->first();

        return view('pages.contact', compact('setting','list'));
    }

    public function testLayoutDetail()
    {
        return view('pages.layout.post');
    }

    public function getCommunityPostPage()
    {
        return view('pages.posts.community');
    }

    public function getNewsPostPage(Request $request)
    {
        $id = $request->id;
        $news = News::find($id);

        return view('pages.posts.news', compact('news'));
    }

    public function getVideoPostPage()
    {
        return view('pages.posts.video');
    }

    public function searchNews(Request $request)
    {
        $count = 0;
        $keyword = $request->keyword;
        if ($keyword != null) {
            $listNews = News::where('title', 'like', '%' . $keyword . '%')
                ->orWhere('content', 'like', '%' . $keyword . '%')
                ->get();
        } else {
            $listNews = News::orderBy('id', 'desc')->get();
        }
        foreach ($listNews as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $listNews[$key] = $value;
            $count++;
        }

        return view('pages.search', compact('listNews', 'keyword', 'count'));
    }

    public function getNewsComment(Request $request)
    {
        $this->validate($request,
            [
                'author' => 'required',
                'email' => 'required|email'
            ],
            [
                'author.required' => 'Vui lòng nhập tên của bạn',
                'email.required' => 'Vui lòng nhập email của bạn',
                'email.email' => 'Email không hợp lệ'
            ]);

        $comment = new Comment();
        $comment->name = $request->author;
        $comment->email = $request->email;
        $comment->website = $request->url;
        $comment->comment = $request->comment;
        $comment->news_id = $request->comment_post_ID;

        if($request->saveInfo != null) {
            Session::put('userName',$request->author);
            Session::put('userEmail', $request->email);
            Session::put('userWebsite', $request->url);
        }
        $comment->save();

        return redirect()->back()->with('successComment', 'Gửi phản hồi thành công !');
    }
}
