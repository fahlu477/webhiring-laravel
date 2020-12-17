@extends('layouts.auth.app')

@section('content')
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="{{ asset('template/login/images/img-01.png') }}" alt="IMG">
        </div>
        <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <span class="login100-form-title">{{ __('Reset Password') }}</span>
            <div class="wrap-input100 @error('email') validate-input alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror">
                <input class="input100" type="email" name="email" placeholder="{{ __('E-Mail Address') }}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">{{ __('Send Password Reset Link') }}</button>
            </div>

            <div class="text-center p-t-136">
                <a href="{{ route('register') }}" class="txt2">{{ __('Create your Account') }}
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>
    </div>
@endsection
