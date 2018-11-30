@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Xin lỗi,Bạn không có quyền truy cập vào trang {{$content}}!</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
