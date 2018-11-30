@extends('admin.layouts.admin')

@section('title', __('views.admin.users.index.title'))

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.user.edit')))
                <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                @endif
                <th>@sortablelink('c_date', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('m_date', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th>
                @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.user.edit')))
                <th>{{__('views.admin.users.index.table_header_4')}}</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                    @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.user.edit')))
                    <td>
                        {{--{{route('admin.users.active', ['user' => $user->id])}}--}}
                        <a href="#" id="{{$user->id}}" value="users" class="active">
                        @if($user->active == 1)
                            <span class="label label-primary" id="user{{$user->id}}" >{{ __('views.admin.users.index.active') }}</span>
                        @else
                            <span class="label label-danger" id="user{{$user->id}}" >{{ __('views.admin.users.index.inactive') }}</span>
                        @endif
                        </a>
                    </td>
                    @endif
                    <td>{{ $user->c_date }}</td>
                    <td>{{ $user->m_date }}</td>
                    @if(App\Helpers\Permissions\Permissions::checkPermisison(config('permission.user.edit')))
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>

        </table>
        <a href="{{route('admin.users.show_register_form')}}"><span class="btn btn-primary">Thêm người dùng</span></a>
        <p class="alert alert-success fade in" id="error"  hidden></p>
        <div class="pull-right">
            {{ $users->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script('js/ajax.js') }}
@endsection