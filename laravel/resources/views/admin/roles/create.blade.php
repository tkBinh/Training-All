@extends('admin.layouts.admin') @section('title', __('views.admin.roles.create.title')) @section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        {{ Form::open(['route'=>['admin.roles.create'],'method' => 'post','class'=>'form-horizontal form-label-left']) }}

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                {{ __('views.admin.roles.create.name') }}
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" type="text" name="name" placeholder="" required class="form-control col-md-7 col-xs-12" @if($errors->has('name')) parsley-error; @endif > @if($errors->has('name'))
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
                            <input type="checkbox" class="form-check-input" name="permission-{{$permission->id}}" value="{{$permission->id}}"
                            id="{{$permission->key}}"> {{$permission->name}}
                        </label>
                        @if($permission->key == 'customer.view' || $permission->key == 'collaborator.view')
                        <input id="allow-{{$permission->id}}" class="form-control" type="text" name="allow-{{$permission->id}}"
                            value="" style="display: none;">
                        @endif 
                        <br> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success"> {{ __('views.admin.roles.create.create') }}</button>
                <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.roles.create.cancel') }}</a>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
@section('scripts') 
@parent 
{{ Html::script('js/slider.js') }}
@endsection