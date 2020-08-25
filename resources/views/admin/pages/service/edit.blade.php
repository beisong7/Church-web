<?php
$sidenav['service'] = 'active';
$data_col = "2-columns";
$bd_class="2-columns";
?>
@extends('admin.layouts.app')

@section('vendor_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">

@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/app-user.css') }}">
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-10 col-sm-12">
                    <h2 class="content-header-title float-left mb-0"> Services</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('service.index') }}"> Services</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="users-edit">
            <div class="row">
                <div class="col">
                    @include('layouts.notice')
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Edit {{ $service->title }}</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->


                                <form method="post" action="{{ route('service.update', $service->uuid) }}" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('put') }}

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Service Title / Name *</label>
                                                    <input type="text" name="title" value="{{ $service->title }}" class="form-control" placeholder="sunday service, midweek service" required data-validation-required-message="This title field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Service Theme *</label>
                                                    <input type="text" name="theme" value="{{ $service->theme }}" class="form-control" placeholder="example: Encounter with destiny..." required data-validation-required-message="This title field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Service Sub Title</label>
                                                    <input type="text" name="sub_title" value="{{ $service->sub_title }}" class="form-control" placeholder="example: fasting and prayer , anointing service">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Service Instruction</label>
                                                    <input type="text" name="instruction" value="{{ $service->instruction }}" class="form-control" placeholder="example: come with your anointing oil">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Service Time Schedule *</label>
                                                    <input type="text" name="service_time" value="{{ $service->service_time }}" class="form-control" placeholder="example: 9:30 AM | 5:30 PM" required data-validation-required-message="This title field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Service Link</label>
                                                    <input type="text" name="service_link" value="{{ $service->service_link }}" class="form-control" placeholder="example: http://youtube.com/c/winnersdurumi">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Service Date * </label><!-- 2020-08-30 -->
                                                    <input type="date" name="date" value="{{ date('Y-m-d', $service->date) }}" class="form-control" placeholder="Date" required data-validation-required-message="This field is required">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                Update Service
                                            </button>
                                        </div>
                                    </div>
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
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>

    <!-- BEGIN Vendor JS-->

    <script src="{{ url('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>

@endsection

@section('custom_js')

    <script src="{{ url('app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>
    <script src="{{ url('app-assets/js/scripts/pages/app-user.js') }}"></script>
    <script src="{{ url('app-assets/js/scripts/navs/navs.js') }}"></script>
@endsection