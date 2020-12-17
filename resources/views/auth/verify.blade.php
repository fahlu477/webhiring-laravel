@extends('layouts.auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Konfirmasi Akun') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi telah dikirimkan ke email Anda..') }}
                        </div>
                    @endif

                    {{ __(' Klik pada link yang telah Anda terima untuk melakukan verifikasi akun.') }}
                    {{ __('Jika Anda tidak menerima email') }},
                    <a href="{{ route('verification.resend') }}" style="color: #0b58a2">
                        {{ __('klik di sini untuk mengirim ulang email verifikasi') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
