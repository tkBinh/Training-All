@extends('admin.layouts.admin') @section('content')
<style>
    #img {
    width: 100px;
    height: auto;
}

#img1 {
    width: 70%;
    height: auto;
    margin-left: 80px;
}

.filter1 {
    margin-bottom: 10px;
    font-weight: bold;
}
#img_modal{
    max-height: 500px;
    max-width: 500px;
}
td{
    max-width: 200px;
    word-wrap: break-word;
}
img {
    cursor: pointer;
}
.display-status {
    padding-top: 23px;
    float: left;
    width: 175px;
}
.edit-status{
    float: right;
    padding-top: 23px;
}
</style>

<div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Zoom out Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="img_modal" src="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thưởng hoa hồng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" role="form">
                    <b>Số tiền :</b>
                    <input type="text" style="width:40%" name="bonus" placeholder="0" required /> VNĐ<br><br>
                    <i style="font-size:15px"><span id="text-money">Không đồng !</span> </i><br><br>
                    <b>Ghi chú :</b>
                    <textarea rows="4" id="commission_note" style="width:100%" name="note" placeholder="Thêm ghi chú..."></textarea>
                    <input type="hidden" id="customer_id" name="customer_id" />
                    <input type="hidden" id="collaborator_id" name="collaborator_id" />
                    <input type="hidden" id="customer_id" name="customer_id" />
                    <br><br>
                </form>
                <br>
                <br>
                <p hidden id="error_bonus"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit" class="btn btn-primary">Thưởng</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Trạng thái bán hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" role="form">
                    <div class="radio">
                        <label><input type="radio" id="editStatus_1" name="editStatus" value="1">Đã bán được hàng</label><br>
                        <label><input type="radio" id="editStatus_2" name="editStatus" value="2">Chưa bán được hàng</label><br>
                        <label><input type="radio" id="editStatus_3" name="editStatus" value="3">Trùng lặp</label><br>
                    </div>
                    <b>Ghi chú :</b>
                    <textarea rows="4" id="editStatus_note" style="width:100%" name="note" placeholder="Thêm ghi chú..."></textarea>
                    <input type="hidden" id="customer_id" name="customer_id" />
                    <br><br>
                </form>
                <br><br>
                <p hidden id="error_status"></p>
            </div>
            <div class="modal-footer">
                <input class="btn btn-secondary btn-primary" type="submit" value="Lưu" id="submit-status" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Danh sách Khách hàng
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="filter1 col-md-12">
            <form action="{{route('customer')}}" method="get" name="form1">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="filter1 col-md-6">
                    <div class="from-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="" @if($status==="" ) selected="selected" ; @endif>Tất Cả</option>
                            <option value="0" @if($status==='0' ) selected="selected" ; @endif>Đang chờ</option>
                            <option value="1" @if($status==='1' ) selected="selected" ; @endif>Đã bán được hàng</option>
                            <option value="2" @if($status==='2' ) selected="selected" ; @endif>Chưa bán được hàng</option>
                            <option value="3" @if($status==='3' ) selected="selected" ; @endif>Trùng lặp</option>
                        </select>
                    </div>
                </div>
                <div class="filter1 col-md-6">
                    <label>Ngày</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="date" @if(isset($date)) value="{{$date}}" @endif class="form-control" />
                    </div>
                </div>
                <div class="filter1 col-md-6">
                    <label>Mã code</label>
                    <select name="invitation_code" class="form-control">
                        <option value='-1' @if($invitation_code===- 1) selected="selected" ; @endif>Tất cả</option>
                        @foreach($listInvitation_code as $listCode)
                        @if($listCode->invitation_code != null || trim($listCode->invitation_code," ") != "")
                        <option value="{{$listCode->invitation_code}}" @if($invitation_code===$listCode->invitation_code)
                            selected="selected" @endif>{{$listCode->invitation_code}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="filter1 col-md-12">
                    <input type="submit" class="btn btn-info" value="Lọc">
                </div>
            </form>
        </div>
        <br>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="color: black">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Dữ liệu nhân được</th>
                    <th>Xác thực Khách hàng</th>
                    <th>Thời gian được gửi</th>
                    <th>Người gửi</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>
                        @if($customer->text != "") {{$customer->text}} @elseif($customer->photo != "")
                        <img src="{{$customer->photo}}" height="50px" width="auto" /> @else
                        <audio controls>
                            <source href="https://nhac.vn/tam-su-tuoi-30-trinh-thang-binh-sol9KDX" type="audio/mpeg">
                        </audio>
                        @endif
                    </td>
                    <td style="width:250px">
                        <div style="float:left;">
                            <table>
                                <tr>
                                    <td>Tên KH:</td>
                                    <td style="max-width: 150px;">
                                        <input type="text" required id="customer_name{{$customer->id}}" name="customer_name{{$customer->id}}"
                                            placeholder="Nhập tên KH" value="{{$customer->name}}" @if($customer->name
                                        != '') hidden @endif >
                                        <b id="show_name{{$customer->id}}" @if($customer->name == '') hidden
                                            @endif>{{$customer->name }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SĐT:</td>
                                    <td>
                                        <input type="text" required id="phone{{$customer->id}}" name="phone{{$customer->id}}"
                                            placeholder="Nhập SĐT" value="{{$customer->tel}}" @if($customer->tel != '')
                                        hidden @endif >
                                        <b id="show_phone{{$customer->id}}" @if($customer->tel == '') hidden
                                            @endif>{{$customer->tel}}</b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.customer.edit')))
                        <div style="float:right;padding-top:20px;padding-right:20px;">
                            @if($customer->name != '' && $customer->tel != '')
                            <button type="button" class="btn btn-xs btn-primary fa fa-edit" data-toggle="tooltip"
                                data-placement="top" data-title="Sửa" value="{{$customer->id}}" id="btn-edit{{$customer->id}}"></button>
                            <button type="submit" id="btn-save{{$customer->id}}" class="btn btn-xs btn-primary fa fa-save"
                                data-toggle="tooltip" data-placement="top" data-title="Lưu" value="{{$customer->id}}"
                                style="display: none"></button>
                            @endif
                        </div>
                        @endif
                    </td>
                    <td>{{$customer->c_date}}</td>
                    <td><a href="admin/collaborator/{{$nameColla[$customer->id]->id}}/history">{{$nameColla[$customer->id]->name}}</a>
                        <br>
                        @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.customer.bonus'))
                        && $customer->status
                        == 1)
                        <span data-toggle="modal" data-target="#exampleModal" id="button{{$customer->id}}" value="{{$customer->collaborator_id}}">
                            <a class="btn btn-xs btn-danger" data-target="#exampleModal" data-toggle="tooltip"
                                data-placement="top" data-title="Thưởng">
                                <i class="fa fa-thumbs-o-up"></i>
                            </a>
                        </span>
                        @endif
                    </td>
                    <td style="max-width:220px;">
                        <div class="display-status">
                            <label>
                                @if($customer->status==1)Đã bán được hàng @endif
                                @if($customer->status==2)Chưa bán được hàng @endif
                                @if($customer->status==3)Trùng lặp @endif
                            </label><br>
                            <p><b>Note:</b> {{$customer->note}}</p>

                        </div>
                        <div class="edit-status">
                            <span data-toggle="modal" data-target="#statusModal" id="statusButton{{$customer->id}}"
                                value="{{$customer->id}}">
                                <a id="edit-status" class="btn btn-xs btn-primary fa fa-edit" data-target="#exampleModal"
                                    data-toggle="tooltip" data-placement="top" data-title="Sửa" value="{{$customer->id}}">
                                </a>
                            </span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.table-responsive -->
        <div class="pull-right">
            {{ $customers->appends(['status' => $status,'date'=>$date,'invitation_code'=>$invitation_code])->links()}}
        </div>
    </div>
    <!-- /.panel-body -->
</div>
@endsection @section('scripts') @parent {{ Html::script(mix('assets/admin/js/dashboard.js')) }} {{
Html::script('js/jquery.dataTables.min.js')}}
{{ Html::script('js/dataTables.bootstrap.min.js') }} {{ Html::script('js/dataTables.responsive.js') }} {{
Html::script('js/ajax.js')}}
@endsection @section('styles') @parent {{ Html::style('css/metisMenu.min.css')}} @endsection