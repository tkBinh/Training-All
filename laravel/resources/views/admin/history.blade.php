@extends('admin.layouts.admin')

@section('content')
<style>
    .filter1 {
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
<div class="panel panel-default">
    <div class="panel-heading">
        Lịch sử thưởng hoa hồng
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="filter1 col-md-12">
            {{ Form::open(['route'=>['admin.collaborator.history', $collaborator],'method' => 'get']) }}
            <input type="hidden" id="collaborator_id" name="collaborator_id" value="{{$collaborator}}" />
            <input type="hidden" id="indexMonth" value="{{$indexMonth}}" />
            <div class="filter1 col-md-4">
                <label>Năm</label>
                <select name="year" class="form-control" id="selectYear">
                    <option value="">Tất cả</option>
                    @foreach($listYear as $year)
                    <option value="{{$year->year}}" @if($year->year==$indexYear) selected="selected"@endif>{{$year->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter1 col-md-4">
                <label>Tháng</label>
                <select name="month" class="form-control" id="selectMonth">
                    <option value="">Tất cả</option>
                </select>
            </div>
            <div class="filter1 col-md-12">
                <input id="filter" type="submit" class="btn btn-info" value="Lọc">
            </div>
            {{ Form::close() }}
        </div>
        <br>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="color: black">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thời gian thưởng</th>
                    <th>Số tiền ( VNĐ )</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commissions as $commission)
                <tr>
                    <td>{{$commission->id}}</td>
                    <td>{{$commission->c_date}}</td>
                    <td>{{number_format($commission->amount)}} VNĐ</td>
                    <td>{{$commission->note}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.table-responsive -->
        <div class="pull-right">
            {{ $commissions->appends(['year' => $indexYear,'month'=>$indexMonth])->links()}}
        </div>
        <div class="pull-left">
            <p style="color: red; font-size:15px"><b style="color: black">Tổng số tiền: </b>{{number_format($total)}} VNĐ</p>
        </div>
    </div>
    <!-- /.panel-body -->
</div>

@endsection
@section('scripts')
@parent
{{ Html::script(mix('assets/admin/js/dashboard.js')) }}
{{ Html::script('js/collaborator.js') }}
@endsection

@section('styles')
@parent
{{ Html::style('css/metisMenu.min.css') }}
@endsection