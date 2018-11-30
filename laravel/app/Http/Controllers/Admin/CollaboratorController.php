<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Permissions\Permissions;
use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Models\Commission;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;

class CollaboratorController extends Controller
{
    
    public function index(Request $request)
    {
        $check = Permissions::checkPermisison(config('permission.collaborator.view'));
        if (!$check) {
            return view('notify', ['content' => 'danh sách cộng tác viên']);
        }
        $user = Auth::user();
        $roles = $user->roles;
        $permission_id = Permission::where('key','collaborator.view')->first()->id;

        $allows = [];

        for ($i = 0; $i < $roles->count(); $i++) {
            $allow = DB::table('role_permissions')->where([
                ['role_id', $roles[$i]->id],
                ['permission_id', $permission_id],
            ])->first();
            if ($allow != null) {
                if (trim($allow->allow, " ") != "") {
                    $allows[$i] = $allow->allow;
                } else {
                    $allows = [];
                    break;
                }
            }
        }
        $collaborators = Collaborator::orderBy('id', 'desc');
        if ($allows != null) {
            $collaborators = $collaborators->where(function ($query) use ($allows) {
                $collaborator = $query->where('invitation_code', $allows[0]);
                for ($i = 1; $i < count($allows); $i++) {
                    $collaborator = $collaborator->orWhere('invitation_code', $allows[$i]);
                }
                return $collaborator;
            });
        }
        if($request->name != null){
            $collaborators = $collaborators->where('name', 'like','%'.$request->name.'%');
        }
        if($request->email != null){
            $collaborators = $collaborators->where('email', 'like','%'.$request->email.'%');
        }
        if($request->tel != null){
            $collaborators = $collaborators->where('tel', 'like','%'.$request->tel.'%');
        }
        if (!isset($request->status)) {
            $collaborators = $collaborators->paginate(8);
            $status = "";
        } else {
            $collaborators = $collaborators->where('status', $request->status)->paginate(8);
            $status = $request->status;
        }

        return view('admin.collaborator', ['collaborators' => $collaborators, 'status' => $status,
        'name'=>$request->name,'email'=>$request->email,'tel'=>$request->tel]);
    }

    public function update(Request $request){
        $collaborator = Collaborator::find($request->id);
        $collaborator->name_bank = $request->bank_name;
        $collaborator->acount_number = $request->account_number;
        $collaborator->contract_number = $request->contract_number;
		$collaborator->birthday = $request->birthday;
		$collaborator->id_card_number = $request->id_card_number;
		$collaborator->card_date_create = $request->card_date_create;
		$collaborator->card_area_create = $request->card_area_create;
		$collaborator->address = $request->address;
        $collaborator->save();
        
        return response()->json([
            'error' => false,
        ], 200);
    }

    public function history($collaborator,Request $request)
    {
        $listYear = Commission::select(DB::raw("year(c_date) as year"))->where('collaborator_id', $collaborator)->distinct()->get();

        $commission = Commission::where('collaborator_id', $collaborator)->orderBy('id', 'desc');
        
        if($request->year != null){
            $commission = $commission->where(DB::raw("year(c_date)"),$request->year);
        }
        if($request->month != null){
            $commission = $commission->where(DB::raw("month(c_date)"),$request->month);
        }
        $total = $commission->sum('amount');
        $commission= $commission->paginate(8);
        

        return view('admin.history', ['commissions' => $commission,'total'=>$total,
        'listYear'=> $listYear, 
        'indexYear'=>$request->year,'indexMonth'=> $request->month,
        'collaborator'=>$collaborator]);
    }

    public function status($collaborator,$status)
    {
        $colla = Collaborator::find($collaborator);
        $colla->update(['status' => $status]);
        return back();
    }

    public function getMonth(Request $request){
        $commission = Commission::where('collaborator_id', $request->id);
        $listMonth = $commission->select(DB::raw("month(c_date) as month"))->distinct()->orderBy('month');
        if($request->year == null){
            $listMonth = $listMonth->get();
        }else{
            $listMonth = $listMonth->where(DB::raw("year(c_date)"),$request->year)->get();
        }
        $data = '<option value="">Tất cả</option>';
        foreach ($listMonth as $month) {
            if($month->month == $request->month){
                $data = $data.'<option value='. $month->month. ' selected="selected">tháng '.$month->month.'</option>';
            }else{
                $data = $data.'<option value='. $month->month. '>tháng '.$month->month.'</option>';
            }
        }
        return $data;
    }
}
