<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Helpers\Permissions\Permissions;

class SettingController extends Controller
{

    protected $result = [
        'code' => 0,
        'msg' => 'Fail',
        'data' => []
    ];

    public function banner()
    {
        $picture1 = Setting::getBanner('banner_picture1') ?? (object) ['value' => ''];
        $picture2 = Setting::getBanner('banner_picture2') ?? (object) ['value' => ''];
        $picture3 = Setting::getBanner('banner_picture3') ?? (object) ['value' => ''];
        $version = Setting::getBanner('version') ?? (object) ['value' => ''];
        if ($picture1->value != "" || $picture2->value != "" || $picture3->value != "") {
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            $this->result['data'] = [
                'picture1' => $picture1->value ?? '',
                'picture2' => $picture2->value ?? '',
                'picture3' => $picture3->value ?? '',
            ];
        } else {
            $this->result['code'] = 0;
            $this->result['msg'] = 'No Picture';
            $this->result['data'] = [];
        }
        $this->result['data']['version'] = $version->value;
        return response()->json($this->result);
    }

}
