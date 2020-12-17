@extends('layouts.auth.app')

@section('content')
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="{{ asset('template/login/images/img-01.png') }}" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
            <span class="login100-form-title">Member Login</span>
            <div class="wrap-input100 @error('email') validate-input alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror">
                <input class="input100" type="email" name="email" placeholder="{{ __('E-Mail Address') }}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <div class="wrap-input100 @error('password') validate-input alert-validate @enderror" data-validate="@error('password') {{ $message }} @enderror">
                <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">{{ __('Login') }}</button>
            </div>
            <div class="text-center p-t-12">
                @if (Route::has('password.request'))
                    <span class="txt1">Forgot</span>
                    <a class="txt2" href="{{ route('password.request') }}">{{ __('Email / Password ?') }}</a><br>
                @endif
            </div>
            <div class="text-center p-t-136">
                <a href="{{ route('register') }}" class="txt2">{{ __('Create your Account') }}
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>

    </div>
@endsection
