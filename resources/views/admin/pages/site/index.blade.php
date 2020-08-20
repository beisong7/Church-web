<?php
$sidenav['site_info'] = 'active';
$data_col = "content-detached-left-sidebar";
$bd_class="content-detached-left-sidebar ecommerce-application";
?>
@extends('admin.layouts.app')

@section('vendor_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">

@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">

@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-10 col-sm-12">
                    <h2 class="content-header-title float-left mb-0">Site Info</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Info</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Data list view starts -->
        <section id="basic-input">
            <div class="row">
                <div class="col-12">
                    @include('layouts.notice')
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update available fields</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="needs-validation" novalidate action="{{ route('site.info.update') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $site->id }}">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Homepage Title</label>
                                                <input type="text" class="form-control" name="home_title" id="basicInput" placeholder="e.g Winnersdurumi" value="{{ $site->home_title }}">
                                                <p><small class="text-muted">Leave empty to make blank</small></p>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-8 col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="helperText">Homepage Subtitle</label>
                                                <input type="text" name="home_subtitle" id="helperText" class="form-control" placeholder="Example: Home of signs and wonders" value="{{ $site->home_subtitle }}">
                                                <p><small class="text-muted">Leave empty to make blank</small></p>
                                            </fieldset>
                                        </div>

                                        <div class="col-12">
                                            About Information
                                            <hr>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <label for="helperText">About Title</label>
                                                <input type="text" name="about_title" id="helperText" class="form-control" placeholder="Example: Worship with Us" value="{{ $site->about_title }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <label for="helperText">About Body</label>
                                                <textarea type="text" name="about_body" id="helperText" class="form-control" placeholder="Fill details ">{{ $site->about_body }}</textarea>
                                            </fieldset>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <label for="helperText">About Extra Info</label>
                                                <textarea type="text" name="about_extra" id="helperText" class="form-control" placeholder="Fill details ">{{ $site->about_extra }}</textarea>
                                            </fieldset>
                                        </div>

                                        <div class="col-12 mt-4">
                                            Service Brief
                                            <hr>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <label for="helperText">Service Note</label>
                                                <textarea type="text" name="service_info" id="helperText" class="form-control" placeholder="Fill details ">{{ $site->service_info }}</textarea>
                                            </fieldset>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <label for="helperText">Service Extra Note</label>
                                                <textarea type="text" name="service_extra" id="helperText" class="form-control" placeholder="Fill details ">{{ $site->service_extra }}</textarea>
                                            </fieldset>
                                        </div>

                                        <div class="col-12 mt-4">
                                            Contact Details
                                            <hr>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Site Email</label>
                                                <input autocomplete="off" type="text" class="form-control" name="email" id="basicInput" placeholder="email" value="{{ $site->email }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Site phone</label>
                                                <input autocomplete="off" type="text" class="form-control" name="phone" id="basicInput" placeholder="phone" value="{{ $site->phone }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Address</label>
                                                <input autocomplete="off" type="text" class="form-control" name="address" id="basicInput" placeholder="address" value="{{ $site->address }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-12 mt-4">
                                            Socials
                                            <hr>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Facebook</label>
                                                <input type="text" class="form-control" name="facebook" id="basicInput" placeholder="facebook" value="{{ $site->facebook }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Twitter</label>
                                                <input type="text" class="form-control" name="twitter" id="basicInput" placeholder="twitter" value="{{ $site->twitter }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Instagram</label>
                                                <input type="text" class="form-control" name="instagram" id="basicInput" placeholder="instagram" value="{{ $site->instagram }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Youtube</label>
                                                <input type="text" class="form-control" name="youtube" id="basicInput" placeholder="youtube" value="{{ $site->youtube }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-12 mt-4"></div>

                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Site Information</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Data list view end -->

    </div>

@endsection


@section('vendor_js')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

@endsection

@section('custom_js')
    <script src="{{ asset('app-assets/js/scripts/forms/form-tooltip-valid.js') }}"></script>
@endsection