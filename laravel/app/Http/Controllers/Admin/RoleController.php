<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\Role\Role;
use App\Models\Permission;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\Helpers\Permissions\Permissions;

class RoleController
{
    public function index()
    {
        $check = Permissions::checkPermisison(config('permission.role.view'));
        if (!$check) {
            return view('notify', ['content' => 'danh sách vai trò']);
        }
        $roles = Role::paginate(7);
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function edit(Role $roles)
    {
        $check = Permissions::checkPermisison(config('permission.role.edit'));
        if (!$check) {
            return view('notify', ['content' => 'sửa danh sách vai trò']);
        }
        $permissions = Permission::All();
        $per = [];
        foreach ($permissions as $permission) {
            $check = DB::select('select * from role_permissions where permission_id =:permission_id and role_id=:role_id', ['permission_id' => $permission->id, 'role_id' => $roles->id]);
            if ($check == null) {
                $per[] = ['permission' => $permission, 'access' => false, 'allow' => ''];
            } else {
                $per[] = ['permission' => $permission, 'access' => true, 'allow' => $check[0]->allow];
            }
        }
        return view('admin.roles.edit', ['roles' => $roles, 'permissions' => $per]);
    }

    public function update(Request $request, Role $roles)
    {
        DB::table('role_permissions')->where('role_id',$roles->id)->delete();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $roles->name = $request->get('name');
        $permissions = Permission::All();
        
        foreach ($permissions as $permission) {
            if ($request->get("permission-$permission->id") != null) {
                $allow = $request->get("allow-$permission->id") != null? $request->get("allow-$permission->id") : '';
                DB::table('role_permissions')->insert(
                    ['permission_id'=>$permission->id,'role_id'=>$roles->id,'allow'=>$allow]
                );
            }
        }
        $roles->save();

        return redirect()->intended(route('admin.roles'));
    }

    public function showCreateRole()
    {
        $check = Permissions::checkPermisison(config('permission.role.create'));
        if (!$check) {
            return view('notify', ['content' => 'tạo mới vai trò']);
        }
        $permissions = Permission::All();
        return View('admin.roles.create', ['permissions' => $permissions]);
    }

    public function create(Request $request)
    {
        $roles = new Role();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $roles->name = $request->name;
        $roles->save();
        $permissions = Permission::All();
        foreach ($permissions as $permission) {
            if ($request->get("permission-$permission->id") != null) {
                $allow = $request->get("allow-$permission->id") != null? $request->get("allow-$permission->id") : '';
                DB::table('role_permissions')->insert(
                    ['permission_id'=>$permission->id,'role_id'=>$roles->id,'allow'=>$allow]
                );
            }
        }
        return redirect()->intended(route('admin.roles'));
    }
}
