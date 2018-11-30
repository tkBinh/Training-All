@extends('admin.layouts.admin') @section('title',__('views.admin.roles.edit.title', ['name' => "$roles->name"]) )
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        {{ Form::open(['route'=>['admin.roles.update', $roles->id],'method' => 'put','class'=>'form-horizontal
        form-label-left'])}}

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">
                Id
                <span class="required"> </span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="id" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('id')) parsley-error @endif"
                    name="id" value="{{ $roles->id }}" required readonly=""> @if($errors->has('id'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('id') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                {{ __('views.admin.roles.create.name') }}
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif"
                    name="name" value="{{ $roles->name }}" required> @if($errors->has('name'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('name') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                Quyền cho phép
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel-default ">
                    <div class="panel-body">
                        @foreach($permissions as $permission)
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="permission-{{$permission['permission']->id}}" value="{{$permission['permission']->id}}"
                              id="{{$permission['permission']->key}}"  @if($permission[ 'access' ]) checked @endif> {{$permission['permission']->name}}
                        </label>
                        @if($permission['permission']->key == 'customer.view' || $permission['permission']->key == 'collaborator.view')
                        <input id="allow-{{$permission['permission']->id}}" class="form-control" type="text" name="allow-{{$permission['permission']->id}}"
                            value="{{$permission['allow']}}" @if(!$permission['access']) style="display:none" @endif>
                        @endif
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <a class="btn btn-primary" href="{{ URL::previous() }}"> Hủy</a>
            <button type="submit" class="btn btn-success"> Lưu</button>
        </div>
    </div>
    {{ Form::close() }}
</div>
</div>
@endsection @section('styles') @parent {{ Html::style(mix('assets/admin/css/users/edit.css')) }} @endsection
@section('scripts')
@parent {{ Html::script(mix('assets/admin/js/users/edit.js')) }} 
{{ Html::script('js/slider.js') }}
@endsection