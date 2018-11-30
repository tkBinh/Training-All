@extends('admin.layouts.admin')
@section('content')
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
<br>
<div class="panel panel-default" style="position: relative;">
    <div class="panel-heading">
        Tin tức
        <a style="float: right; position: absolute; top: 2px; right: 0;" href="{{ route('admin.news.add') }}">
            <span id="test" class="btn btn-primary">
                <i class="fa fa-plus"></i> Thêm mới
            </span>
        </a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

        <div class="filter1 col-md-12">
            <form action="{{route('admin.news')}}" method="get" name="form1">
                <div class="filter1 col-md-4">
                    <label>Tiêu đề</label>
                    <input type="text" name="title" class="form-control" @if($title != null) value="{{$title}}" @endif/> 
                </div>
                <div class="filter1 col-md-8">
                    <label>Mục</label>
                    <div class="row">
                        <div class="col-md-5">
                            <select name="cat" class="form-control">
                                <option value="" @if($cat==="" ) selected="selected" ; @endif>Tất cả</option>
                                <option value="1" @if($cat==='1' ) selected="selected" ; @endif>Tin tức</option>
                                <option value="2" @if($cat==='2' ) selected="selected" ; @endif>Giới thiệu</option>
                                <option value="3" @if($cat==='3' ) selected="selected" ; @endif>Tuyển dụng</option>
                                <option value="4" @if($cat==='4' ) selected="selected" ; @endif>Trách nhiệm xã hội</option>
                                <option value="5" @if($cat==='5' ) selected="selected" ; @endif>Hỗ trợ khách hàng</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-info" value="Lọc">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"
               style="color: black">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Ngày sửa</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $new)
                <tr >
                    <td>{{$new->id}}</td>
                    <td>{{$new->title}}</td>
                    @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.news.edit')))
                    <td>
                        <a href="#" id="{{$new->id}}" value="news">
                            @if($new->status == 1 )
                                <span class="label label-primary" id="user{{$new->id}}">Public</span>
                            @else
                                <span class="label label-danger" id="user{{$new->id}}">Private</span>
                            @endif
                        </a>
                    </td>
                    @endif
                    <td>{{$new->c_date}}</td>
                    <td>{{$new->m_date}}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.news.detail', ['id' => $new->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Chi tiết">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.news.edit', ['id' => $new->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Sửa">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.table-responsive -->
        <p class="alert alert-success fade in" id="error"  hidden></p>
        <div class="pull-right">
                {{ $news->appends(['cat' => $cat])->links()}}
            </div>
    </div>
    <!-- /.panel-body -->
</div>
@endsection

@section('scripts')
@parent
{{--{{ Html::script(mix('assets/admin/js/dashboard.js')) }}--}}

{{ Html::script('js/ajax.js') }}
@endsection

@section('styles')
@parent
{{ Html::style(mix('assets/admin/css/dashboard.css')) }}
{{ Html::style('css/metisMenu.min.css') }}
{{ Html::style('css/dataTables.bootstrap.css') }}
{{ Html::style('css/dataTables.responsive.css') }}
@endsection



