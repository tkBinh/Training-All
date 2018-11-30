@extends('auth.layouts.auth') @section('body_class','login') @section('content')
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                {{ Form::open(['route' => 'login']) }}
                <h1>OIC Management Website</h1>

                <div>
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="User name" required
                        autofocus>
                </div>
                <div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('views.auth.login.input_1') }}"
                        required>
                </div>
                <div class="checkbox al_left">
                    <label>
                        <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> {{ __('views.auth.login.input_2') }}
                    </label>
                </div>

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert">
                    {!! $errors->first() !!}
                </div>
                @endif @if (session('warning'))
                <span class="alert alert-warning help-block">
                    <strong>{{ session('warning') }}</strong>
                </span>
                @endif
                <div>
                    <button class="btn btn-default submit" type="submit">{{ __('views.auth.login.action_0') }}</button>
                    <!-- <a class="reset_pass" href="{{ route('password.request') }}">
                        {{ __('views.auth.login.action_1') }}
                    </a> -->
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <span>{{ __('views.auth.login.message_0') }}</span>
                    <div>
                        <a href="{{ route('social.redirect', ['google']) }}" class="btn btn-success btn-google-plus">
                            <i class="fa fa-google-plus"></i>
                            Google+
                        </a>
                        {{--
                        <a href="{{ route('social.redirect', ['facebook']) }}" class="btn btn-success btn-facebook">--}} {{--
                            <i class="fa fa-facebook"></i>--}} {{--Facebook--}} {{--
                        </a>--}} {{--
                        <a href="{{ route('social.redirect', ['twitter']) }}" class="btn btn-success btn-twitter">--}} {{--
                            <i class="fa fa-twitter"></i>--}} {{--Twitter--}} {{--
                        </a>--}}
                    </div>
                </div>
        </div>
        {{ Form::close() }}
        </section>
    </div>
</div>
</div>
@endsection @section('styles') @parent {{ Html::style(mix('assets/auth/css/login.css')) }} @endsection