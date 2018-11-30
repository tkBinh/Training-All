<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use App\Models\Permission;
use App\Models\Auth\Role\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Helpers\Permissions\Permissions;

class PermissionController extends Controller
{
    
    public function index(){
        $check = Permissions::checkPermisison(config('permission.permission.view'));
        if (!$check) {
            return view('notify', ['content' => 'danh sách quyền truy cập']);
        }
        $permissions = Permission::paginate(7);
        return view('admin.permissions.index',['permissions'=> $permissions]);
    }

    public function repeat(User $user, Request $request)
    {
        $protectionValidation = protection_validate($user);

        if ($request->expectsJson()) return response($protectionValidation->toArray());

        return redirect()->back();
    }

    public function edit(Permission $permissions)
    {
        $check = Permissions::checkPermisison(config('permission.permission.edit'));
        if (!$check) {
            return view('notify', ['content' => 'sửa thông tin quyền truy cập']);
        }
        return view('admin.permissions.edit', ['permissions' => $permissions]);
    }

    public function update(Request $request,Permission $permissions)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
        ]);
        
        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());
         $permissions->id = $request->get('id');
        $permissions->name = $request->get('name');

        $permissions->save();

        return redirect()->intended(route('admin.permissions'));
    }

    public function showCreatePermission(){
        $check = Permissions::checkPermisison(config('permission.permission.create'));
        if (!$check) {
            return view('notify', ['content' => 'thêm quyền truy cập']);
        }
        return View('admin.permissions.create');
    }

    public function create(Request $request){

        $permission = new Permission();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'key' => 'required|max:40',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $permission->name = $request->name;
        $permission->key = $request->key;
        $permission->save();

        return redirect()->intended(route('admin.permissions'));
    }
}
