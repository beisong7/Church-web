<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard | {{ config('app.name', '') }}</title>

    <meta name="keywords" content="Winners Chapel Durumi, Winners, Durumi, Worship, Home, Signs, Wonders" />

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- FAVICONS -->
    <link rel="icon" href="{{ url('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ url('images/logo.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('images/logo.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ url('images/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('images/logo.png') }}">

    <!-- WEB FONT-FAMILY -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    @yield('vendor_css')
    @include('admin.layouts.scripts.css')
    @yield('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="vertical-layout vertical-menu-modern dark-layout {{ @$bd_class }}  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="{{ @$data_col }}" data-layout="dark-layout">

    @include('admin.layouts.header')
    @include('admin.layouts.sidenav')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            @yield('content')

        </div>
    </div>
    <!-- END: Content-->

    @include('admin.layouts.overlays')

    @include('admin.layouts.footer')

    @yield('vendor_js')
    @include('admin.layouts.scripts.js')
    @yield('custom_js')

</body>
</html>
