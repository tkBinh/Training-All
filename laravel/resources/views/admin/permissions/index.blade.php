@extends('admin.layouts.admin') @section('title', __('views.admin.permissions.index.title')) @section('content')
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>@sortablelink('id', __('views.admin.permissions.index.table_header_0'),['page' => $permissions->currentPage()])</th>
                <th>@sortablelink('name', __('views.admin.permissions.index.table_header_1'),['page' => $permissions->currentPage()])</th>
                <th>@sortablelink('c_date', __('views.admin.permissions.index.table_header_2'),['page' => $permissions->currentPage()])</th>
                <th>@sortablelink('m_date', __('views.admin.permissions.index.table_header_3'),['page' => $permissions->currentPage()])</th>
                @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.permission.edit')))
                <th>{{__('views.admin.permissions.index.table_header_4')}}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->c_date }}</td>
                <td>{{ $permission->m_date }}</td>
                @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.permission.edit')))
                <td>
                    <a class="btn btn-xs btn-info" href="{{ route('admin.permissions.edit', [$permission->id])}}" data-toggle="tooltip" data-placement="top"
                        data-title="{{ __('views.admin.permissions.index.edit') }}">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>

    </table>
    <a href="{{route('admin.permissions.show_create_permission')}}">
        <button class="btn btn-primary">Thêm quyền truy cập</button>
    </a>
    <p class="alert alert-success fade in" id="error" hidden></p>
    <div class="pull-right">
        {{ $permissions->links() }}
    </div>
</div>
@endsection