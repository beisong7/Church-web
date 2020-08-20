<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ url('images/logo.png') }}"/>

    <meta name="description" content="Winners Chapel Durumi, Home of Signs and Wonders. Worship with us every Sunday and Wednesdays. Jesus is Lord.">
    <meta name="keywords" content="Winners Chapel Durumi, Winners, Durumi, Worship, Home, Signs, Wonders">
    <meta name="author" content="synergynode.com, winnersdurumi.org, technical-unit">

    <!-- FAVICONS -->
    <link rel="icon" href="{{ url('') }}">
    <link rel="apple-touch-icon" href="{{ url('') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('') }}">

    <!-- WEB FONT-FAMILY -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
    @include('layouts.scripts.css')
</head>
<body class="ckav-body tooltip-light">

<div id="loader">
    <div class="load-three-bounce">
        <div class="load-child bounce1"></div>
        <div class="load-child bounce2"></div>
        <div class="load-child bounce3"></div>
    </div>
</div>


    <div class="ckav-body">
        @include('layouts.header')
        @include('layouts.navbar')

        @yield('content')
    </div>
    @include('layouts.scripts.js')
</body>
</html>
