<?php $ver = "01" ?>
        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($title)?$title." | LFC Durumi":config('app.name', 'LFC Durumi') }}</title>
    <link rel="icon" type="image/png" href="{{ url('images/logo.png') }}"/>

    <meta name="description" content="{{ !empty($description)?$description:'Winners Chapel Durumi, Home of Signs and Wonders. Services.' }}">
    <meta name="keywords" content="Winners Chapel Durumi, Winners, Durumi, Worship, Home, Signs, Wonders">
    <meta name="author" content="winnersdurumi.org, technical-unit with synergynode.com">

    <!-- FAVICONS -->
    <link rel="icon" href="{{ url('') }}">
    <link rel="apple-touch-icon" href="{{ url('') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('') }}">

    <?php $metas = ['image', 'title', 'description', 'type', 'url',]; ?>
    @foreach($metas as $meta)
        @if(!empty($og))
            @if(!empty($og[$meta]))
                <meta property="og:{{ $meta }}" content="{{ $og[$meta] }}">
            @endif
        @endif
    @endforeach

    <!-- WEB FONT-FAMILY -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
    @include('layouts.otherpage.scripts.css')
    @yield('custom_css')
</head>
<body>

    <div id="preloader"></div>

    @include('layouts.otherpage.navbar')
    <main>
        @yield('content')
    </main>
    @include('layouts.otherpage.footer')
</body>
</html>
