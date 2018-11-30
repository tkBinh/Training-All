
@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Biểu đồ báo cáo
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-bar-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        @foreach($arr_date as $key => $date)
            <input type="hidden" id="all{{$key}}" value="{{$date['all']}}">
            <input type="hidden" id="success{{$key}}" value="{{$date['success']}}">
            <input type="hidden" id="date{{$key}}" value="{{$date['date']}}">
        @endforeach
        <!-- /.panel -->
    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('js/metisMenu.min.js') }}
    {{ Html::script('js/raphael.min.js') }}
    {{ Html::script('js/morris.min.js') }}
    {{ Html::script('js/morris-data.js') }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
    {{ Html::style('css/morris.css') }}
    {{ Html::style('css/metisMenu.min.css') }}
@endsection




