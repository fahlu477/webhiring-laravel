<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet"
          href="{{ asset('/template/adminLte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('/template/adminLte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/template/adminLte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('/template/adminLte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/template/adminLte/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/template/adminLte/dist/css/adminLte.min.css') }}">
    <!-- adminLte Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/template/adminLte/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('header.css')
    @stack('header.javascript')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.admin.header')
    @include('layouts.admin.left_sidebar' )
    <div id="app" class="content-wrapper">
        @yield('content')
    </div>
    @include('layouts.admin.footer')
</div>

@stack('footer.css')
<!-- jQuery 3 -->
<script src="{{ asset('/template/adminLte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/template/adminLte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('/template/adminLte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/template/adminLte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- adminLte App -->
<script src="{{ asset('/template/adminLte/dist/js/adminLte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/template/adminLte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('/template/adminLte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/template/adminLte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('/template/adminLte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- adminLte for demo purposes -->
<script src="{{ asset('/template/adminLte/dist/js/demo.js') }}"></script>
<!-- Input Mask -->
<script type="text/javascript"
        src="{{ asset('template/adminLte/bower_components/inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
<!-- App scripts -->
@stack('footer.javascript')
</body>
</html>
