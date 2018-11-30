<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Permissions\Permissions;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function index()
    {
        $check = Permissions::checkPermisison(config('permission.setting.view'));
        if (!$check) {
            return view('notify', ['content' => 'Danh sách cài đặt']);
        }
        $contact = Setting::where('name', 'contact')->first();
        $footer_contact = Setting::where('name', 'footer_contact')->first();
        $footer_ggmap = Setting::where('name', 'footer_ggmap')->first();
        $hotline = Setting::where('name', 'hotline')->first();
        $fb_link = Setting::where('name', 'fb_link')->first();
        $tele_sale = Setting::where('name', 'tele_sale')->first();
        $email = Setting::where('name', 'email')->first();
        $address = Setting::where('name', 'address')->first();
        $website = Setting::where('name', 'website')->first();
        $intro_article = Setting::where('name', 'intro_article')->first();
        $featured_content = Setting::where('name', 'featured_content')->first();
        $product_logo = Setting::where('name', 'product_logo')->first();

        $title = Setting::where('name', 'title')->first();
        $keywords = Setting::where('name', 'keywords')->first();
        $description = Setting::where('name', 'description')->first();
        $settings = compact('contact', 'footer_contact', 'footer_ggmap', 'hotline', 'tele_sale', 'fb_link', 'email',
            'address', 'website', 'intro_article', 'featured_content', 'product_logo', 'title', 'keywords', 'description');

        return view('admin.setting', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $hotline = Setting::where('name', 'hotline')->first();
        $hotline->value = $request->hotline;
        $hotline->save();

        $tele_sale = Setting::where('name', 'tele_sale')->first();
        $tele_sale->value = $request->tele_sale;
        $tele_sale->save();

        $address = Setting::where('name', 'address')->first();
        $address->value = $request->address;
        $address->save();

        $email = Setting::where('name', 'email')->first();
        $email->value = $request->email;
        $email->save();

        $intro_article = Setting::where('name', 'intro_article')->first();
        $intro_article->value = $request->intro_article;
        $intro_article->save();

        $footer_contact = Setting::where('name', 'footer_contact')->first();
        $footer_contact->value = $request->contentsFooter;
        $footer_contact->save();

        $footer_ggmap = Setting::where('name', 'footer_ggmap')->first();
        $footer_ggmap->value = $request->googleMap;
        $footer_ggmap->save();

        $contact = Setting::where('name', 'contact')->first();
        $contact->value = $request->contact;
        $contact->save();

        $featuredContent = Setting::where('name', 'featured_content')->first();
        $featuredContent->value = $request->featured_content;
        $featuredContent->save();
        
        $product_logo = Setting::where('name', 'product_logo')->first();
        $product_logo->value = $request->product_logo;
        $product_logo->save();

        $title = Setting::where('name', 'title')->first();
        $title->value = $request->title;
        $title->save();

        $keywords = Setting::where('name', 'keywords')->first();
        $keywords->value = $request->keywords;
        $keywords->save();

        $description = Setting::where('name', 'description')->first();
        $description->value = $request->description;
        $description->save();

        return redirect(route('admin.setting'));
    }

    public function updateNewsTop(Request $request) {
        if($request->has('jsonSetting')) {
            DB::table('setting')
                ->where('name', 'new_top_post')
                ->update(['value' => $request->jsonSetting]);

            $request->session()->flash('message','Cập nhật tin top trang chủ thành công !');
        }
    }
}
