<?php
$sidenav['admin'] = 'active';
$data_col = "2-columns";
$bd_class="2-columns";
?>
@extends('admin.layouts.app')

@section('vendor_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">


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
                    <h2 class="content-header-title float-left mb-0">Admins</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active">{{ $admin->first_name }}</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Edit Account</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->


                                <form method="post" action="{{ route('admin.update', $admin->uuid) }}" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('put') }}

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="media mb-2">
                                                <a class="mr-2 my-25" href="#">
                                                    <img src="{{ url('images/user.png') }}" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
                                                </a>
                                                <div class="media-body mt-50">
                                                    <div class="col-12 d-flex mt-1 px-0">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Select user image (optional)</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $admin->username }}" required data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $admin->first_name }}" required data-validation-required-message="This  field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $admin->last_name }}" required data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>E-mail</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $admin->email }}" required data-validation-required-message="This email field is required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control">
                                                    <option selected disabled>Select Role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->uuid }}" {{ $admin->role_id===$role->uuid?'selected':'' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                Update Account
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
    {{--<script src="{{ asset('app-assets/js/scripts/ui/data-list-view.js') }}"></script>--}}
    <script src="{{ url('app-assets/js/scripts/pages/app-user.js') }}"></script>
    <script src="{{ url('app-assets/js/scripts/navs/navs.js') }}"></script>
@endsection