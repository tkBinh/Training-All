<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    const CAT_ALL = 0;
    const CAT_NEWS = 1;
    const CAT_INTRODUCTION = 2;
    const CAT_RECRUITMENT = 3;
    const CAT_COMMUNITY = 4;
    const PUBLIC = 1;
    const PRIVATE = 0;
    const CUSTOMER_CARE = 5;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    protected $fillable = ['title', 'content'];
    public $timestamps = false;

    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';

    public static function getAllActiveNews($cat = News::CAT_NEWS)
    {
        return static::select('id', 'title', 'c_date')->where('status', News::PUBLIC)->where('cat', $cat)->get();
    }

    public static function getNewsById($id)
    {
        return static::where(['status' => News::PUBLIC, 'id' => $id])->first();
    }

}
