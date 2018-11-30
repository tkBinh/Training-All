@extends('admin.layouts.admin')

@section('title',__('views.admin.users.show.title', ['name' => $product->title]) )
<style>
    th {
        width: 120px;
    }

    td {
        max-width: 500px;
        word-wrap: break-word;
    }

    img {
        max-width: 200px;
    }

</style>
@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>Tiêu đề</th>
                <td>{{$product->title}}</td>
            </tr>

            <tr>
                <th>Nội dung</th>
                <td>
                    {!!$product->content!!}
                </td>
            </tr>

            <tr>
                <th>Hình ảnh</th>
                <td>
                    <img src="{{$product->photo}}"/>
                </td>
            </tr>

            <tr>
                <th>Trạng thái</th>
                <td>
                    @if($product->status == 1)
                        <span class="label label-primary" id="user{{$product->id}}">Public</span>
                    @else
                        <span class="label label-danger" id="user{{$product->id}}">Private</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td>{{$product->c_date}}</td>
            </tr>

            <tr>
                <th>Ngày sửa</th>
                <td>{{$product->m_date}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <a href="{{\Illuminate\Support\Facades\URL::previous()}}">
        <button type="submit" class="btn btn-primary"> Quay lại</button>
    </a>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection

