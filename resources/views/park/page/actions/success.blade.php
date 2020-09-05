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
                                <h4 class="mb-2">Success Notice</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <img src="{{ url('app-assets/images/pages/maintenance-2.png') }}" class="img-responsive block width-150 mx-auto" width="150" alt="bg-img">

                                @if(empty($message))
                                    <div class="divider">
                                        <div class="divider-text">No Action Found</div>
                                    </div>

                                    <p class="text-center mb-3">
                                        You may have missed the message. Check your inbox or login to continue.
                                    </p>
                                @else
                                    <div class="divider">
                                        <div class="divider-text">Success</div>
                                    </div>

                                    <p class="text-center mb-3">
                                        {{ $message }}
                                    </p>
                                @endif

                                <br>
                                <a href="{{ route('admin.login') }}" class="btn btn-primary w-100">Login</a>


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
@endsection

@section('custom_js')
    {{--<script src="{{ asset('app-assets/js/scripts/pages/coming-soon.js') }}"></script>--}}

@endsection