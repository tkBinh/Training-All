<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Helpers\Registry\Registry;

class CommissionsController extends Controller
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
        $month = $request->get('month', null);
        $year = $request->get('year', null);
        $offset = ($page - 1) * 15;
        $limit = 15;
        $current_collaborator = Registry::get('current_collaborator');
        if ($current_collaborator) {
            $commissions = Commission::getCommissionOfCollaborator($current_collaborator->id, $month, $year, $offset, $limit);
            if (count($commissions) <= 0) {
                $this->result['code'] = 1;
                $this->result['msg'] = 'No data';
                return response()->json($this->result);
            }
            $this->result['code'] = 1;
            $this->result['msg'] = 'OK';
            foreach($commissions as $row) {
                $this->result['data'][] = [
                    'amount' => $row->amount,
                    'ts' => $row->c_date,
                    'note' => $row->note ?? ''
                ];
            }
        }
        return response()->json($this->result);
    }

}
