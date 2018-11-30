<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{

    protected $table = 'commissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['collaborator_id' , 'user_id', 'customer_id', 'amount' ,'c_date', 'm_date'];

    public $timestamps = false;

    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';

    public static function getCommissionOfCollaborator($collaborator_id, $month, $year, $offset, $limit)
    {

        $q = static::where('collaborator_id', $collaborator_id);
        if ($month) {
            $q->whereMonth('c_date', '=', $month);
        }
        if ($year) {
            $q->whereYear('c_date', '=', $year);
        }
        return $q->skip($offset)
                 ->take($limit)
                 ->get();
    }
}
