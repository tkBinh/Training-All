<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    public $timestamps = false;

    const MEDIA_IMAGE = 1;
    const MEDIA_VIDEO = 2;
    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';
}
