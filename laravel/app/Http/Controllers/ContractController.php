<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\Setting;

class ContractController extends Controller
{
   
    public function index(Request $request )
    {
        $colla = Collaborator::where('access_token',$request->access_token)->first();
        $asignAdmin = Setting::where('name', 'asign_picture')->first();//Setting::addSetting('asign_picture'); 
		$commission = Setting::where('name', 'commission')->first();
        if ($colla != null) {
            return view('contract', ['colla'=> $colla, 'asignAdmin' => $asignAdmin, 'commission' => $commission]);
        }
    }
}
