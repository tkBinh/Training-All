@extends('admin.layouts.admin')

@section('title', __('views.admin.permissions.create.title'))

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        {{ Form::open(['route'=>['admin.permissions.create'],'method' => 'post','class'=>'form-horizontal form-label-left']) }}

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                {{ __('views.admin.permissions.create.name') }}
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" type="text" name="name" placeholder="" required
                class="form-control col-md-7 col-xs-12" @if($errors->has('name')) parsley-error; @endif >
                @if($errors->has('name'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('name') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="key">
                {{ __('views.admin.permissions.create.key') }}
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="key" type="text" name="key" placeholder="" required
                class="form-control col-md-7 col-xs-12" @if($errors->has('key')) parsley-error; @endif >
                @if($errors->has('key'))
                <ul class="parsley-errors-list filled">
                    @foreach($errors->get('key') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit"
                class="btn btn-success"> {{ __('views.admin.permissions.create.create') }}</button>
                <a class="btn btn-primary"
                href="{{ URL::previous() }}"> {{ __('views.admin.permissions.create.cancel') }}</a>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
