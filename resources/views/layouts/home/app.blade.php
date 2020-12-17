<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('template/mosh/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('template/mosh/css/responsive.css') }}">
        @stack('style')
    </head>
    <body>
        <div id="preloader"><div class="mosh-preloader"></div></div>
        @include('layouts.home.header')
        <div id="app">
            @yield('content')
        </div>
        @include('layouts.home.footer')
        <!-- jQuery-2.2.4 js -->
        <script src="{{asset('template/mosh/js/jquery-2.2.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('template/mosh/js/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{asset('template/mosh/js/bootstrap.min.js')}}"></script>
        <!-- All Plugins js -->
        <script src="{{asset('template/mosh/js/plugins.js')}}"></script>
        <!-- Active js -->
        <script src="{{asset('template/mosh/js/active.js')}}"></script>
        <!-- App scripts -->
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script>
            let alert_status = '{{ session('alert')['alert'] }}',
                alert_text   = '{{ session('alert')['message'] }}';
            if (alert_text && alert_status) {
                Swal.fire(
                    'Notification!',
                    alert_text,
                    alert_status
                )
            }
        </script>
    </body>
</html>
