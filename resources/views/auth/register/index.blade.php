@extends('layouts.auth.app')

@section('content')
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="{{ asset('template/login/images/img-01.png') }}" alt="IMG">
        </div>
        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="login100-form-title">{{ __('Register') }}</span>

            <div class="wrap-input100 @error('name') validate-input alert-validate @enderror"
                 data-validate="@error('name') {{ $message }} @enderror">
                <input class="input100" type="text" name="name" placeholder="{{ __('Full Name') }}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>

            <div class="wrap-input100 @error('email') validate-input alert-validate @enderror"
                 data-validate="@error('email') {{ $message }} @enderror">
                <input class="input100" type="email" name="email" placeholder="{{ __('E-Mail Address') }}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>

            <div class="wrap-input100 @error('password') validate-input alert-validate @enderror"
                 data-validate="@error('password') {{ $message }} @enderror">
                <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>

            <div class="wrap-input100 @error('password_confirmation') validate-input alert-validate @enderror"
                 data-validate="@error('password_confirmation') {{ $message }} @enderror">
                <input class="input100" type="password" name="password_confirmation"
                       placeholder="{{ __('Confirm Password') }}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">{{ __('Register') }}</button>
            </div>

            <div class="text-center p-t-136">
                <a href="{{ route('login') }}" class="txt2">{{ __('I already have a membership') }}
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>
    </div>
@endsection
