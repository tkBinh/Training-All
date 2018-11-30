<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Breadcrumbs;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Setting;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
    	$title = Setting::where('name', 'title')->first()->value;
        $keywords = Setting::where('name', 'keywords')->first()->value;
        $description = Setting::where('name', 'description')->first()->value;
        
    	\View::share(['title' =>$title, 'keywords' => $keywords, 'description' => $description]);
    }
}
