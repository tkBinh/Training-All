@extends('admin.layouts.admin')

@section('title',__('views.admin.users.show.title', ['name' => $news->title]) )
<style>
    th{
        width: 120px;
    }
    td{
        max-width: 500px;
        word-wrap: break-word;
    }

</style>
@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>Tiêu đề</th>
                <td>{{$news->title}}</td>
            </tr>

            <tr>
                <th>Nội dung</th>
                <td>
                    {!!$news->content!!}
                </td>
            </tr>

            <tr>
                <th>Trạng thái</th>
                <td>
                        @if($news->status == 1 )
                            <span class="label label-primary" id="user{{$news->id}}">Active</span>
                        @else
                            <span class="label label-danger" id="user{{$news->id}}">Inactive</span>
                        @endif
                </td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td>{{$news->c_date}}</td>
            </tr>

            <tr>
                <th>Ngày sửa</th>
                <td>{{$news->m_date}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <a href="{{\Illuminate\Support\Facades\URL::previous()}}"><button type="submit" class="btn btn-primary"> Quay lại</button></a>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection

