<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Mockery\Exception;

class Setting extends Model
{

    protected $table = 'setting';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    
    protected $fillable = ['name', 'value'];    //'address', 'phoneNumber', 'email', 'website', 'content',

    public $timestamps = false;

    public static function getBanner($name)
    {
    	return static::where('name',$name)->first();
    }

 

    public static function addSetting($name)
    {
        $item = static::where('name', $name)->first();
        
        if ($item == null) {
            $item = new Setting();
            $item->name = $name;
            $item->value = null;
            $item->save();
        }
        return $item;
    }
}
