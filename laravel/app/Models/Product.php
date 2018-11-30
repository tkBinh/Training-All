<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    protected $fillable=['title','content', 'photo', 'status'];
    public $timestamps = false;

    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';

    public static function getAllActiveProducts($cat = 0){
        return static::select('id', 'title', 'c_date')->where('status', 1)->where('cat', $cat)->get();
    }

    public static function getProductById($id){
        return static::where(['status'=> 1, 'id' => $id])->first();
    }

}
