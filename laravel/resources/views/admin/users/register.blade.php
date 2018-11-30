@extends('admin.layouts.admin')

@section('title', __('views.admin.users.register.title'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.users.register'],'method' => 'post','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    {{ __('views.admin.users.register.name') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" type="text"
                           class="form-control col-md-7 col-xs-12" name="name" placeholder="Le Van A" required
                           @if($errors->has('name')) parsley-error @endif >
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                    {{ __('views.admin.users.register.email') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="email" type="email"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('email')) parsley-error @endif"
                           name="email" placeholder="levana@gmail.com" required>
                    @if($errors->has('email'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('email') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">
                    Mật khẩu
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password" type="password" class="form-control col-md-7 col-xs-12 @if($errors->has('password')) parsley-error @endif"
                           name="password" >
                    @if($errors->has('password'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('password') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">
                    Nhập lại
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password_confirmation" type="password" class="form-control col-md-7 col-xs-12 @if($errors->has('password_confirmation')) parsley-error @endif"
                           name="password_confirmation">
                    @if($errors->has('password_confirmation'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('password_confirmation') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit"
                            class="btn btn-success"> {{ __('views.admin.users.register.create') }}</button>
                    <a class="btn btn-primary"
                       href="{{ URL::previous() }}"> {{ __('views.admin.users.register.cancel') }}</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
