<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;

class Collaborator extends Model
{
    protected $table = 'collaborators';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'tel', 'email', 'car_type', 'source', 'invitation_code', 'profile_picture',
        'driver_lic_picture', 'id_front_picture', 'id_back_picture', 'status', 'area', 'otp', 'otp_created','c_date', 'm_date'];

    public $timestamps = false;

    const CREATED_AT = 'c_date';
    const UPDATED_AT = 'm_date';

    public function customer()
    {
        return $this->hasMany('App\Models\Customer','id','collaborator_id');
    }
    
    public static function getCollaboratorByAccessToken($access_token){
//        dd(static::all());
        return static::where('access_token', $access_token)->first();
    }

    public static function getCollaboratorByTel($tel){
        $collaborator = static::where('tel', $tel)->first();
        Collaborator::creatAccessTokenOTP($collaborator);
        return $collaborator;
    }
    public static function creatAccessTokenOTP($collaborator){
        if($collaborator) {
            mt_srand();
            $collaborator->access_token = Hash::make(mt_rand(0, mt_getrandmax()));
            $collaborator->otp = static::generateOTP();
            $collaborator->otp_created = date('Y-m-d H:i:s');
            $collaborator->save();
        }
    }

    protected static function generateOTP() {
        $string = '1234567890';
        $string_shuffled = str_shuffle(str_shuffle($string));
        $otp = substr_replace(substr($string_shuffled, 1, 7), ' ', 3, 1);
        return $otp;
    }

    protected static function geneateCaptcha(){
        $str = '123456789ABCDEFGHJKMNabcghtuyoinmkw';
        $str_shuffled = str_shuffle(str_shuffle($str));
        $capt = substr($str_shuffled, 1, 6);
        return $capt;
    }

    public static function createCaptcha(){
        $captcha = static::geneateCaptcha();
        return $captcha;
    }

    public static function getRule(){
        return  $rule = [
            'name' => 'required',
            'tel' => 'required',
            'email' => 'nullable|email',
            'source' => 'required',
            'area' => 'required',
            'profile_picture'=> 'required',
            'idFont_picture' => 'required',
            'idBack_picture' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'numberID' => 'required',
            'areaID' => 'required',
            'dateID' => 'required',
        ];
    }
    public static function getInforCollaborator($filed, $value){
        return Collaborator::where($filed,$value)->first();
    }

    public static function prepaDataCollaborator($request){
        return    [
            'name' => $request->post('name','') ,
            'tel' => $request->post('tel',''),
            'email' => $request->post('email',''),
            'car_type' => $request->post('car_type',''),
             'source' =>  $request->post('source',''),
             'status' => 0,
            'otp' => Collaborator::generateOTP(),
            'area' => $request->post('area',''),
            'invitation_code' => $request->post('invitation_code',''),
            'address' => $request->post('address',''),
            'birthday' => $request->post('birthday',''),
            'numberID' => $request->post('numberID',''),
            'areaID' => $request->post('areaID',''),
            'dateID' => $request->post('dateID',''),
        ];

    }

    public static function insertCollaborator($collaborator){
        $modelColl = new Collaborator();
        $modelColl->name = $collaborator['name'];
        $modelColl->tel = $collaborator['tel'];
        if($collaborator['car_type'] == ""){
            $modelColl->car_type = "Cộng tác viên";
        }else{
            $modelColl->car_type = $collaborator['car_type'];
        }
        $modelColl->email =  $collaborator['email'];
        $modelColl->source = $collaborator['source'];
        $modelColl->status = $collaborator['status'];
        $modelColl->otp = $collaborator['otp'];
        $modelColl->area =  $collaborator['area'];
        $modelColl->invitation_code = $collaborator['invitation_code'];
        $modelColl->profile_picture = $collaborator['profile_picture'];
        $modelColl->driver_lic_picture = $collaborator['driver_lic_picture'];
        $modelColl->id_front_picture =$collaborator['id_front_picture'];
        $modelColl->id_back_picture = $collaborator['id_back_picture'];
        $modelColl->address = $collaborator['address'];
        $modelColl->birthday = $collaborator['birthday'];
        $modelColl->id_card_number = $collaborator['numberID'];
        $modelColl->card_area_create = $collaborator['areaID'];
        $modelColl->card_date_create = $collaborator['dateID'];
        Collaborator::creatAccessTokenOTP($modelColl);
        $modelColl->save();
        return $modelColl;

    }

    public static function addPhoto($photo)
    {   
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $file_name = rand(0, 1000).'_'.date('Y-m-d', time()).'.jpg';
        if($photo != ""){
            $s3 = \Storage::disk('s3');
            $filePath = 'collaborator/' . $file_name;
            $abc = $s3->put($filePath, base64_decode($photo), 'public');
            //Storage::disk('public')->put($file_name, base64_decode($photo));
            $url = \Storage::cloud()->url($filePath);
             return $url;
        } else{
            return "";
        }
       
    }

}

