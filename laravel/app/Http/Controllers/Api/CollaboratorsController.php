<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Registry\Registry;
use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Models\Setting;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Mail;
use Validator;

class CollaboratorsController extends Controller
{
    protected $result = [
        'code' => 0,
        'msg' => 'Fail',
        'data' => [],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_status()
    {
        $current_collaborator = Registry::get('current_collaborator');
        $approvalMode = Setting::first()->value;
        $status_text = [
            '0' => 'Chưa được phê duyệt',
            '1' => 'Hoạt động bình thường',
            '2' => 'Đã bị khóa',
        ];
        if ($current_collaborator) {
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            $this->result['data'] = [
                'approval_mode' => $approvalMode,
                'status' => $current_collaborator->status,
                'text' => $status_text[$current_collaborator->status],
            ];
        } else {
            $this->result['code'] = 100;
            $this->result['msg'] = 'Access token is invalid';
        }
        return response()->json($this->result);
    }

    public function info()
    {
        $current_collaborator = Registry::get('current_collaborator');
        $approvalMode = Setting::first()->value;
        $status_text = [
            '0' => 'Chưa phê duyệt',
            '1' => 'Hoạt động bình thường',
            '2' => 'Đã bị khóa',
        ];
        if ($current_collaborator) {
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            $this->result['data'] = [
                'name' => $current_collaborator->name ?? '',
                'email' => $current_collaborator->email ?? '',
                'tel' => $current_collaborator->tel ?? '',
                'status' => $current_collaborator->status ?? '',
                'text' => $status_text[$current_collaborator->status] ?? '',
                'area' => $current_collaborator->area ?? '',
                'car' => $current_collaborator->car_type ?? '',
                'approval_mode' => $approvalMode ?? '',
                'c_date' => $current_collaborator->c_date ?? '',
                'avatar' => $current_collaborator->profile_picture ?? '',
                'birthday' => $current_collaborator->birthday ?? '',
                'address' => $current_collaborator->address ?? '',
                'numberID' => $current_collaborator->id_card_number ?? '',
                'areaID' => $current_collaborator->card_area_create ?? '',
                'dateID' => $current_collaborator->card_date_create ?? '',
            ];
        }
        return response()->json($this->result);
    }

    public function login()
    {
        $request = request();
        $tel = $request->get('tel', null);
        $status_text = [
            '0' => 'Chưa phê duyệt',
            '1' => 'Hoạt động bình thường',
            '2' => 'Đã bị khóa',
        ];
        $current_collaborator = Collaborator::getCollaboratorByTel($tel);
        $otp = $current_collaborator->otp;
        $email = $current_collaborator->email;
        Mail::send('mailOTP', array('name' => 'Mã xác nhận OTP', 'otp' => $otp), function ($message) use ($email) {
            $message->to($email, 'Accept OTP')->subject('Mã OTP');
        });
        if ($current_collaborator) {
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            $this->result['data'] = [
                'access_token' => $current_collaborator->access_token,
            ];
        }
        return response()->json($this->result);
    }

    public function verify_pin()
    {
        $request = request();
        $pin = $request->get('pin', null);
        $current_collaborator = Registry::get('current_collaborator');
        if ($current_collaborator) {
            if ($current_collaborator->otp == $pin) {
                $this->result['code'] = 1;
                $this->result['msg'] = 'OK';
            } else {
                $this->result['code'] = 2;
                $this->result['msg'] = 'Sai OTP';
            }
        }
        return response()->json($this->result);
    }

    public function register()
    {
        $request = request();
        try {
            $rule = Collaborator::getRule();
            $validator = Validator::make($request->all(), $rule);
            if ($validator->fails()) {
                return response()->json($this->result);
            }
            // check tel exist
            $checkTel = Collaborator::getInforCollaborator('tel', $request->post('tel', ''));
            if ($checkTel == null) {
                $collaborator = Collaborator::prepaDataCollaborator($request);
                $filePro = Collaborator::addPhoto($request->post('profile_picture', ''));
                $collaborator['profile_picture'] = $filePro;
                $fileDri = Collaborator::addPhoto($request->post('lic_picture', ''));
                $collaborator['driver_lic_picture'] = $fileDri;
                $fileIdFont = Collaborator::addPhoto($request->post('idFont_picture', ''));
                $collaborator['id_front_picture'] = $fileIdFont;
                $fileIdBack = Collaborator::addPhoto($request->post('idBack_picture', ''));
                $collaborator['id_back_picture'] = $fileIdBack;
                //var_dump($collaborator);die;
                $ret = Collaborator::insertCollaborator($collaborator);
                //var_dump($ret);die;
                if ($ret) {
                    $this->result['code'] = 1;
                    $this->result['msg'] = 'OK';
                    $this->result['data'] = [
                        'access_token' => $ret->access_token,
                    ];
                }
                return response()->json($this->result);
            } else {
                $this->result['code'] = 2;
                $this->result['msg'] = 'Telephone is exist';
                return response()->json($this->result);
            }

        } catch (RequestException $e) {

            return response()->json($this->result);
        }
    }

    public function captcha()
    {
        $captcha = Collaborator::createCaptcha();
        if ($captcha) {
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            $this->result['data'] = [
                'captcha' => $captcha,
            ];
            return response()->json($this->result);
        }
    }

    public function contract()
    {
        $current_collaborator = Registry::get('current_collaborator');
        if ($current_collaborator->sign_picture) {
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            $this->result['data'] = [
                'url' => 'https://ctvoic.com.vn/contract?access_token=' . $current_collaborator->access_token,
            ];
        } else {
            $this->result['code'] = 2;
            $this->result['msg'] = 'OK';
            $this->result['data'] = [
                'url' => 'https://ctvoic.com.vn/contract?access_token=' . $current_collaborator->access_token,
            ];
        }
        return response()->json($this->result);
    }

    public function getSign()
    {
        $request = request();
        $sign = $request->post('sign', '');
        $current_collaborator = Registry::get('current_collaborator');
        if ($current_collaborator) {
            $fileSign = Collaborator::addPhoto($sign);
            $current_collaborator->sign_picture = $fileSign;
			$current_collaborator->m_date = date('Y-m-d H:i:s');
            $ret = $current_collaborator->save();
            if ($ret) {
                $this->result['code'] = 1;
                $this->result['msg'] = 'OK';
            }
        }
        return response()->json($this->result);
    }
}
