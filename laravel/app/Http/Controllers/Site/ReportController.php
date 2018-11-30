<?php

namespace App\Http\Controllers\Site;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permissions\Permissions;

use DB;

class ReportController extends Controller
{
    public function index(){
        $check = Permissions::checkPermisison(config('permission.report.view'));
        if (!$check) {
            return view('notify', ['content' => 'báo cáo']);
        }
        for ($i=6;$i>=0;$i--){
            $arr_date[$i]['success'] = Customer::where(DB::raw('DATEDIFF(CURDATE(),c_date)'),$i)->where('status', '1')->count('id');
            $arr_date[$i]['all'] = DB::table('customers')->where(DB::raw('DATEDIFF(CURDATE(),c_date)'),$i)->count('id');
            $date = date('d-m-Y');
            $new_date = strtotime ( '-'.$i.' day' , strtotime ( $date ) ) ;
            $arr_date[$i]['date'] =  date ( 'd-m-Y' , $new_date );
        }
        return view('site.report',['arr_date' => $arr_date]);
    }
}
