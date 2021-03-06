<!-- VENDOR FONT ICONS CSS -->
<link rel="stylesheet" href="{{ asset('fonticons/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('fonticons/et-line/et-line-font.css') }}">
<link rel="stylesheet" href="{{ asset('fonticons/material-webfont/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('fonticons/pixeden/pe-icon-7-stroke.css') }}">
<link rel="stylesheet" href="{{ asset('fonticons/simplelineicons/css/simple-line-icons.css') }}">

<!-- COMMON VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('vendor/app/animate-css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/app/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/app/sweetalert/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/app/jarallax/jarallax.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/app/owlcarousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/app/magnific-popup/magnific-popup.css') }}">

<!-- PAGE SPECIFIC VENDOR CSS -->
@if(@$season==='christmas')
    <link rel="stylesheet" href="{{ asset('vendor/app/snow3d/snow-effect.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('vendor/app/youtubebackground/css/jquery.mb.YTPlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/app/vegas/vegas.min.css') }}">
@endif


<!-- TEMPLATE COMMON CSS -->
<link rel="stylesheet" href="{{ asset('css/ckav-main.css')."?v=".@$ver }}">
<link rel="stylesheet" href="{{ asset('css/ckav-elements.css')."?v=".@$ver }}">
<link rel="stylesheet" href="{{ asset('css/ckav-helper.css')."?v=".@$ver }}">
<link rel="stylesheet" href="{{ asset('css/ckav-responsive.css')."?v=".@$ver }}">

<!-- DEMO SPECIFIC TEMPLATE CSS -->

<!-- TEMPLATE THEME CSS -->

<!-- TEMPLATE USER CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/template-custom.css')."?v=".@$ver }}">