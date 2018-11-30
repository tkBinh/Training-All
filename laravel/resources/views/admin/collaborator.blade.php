@extends('admin.layouts.admin') @section('content')


<style>
    #img {
        width: 10%;
        height: auto;
        margin-left: 200px;
    }

    .filter1 {
        margin-bottom: 10px;
        font-weight: bold;
    }

    a {
        cursor: pointer;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cộng tác viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table align="center" class="table">
                    <tr>
                        <td colspan="2" align="center">
                            <img id="img_avatar_colla" src="" width="100px" height="auto" />
                            <br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td id="id_colla"></td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td id="name_colla"></td>
                    </tr>
                    <tr>
                        <td>
                            Ngày sinh: <br />
                            (mm/dd/yyyy)
                        </td>
                        <td>                            
                            <input type="date" required id="birthday_input" name="birthday" placeholder="Ngày cấp CMT" value="" hidden /> 
                            <p class="birthday"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Nơi hoạt động:</td>
                        <td id="area_colla"></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td id="phone_colla"></td>
                    </tr>
                    <tr>
                        <td>Số Hợp đồng:</td>
                        <td id="">
                            <input type="text" required id="contract_number_colla" name="contractNumber" placeholder="Số hợp đồng" value="" hidden />
                            <p class="contract_number_colla"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Số tài khoản:</td>
                        <td id="phone_colla">
                            <input type="text" required id="acount_number_colla" name="acountNumber" placeholder="Số tài khoản" value="" hidden/>
                            <p class="acount_number_colla"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngân hàng:</td>
                        <td id="phone_colla">
                            <input type="text" required id="name_bank_colla" name="bankName" placeholder="Ngân hàng" value="" hidden />
                            <p class="name_bank_colla"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ email:</td>
                        <td id="email_colla"></td>
                    </tr>
                    <tr>
                        <td>Loại xe:</td>
                        <td id="car_colla"></td>
                    </tr>
                    <tr>
                        <td>Ảnh CMT:</td>
                        <td>
                            <img id="img_cmt_front_colla" src="" width="100px" height="auto" />
                            <img id="img_cmt_back_colla" src="" width="100px" height="auto" />
                        </td>
                    </tr>
                    <tr>
                        <td>Số CMT:</td>
                        <td>                            
                            <input type="text" required id="id_card_number_input" name="id_card_number" placeholder="Số CMT" value="" hidden />
                            <p class="id_card_number"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngày cấp CMT: <br />
                            (mm/dd/yyyy)
                        </td>
                        <td>                            
                            <input type="date" required id="card_date_create_input" name="card_date_create" placeholder="Ngày cấp CMT" value="" hidden /> 
                            <p class="card_date_create"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nơi cấp CMT:
                        </td>
                        <td>                            
                            <input type="text" required id="card_area_create_input" name="card_area_create" placeholder="Nơi cấp CMT" value="" hidden /> 
                            <p class="card_area_create"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Địa chỉ thường trú:
                        </td>
                        <td>                            
                            <input type="text" required id="address_input" name="address" placeholder="Địa chỉ" value="" hidden /> 
                            <p class="address"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày tham gia:</td>
                        <td id="created_colla"></td>
                    </tr>
                    <tr>
                        <td>Chữ ký:</td>
                        <td>
                            <img id="sign_picture" src="" width="100px" height="auto" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_edit" value="edit">Sửa</button>
                <button type="submit" class="btn btn-success" id="btn_save" style="display: none" name="idColla" value="">Lưu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Danh sách CTV
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="filter1 col-md-12">
            <form action="{{route('admin.collaborator')}}" method="get" name="form1">
                <div class="filter1 col-md-4">
                    <label>Họ tên</label>
                    <input type="text" name="name" class="form-control" @if($name != null) value="{{$name}}" @endif/> 
                </div>
                <div class="filter1 col-md-4">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" @if($email != null) value="{{$email}}" @endif/> 
                </div>
                <div class="filter1 col-md-4">
                    <label>Số ĐT</label>
                    <input type="text" name="tel" class="form-control" @if($tel != null) value="{{$tel}}" @endif/> 
                </div>
                <div class="filter1 col-md-4">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="" @if($status==="" ) selected="selected" ; @endif>Tất cả</option>
                        <option value="0" @if($status==='0' ) selected="selected" ; @endif>Chờ phê duyệt</option>
                        <option value="1" @if($status==='1' ) selected="selected" ; @endif>Đã phê duyệt</option>
                        <option value="2" @if($status==='2' ) selected="selected" ; @endif>Đang Khóa</option>
                    </select>
                </div>
                <div class="filter1 col-md-12">
                    <input type="submit" class="btn btn-info" value="Lọc">
                </div>
            </form>
        </div>

        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="color: black">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số ĐT</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($collaborators as $key => $collaborator)
                <tr id="{{$collaborator->id}}" class="item">
                    <td>
                        {{$collaborator->id}}
                        <p hidden id="{{$collaborator->id . 'area'}}">{{$collaborator->area}}</p>
                        <p hidden id="{{$collaborator->id . 'phone'}}">{{$collaborator->tel}}</p>
                        <p hidden id="{{$collaborator->id . 'email'}}">{{$collaborator->email}}</p>
                        <p hidden id="{{$collaborator->id . 'acount_number'}}">{{$collaborator->acount_number}}</p>
                        <p hidden id="{{$collaborator->id . 'name_bank'}}">{{$collaborator->name_bank}}</p>
                        <p hidden id="{{$collaborator->id . 'contract_number'}}">{{$collaborator->contract_number}}</p>
                        <p hidden id="{{$collaborator->id . 'car'}}">{{$collaborator->car_type}}</p>
                        <p hidden id="{{$collaborator->id . 'image_cmt_front'}}">{{$collaborator->id_front_picture}}</p>
                        <p hidden id="{{$collaborator->id . 'image_cmt_back'}}">{{$collaborator->id_back_picture}}</p>
                        <p hidden id="{{$collaborator->id . 'image_avt'}}">{{$collaborator->profile_picture}}</p>
                        <p hidden id="{{$collaborator->id . 'image_sign'}}">{{$collaborator->sign_picture}}</p>
                        <p hidden id="{{$collaborator->id . 'birthday'}}">{{$collaborator->birthday}}</p>
                        <p hidden id="{{$collaborator->id . 'id_card_number'}}">{{$collaborator->id_card_number}}</p>
                        <p hidden id="{{$collaborator->id . 'card_date_create'}}">{{$collaborator->card_date_create}}</p>
                        <p hidden id="{{$collaborator->id . 'card_area_create'}}">{{$collaborator->card_area_create}}</p>
                        <p hidden id="{{$collaborator->id . 'address'}}">{{$collaborator->address}}</p>
                    </td>
                    <td id="{{$collaborator->id . 'name'}}" value="{{$collaborator->name}}">
                        <a id="name" data-toggle="modal" data-target="#exampleModal" value="{{$collaborator->id}}">{{$collaborator->name}}</a>
                    </td>
                    <td id="{{$collaborator->id . 'email'}}" value="{{$collaborator->email}}">{{$collaborator->email}}</td>
                    <td id="{{$collaborator->id . 'tel'}}" value="{{$collaborator->tel}}">{{$collaborator->tel}}</td>
                    <td id="{{$collaborator->id . 'c_date'}}" value="{{$collaborator->c_date}}">{{$collaborator->c_date}}</td>
                    <td id="{{$collaborator->id . 'status'}}" value="{{$collaborator->status}}">@if ($collaborator->status == 1) Đã duyệt @elseif ($collaborator->status == 2) Đã khóa @else Đang chờ @endif</td>
                    @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.collaborator.edit')))
                    <td>
                        <a class="btn btn-xs btn-warning" href="{{ route('admin.collaborator.history', ['collaborator' => $collaborator->id])}}"
                           data-toggle="tooltip" data-placement="top" data-title="Lịch sử">
                            <i class="fa fa-history"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.collaborator.status', ['collaborator' => $collaborator->id,'status'=>2])}}"
                           data-toggle="tooltip" data-placement="top" data-title="Block">
                            <i class="fa fa-times"></i>
                        </a>
                        @if ($collaborator->status != 1)
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.collaborator.status', ['collaborator' => $collaborator->id,'status'=>1])}}"
                           data-toggle="tooltip" data-placement="top" data-title="Duyệt">
                            <i class="fa fa-check"></i>
                        </a>
                        @endif
                    </td>
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.table-responsive -->
        <div class="pull-right">
            {{ $collaborators->appends(['status' => $status,'name'=>$name,'email'=>$email,'tel',$tel])->links()}}
        </div>
    </div>
    <!-- /.panel-body -->
</div>
@endsection 
@section('scripts') 
@parent {{ Html::script(mix('assets/admin/js/dashboard.js')) }} 
{{ Html::script('js/jquery.dataTables.min.js')}} 
{{ Html::script('js/dataTables.bootstrap.min.js') }} 
{{ Html::script('js/dataTables.responsive.js') }}
{{ Html::script('js/collaborator.js') }}
@endsection 
@section('styles') @parent {{ Html::style('assets/admin/css/dashboard.css') }} {{ Html::style('css/metisMenu.min.css')
}} {{ Html::style('css/dataTables.bootstrap.css') }} {{ Html::style('css/dataTables.responsive.css') }} @endsection