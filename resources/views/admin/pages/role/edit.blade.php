<?php
$sidenav['role'] = 'active';
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
                    <h2 class="content-header-title float-left mb-0"> Roles</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role.index') }}"> Roles</a></li>
                            <li class="breadcrumb-item active">Edit | {{ $role->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="users-edit">
            @include('layouts.notice')
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Edit Role</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->


                                <form method="post" action="{{ route('role.update', $role->uuid) }}" enctype="multipart/form-data">
                                    {{ method_field('put') }}
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Role Title / Name *</label>
                                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="Super Admin" required data-validation-required-message="This title field is required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="table-responsive border rounded px-1 ">
                                                <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission</h6>
                                                <div class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                <tr>
                                                                    <th>Module</th>
                                                                    <th>Access</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($list1 as $list)
                                                                    <tr>
                                                                        <td>Manage {{ str_replace('modify', '', str_replace('_', ' ', $list)) }}</td>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" id="{{ $list }}" class="custom-control-input" name="{{ $list }}" {{ $role->$list?'checked':'' }}>
                                                                                <label class="custom-control-label" for="{{ $list }}"></label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                <tr>
                                                                    <th>Module</th>
                                                                    <th>Access</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($list2 as $list)
                                                                    <tr>
                                                                        <td>Manage {{ str_replace('modify', '', str_replace('_', ' ', $list)) }}</td>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" id="{{ $list }}" class="custom-control-input" name="{{ $list }}" {{ $role->$list?'checked':'' }}>
                                                                                <label class="custom-control-label" for="{{ $list }}"></label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                Update Role
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