<?php

namespace App\Helpers\Permissions;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class Permissions
{
    public static function checkPermisison($key)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $roles = $user->roles;
            if ($roles->count() != 0) {
                $permissions = Permission::where('key', $key)->get();
                if ($permissions->count() != 0) {
                    for ($i = 0;$i<$roles->count();$i++) {
                        $permission = $roles[$i]->permission()->where('permission_id', $permissions[0]->id)->count();
                        if ($permission != 0) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}
