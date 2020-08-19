<?php $sidenav['dashboard'] = 'active';
$data_col = "2-columns";
$bd_class="2-columns";
?>
@extends('admin.layouts.app')

@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">

@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/card-analytics.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/tour/tour.css') }}">--}}

@endsection

@section('content')
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section id="dashboard-analytics">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ "0" }}</h2>
                            <p class="mb-0">Available Admin</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-layers text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ "0" }}</h2>
                            <p class="mb-0">Active Sliders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-heart-on text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ "0" }}</h2>
                            <p class="mb-0">Testimonies</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-list text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ "0" }}</h2>
                            <p class="mb-0">Pages</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-plus-circle text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ "0" }}</h2>
                            <p class="mb-0">Sermons</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-file text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ "0" }}</h2>
                            <p class="mb-0">Files</p>
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">92.6k</h2>
                            <p class="mb-0">Subscribers Gained</p>
                        </div>
                        <div class="card-content">
                            <div id="subscribe-gain-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-package text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">97.5K</h2>
                            <p class="mb-0">Orders Received</p>
                        </div>
                        <div class="card-content">
                            <div id="orders-received-chart"></div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </section>
    </div>


@endsection


@section('vendor_js')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
@endsection

@section('custom_js')
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
@endsection