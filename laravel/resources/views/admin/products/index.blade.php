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

        a.add-btn {
            float: right;
            position: absolute;
            top: 2px;
            right: 0;
        }

        .color-black {
            color: black;
        }

        .relative {
            position: relative;
        }
    </style>
    <br>
    <div class="panel panel-default relative">
        <div class="panel-heading">
            Sản phẩm
            <a class="add-btn" href="{{ route('admin.products.add') }}">
            <span id="test" class="btn btn-primary">
                <i class="fa fa-plus"></i> Thêm mới
            </span>
            </a>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="filter1 col-md-12">
                <form action="{{route('admin.products')}}" method="get" name="form1">
                    <div class="filter1 col-md-12">
                        <label>Tiêu đề</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="title" class="form-control"
                                       @if($title != null) value="{{$title}}" @endif/>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-info" value="Lọc">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <table width="100%" class="table table-striped table-bordered table-hover color-black"
                   id="dataTables-example">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu dề</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Ngày sửa</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.product.edit')))
                            <td>
                                <a href="#" id="{{$product->id}}" value="news">
                                    @if($product->status == 1 )
                                        <span class="label label-primary" id="user{{$product->id}}">Public</span>
                                    @else
                                        <span class="label label-danger" id="user{{$product->id}}">Private</span>
                                    @endif
                                </a>
                            </td>
                        @endif
                        <td>{{$product->c_date}}</td>
                        <td>{{$product->m_date}}</td>
                        <td>
                            <a class="btn btn-xs btn-primary"
                               href="{{ route('admin.products.detail', ['id' => $product->id]) }}" data-toggle="tooltip"
                               data-placement="top" data-title="Chi tiết">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs btn-info"
                               href="{{ route('admin.products.edit', ['id' => $product->id]) }}" data-toggle="tooltip"
                               data-placement="top" data-title="Sửa">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
            <p class="alert alert-success fade in" id="error" hidden></p>
            <div class="pull-right">
                {{ $products->links() }}
            </div>
        </div>
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



