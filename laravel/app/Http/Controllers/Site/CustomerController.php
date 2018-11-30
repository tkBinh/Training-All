<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Permissions\Permissions;
use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use App\Models\Collaborator;
use App\Models\Commission;
use App\Models\Customer;
use App\Models\Permission;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $check = Permissions::checkPermisison(config('permission.customer.view'));
        if (!$check) {
            return view('notify', ['content' => 'danh sách khách hàng']);
        }
        $user = Auth::user();
        $roles = $user->roles;
        $permission_id = Permission::where('key', 'customer.view')->first()->id;
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

        $invitation_code = -1;
        if (isset($request->invitation_code)) {
            $invitation_code = $request->invitation_code;
        }
        $listInvit_code = [];
        if ($allows == null) {
            $listInvit_code = Collaborator::select('invitation_code')->distinct()->get();
        } else {
            foreach ($allows as $allow) {
                $listInvit_code[] = Collaborator::select('invitation_code')->where('invitation_code', $allow)->distinct()->first();
            }
        }
        $customers = $this->getCustomers($request, $invitation_code, $allows);

        $data = [];
        foreach ($customers as $customer) {
            $colla = $customer->collaborator()->first();
            if ($colla != null) {
                $data[$customer->id] = $colla;
            }
        }

        return view('site.customer', ['customers' => $customers, 'status' => $request->status,
            'date' => $request->date, 'nameColla' => $data, 'invitation_code' => $invitation_code,
            'listInvitation_code' => $listInvit_code]);
    }

    public function getCustomers($request, $invitation_code, $allows)
    {
        $customers = null;
        if ($invitation_code == -1) {
            if ($allows != null) {
                $customers = Customer::orderBy('id', 'desc')->where(function ($query) use ($allows) {
                    $customer = $query->where('invitation_code', $allows[0]);
                    for ($i = 1; $i < count($allows); $i++) {
                        $customer = $customer->orWhere('invitation_code', $allows[$i]);
                    }
                    return $customer;
                });
            } else {
                $customers = Customer::orderBy('id', 'desc');
            }
        } else {
            $customers = Customer::where('invitation_code', $invitation_code)->orderBy('id', 'desc');
        }
        
        if (!isset($request->status) || $request->status == "") {
            $status = "";
            if ($request->date == "") {
                $customers = $customers->paginate(7);
            } else {
                $customers = $customers->where('c_date', '>=', $request->date)->paginate(7);
            }
        } else {
            $status = $request->status;
            if ($request->date == "") {
                $customers = $customers->where('status', $status)->paginate(7);
            } else {
                $customers = $customers->where('status', $status)->where('c_date', '>=', $request->date)->paginate(7);
            }
        }
        return $customers;
    }

    public function getStatus(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        return response()->json([
            'error' => false,
            'status' => $customer->status,
            'note' => $customer->note,
        ], 200);
    }

    public function saveStatus(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->status = $request->status;
        $customer->note = $request->note;
        $customer->save();
        $succes = new MessageBag(['succes' => 'Thay đổi trạng thái thành công']);
        return response()->json([
            'error' => false,
            'message' => $succes,
            'redirect' => URL::previous(),
        ], 200);
    }

    public function bonus(Request $request)
    {
        $collaborator_id = $request->collaborator_id;
        $cus_id = $request->customer_id;
        $amount = $request->amount;
        $user_id = Auth::user()->id;

        $colla = Collaborator::where('id', $collaborator_id)->first();

        $commission = new Commission();

        $commission->collaborator_id = $collaborator_id;
        $commission->customer_id = $cus_id;
        $commission->amount = $amount;
        $commission->user_id = $user_id;
        $commission->note = $request->note;
        $commission->save();
        $amount = number_format($amount);

        $succes = new MessageBag(['succes' => 'Thưởng thành công ' . $amount . ' VNĐ cho CTV ' . $colla->name]);
        return response()->json([
            'error' => false,
            'message' => $succes,
        ], 200);
    }

    public function save(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->name = (isset($request->customer_name)) ? $request->customer_name : $customer->name;
        $customer->tel = (isset($request->phone)) ? $request->phone : $customer->tel;
        $customer->status = $request->status;
        $customer->save();

        return response()->json([
            'error' => false,
            'redirect' => URL::previous(),
        ], 200);
    }
}
