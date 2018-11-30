<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Helpers\Registry\Registry;

class CustomersController extends Controller
{

    protected $result = [
        'code' => 0,
        'msg' => 'Fail',
        'data' => []
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $page = $request->get('page', 1);
        $offset = ($page - 1) * 15;
        $limit = 15;
        $current_collaborator = Registry::get('current_collaborator');
        if ($current_collaborator) {
            $customers = Customer::getCustomerOfCollaborator($current_collaborator->id, $offset, $limit);
            if (count($customers) <= 0) {
                $this->result['code'] = 1;
                $this->result['msg'] = 'No data';
                return response()->json($this->result);
            }
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            foreach ($customers as $cus) {
                $this->result['data'][] = [
                    'name' => $cus->name ?? '',
                    'tel' => $cus->tel ?? '',
                    'status' => $cus->status ?? '',
                    'photo' => $cus->photo ?? '',
                    'ts' => $cus->c_date,
                    'note' => $cus->note ?? ''
                ];
            }
        }
        return response()->json($this->result);
    }

    public function text()
    {
        $request = request();
        $text = $request->post('text', ''); 
        $current_collaborator = Registry::get('current_collaborator');
        if($current_collaborator) {
            $ret = Customer::addText($current_collaborator->id, $text);

            if($ret) {
                $this->result['code'] = 1;
                $this->result['msg'] = 'OK';
            }
        }
        return response()->json($this->result);
    }

    public function photo()
    {
        $request = request();
        $photo = $request->post('data','');
        $current_collaborator = Registry::get('current_collaborator');
        if($current_collaborator) {
            $ret = Customer::addPhoto($current_collaborator->id, $photo);
            //var_dump($ret);die;
            if($ret) {
                $this->result['code'] = 1;
                $this->result['msg'] = 'OK';
            }
        }
        return response()->json($this->result);
    }

}
