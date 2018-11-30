@extends('admin.layouts.admin')

@section('title', __('views.admin.roles.index.title'))

@section('content')
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
    width="100%">
    <thead>
        <tr>
            <th>@sortablelink('id', __('views.admin.roles.index.table_header_0'),['page' => $roles->currentPage()])</th>
            <th>@sortablelink('name',  __('views.admin.roles.index.table_header_1'),['page' => $roles->currentPage()])</th>
            <th>@sortablelink('c_date', __('views.admin.roles.index.table_header_2'),['page' => $roles->currentPage()])</th>
            <th>@sortablelink('m_date', __('views.admin.roles.index.table_header_3'),['page' => $roles->currentPage()])</th>
            @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.role.edit')))
            <th>{{__('views.admin.roles.index.table_header_4')}}</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->c_date }}</td>
            <td>{{ $role->m_date }}</td>
            @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.role.edit')))
            <td>
                <a class="btn btn-xs btn-info" href="{{ route('admin.roles.edit', [$role->id])}}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.roles.index.edit') }}">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>

</table>
<a href="{{route('admin.roles.show_create_role')}}"><button class="btn btn-primary">Thêm vai trò mới</button></a>
<p class="alert alert-success fade in" id="error"  hidden></p>
<div class="pull-right">
    {{ $roles->links() }}
</div>
</div>
@endsection
