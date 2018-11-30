@extends('admin.layouts.admin')

@section('title',__('views.admin.users.edit.title', ['name' => "$permissions->name"]) )

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        {{ Form::open(['route'=>['admin.permissions.update', $permissions->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id" >
                Id
                <span class="required"> </span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="id" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('id')) parsley-error @endif"
                name="id" value="{{ $permissions->id }}" required readonly="">
                @if($errors->has('id'))
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
                Tên permission
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif"
                name="name" value="{{ $permissions->name }}" required>
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
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a class="btn btn-primary" href="{{ URL::previous() }}"> Hủy</a>
                <button type="submit" class="btn btn-success"> Lưu</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('styles')
@parent
{{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
@parent
{{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection