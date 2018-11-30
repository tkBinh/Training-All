<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = false;

    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';
}