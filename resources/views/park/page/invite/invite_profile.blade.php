<?php
$data_col = "1-column";
$bd_class="1-column";
?>
@extends('layouts.singles')

@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/coming-soon.css') }}">
    <style>
        .getting-started {
            font-size: 1.5rem;
        }
    </style>
@endsection

@section('content')
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section>
            <div class="row d-flex vh-100 align-items-center justify-content-center">
                <div class="col-xl-5 col-md-8 col-sm-10 col-12 px-md-0 px-2">
                    <div class="card text-center w-100 mb-0">
                        <div class="card-header justify-content-center pb-0">
                            <div class="card-title">
                                <h4 class="mb-2">Admin Invite Account Creation</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <img src="{{ url('app-assets/images/pages/rocket.png') }}" class="img-responsive block width-150 mx-auto" width="150" alt="bg-img">
                                <div id="clockFlat" class="card-text text-center getting-started pt-0 d-flex justify-content-center flex-wrap"></div>
                                <p class="text-center"><small>Create account before countdown completes</small></p>
                                <div class="divider">
                                    <div class="divider-text">Account Details</div>
                                </div>
                                <p class="text-center mb-3">
                                    <small>Complete the fields below to have your account created.</small>
                                </p>
                                @include('layouts.notice')
                                <form class="form-horizontal" method="post" action="{{ route('submit.admin.invite', $invite->uuid) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <fieldset class="form-label-group">
                                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name" value="{{ old('first_name') }}" autocomplete="off" required>
                                                <label for="first_name">First Name</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <fieldset class="form-label-group">
                                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" value="{{ old('last_name') }}" autocomplete="off" required>
                                                <label for="last_name">Last Name</label>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <fieldset class="form-label-group">
                                                <input readonly type="text" class="form-control" id="user-email" placeholder="{{ $invite->email }}" value="{{ $invite->email }}">
                                                <label for="user-email">Email</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <fieldset class="form-label-group">
                                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ old('username') }}" autocomplete="off" required>
                                                <label for="username">Username</label>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <fieldset class="form-label-group">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                                <label for="password">Password</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <fieldset class="form-label-group">
                                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                                                <label for="confirm_password">Confirm Password</label>
                                            </fieldset>
                                        </div>

                                    </div>
                                    <button class="btn btn-primary w-100">Create {{ $invite->role->name }} Account</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


@section('vendor_js')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/coming-soon/jquery.countdown.min.js') }}"></script>
@endsection

@section('custom_js')
    {{--<script src="{{ asset('app-assets/js/scripts/pages/coming-soon.js') }}"></script>--}}
    <script>
        /*=========================================================================================
         File Name: page-coming-soon.js
         Description: Coming Soon
         ----------------------------------------------------------------------------------------
         Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
         Author: PIXINVENT
         Author URL: http://www.themeforest.net/user/pixinvent
         ==========================================================================================*/

        /*******************************
         *       js of Countdown        *
         ********************************/

        $(document).ready(function() {

            var todayDate = new Date();
            var unixTS = parseInt('{{ $invite->expire }}');
            var releaseDate = new Date(unixTS * 1000);

            console.log(releaseDate);

            var dd = releaseDate.getDate();
            var mm = releaseDate.getMonth() + 1;
            var yy = releaseDate.getFullYear();
            var releaseDate = yy + "/" + mm + "/" + dd;


            $('#clockFlat').countdown(releaseDate).on('update.countdown', function(event) {
                var $this = $(this).html(event.strftime('<div class="clockCard px-1"> <span>%d</span> <br> <p class="bg-amber clockFormat lead px-1 black"> Day%!d </p> </div>'
                    + '<div class="clockCard px-1"> <span>%H</span> <br> <p class="bg-amber clockFormat lead px-1 black"> Hour%!H </p> </div>'
                    + '<div class="clockCard px-1"> <span>%M</span> <br> <p class="bg-amber clockFormat lead px-1 black"> Minute%!M </p> </div>'
                    + '<div class="clockCard px-1"> <span>%S</span> <br> <p class="bg-amber clockFormat lead px-1 black"> Second%!S </p> </div>'))
            });


        });

    </script>
@endsection