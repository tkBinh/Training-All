<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Role\Role;

class Permission extends Model
{
    protected $table = 'permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','c_date', 'm_date'];

    public $timestamps = false;

    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';

    public function role(){
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
}
