<?php
/**
 * Created by PhpStorm.
 * User: vu.dovan
 * Date: 11/30/2018
 * Time: 9:54 AM
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Setting;
use App\Models\News;

class LayoutComposer
{
    protected $info = [];

    public function __construct()
    {
        $this->info['email'] = Setting::where('name', 'email')->first();
        $this->info['hotline'] = Setting::where('name', 'hotline')->first();
        $this->info['tele_sale'] = Setting::where('name', 'tele_sale')->first();
        $this->info['footer_contact'] = Setting::where('name', 'footer_contact')->first();
        $this->info['footer_ggmap'] = Setting::where('name', 'footer_ggmap')->first();
        $this->info['fb_link'] = Setting::where('name', 'fb_link')->first();

        $listNewsForRandom = News::where('cat', 1)->orderBy('id', 'DESC')->paginate(8);
        foreach ($listNewsForRandom as $key => $value) {
            $value->cover = $this->getIFirstImageUrl($value->content);
            $value->content = $this->trimImgTag($value->content);
            $listNewsForRandom[$key] = $value;
        }
        $postRandom = $listNewsForRandom->shuffle();
        $postRandom = $postRandom->all();
        $postRandom = array_slice($postRandom, 0, 5);
        $this->info['post_random'] = $postRandom;
    }

    public function compose(View $view)
    {
        $view->with('info', $this->info);
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

    public function trimImgTag($content)
    {
        $content = preg_replace("/<img[^>]+\>/i", "", $content);
        return $content;
    }
}