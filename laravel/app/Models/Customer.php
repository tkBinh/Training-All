<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Carbon\Carbon;
use Mockery\Exception;

class Customer extends Model
{

    protected $table = 'customers';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = false;

    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';

    public function collaborator()
    {
        return $this->belongsTo('App\Models\Collaborator','collaborator_id','id');
    }

    public static function getCustomerOfCollaborator($collaborator_id, $offset = 0, $limit = 10)
    {
        return static::where('collaborator_id', $collaborator_id)
                        ->skip($offset)
                        ->take($limit)
                        ->get();
    }

    public static function addText($collaborator_id, $text)
    {
        $customer = new Customer(); 
        $customer->collaborator_id = $collaborator_id;
        $customer->status = 0;
        $customer->text = trim($text);
		$customer->c_date = date('Y-m-d H:i:s');
		$customer->m_date = date('Y-m-d H:i:s');
        return $customer->save();
    }

    public static function addPhoto($collaborator_id, $photo)
    {   
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $file_name = rand(0, 1000).'_'.date('Y-m-d', time()).'.jpg';
        if($photo != ""){
            $s3 = \Storage::disk('s3');
            $filePath = 'customer/' . $file_name;
            $abc = $s3->put($filePath, base64_decode($photo), 'public');
            //Storage::disk('public')->put($file_name, base64_decode($photo));
            $url = \Storage::cloud()->url($filePath);
        } 
        $customer = new Customer(); 
        $customer->collaborator_id = $collaborator_id;
        $customer->status = 0;
        $customer->photo = $url;
		$customer->c_date = date('Y-m-d H:i:s');
		$customer->m_date = date('Y-m-d H:i:s');
        return $customer->save();
    }

}
