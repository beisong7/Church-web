<?php
$sidenav['preacher'] = 'active';
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
                    <h2 class="content-header-title float-left mb-0"> preachers</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('preacher.index') }}"> Preachers</a></li>
                            <li class="breadcrumb-item active">New</li>
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
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">New preacher</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->


                                <form method="post" action="{{ route('preacher.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>preacher Title </label>
                                                    <select name="title" class="form-control" required>
                                                        <option value="" selected disabled>Choose</option>
                                                        <option value="Bishop" {{ old('title')==='Bishop'?'selected':'' }}>Bishop</option>
                                                        <option value="Pastor" {{ old('title')==='Pastor'?'selected':'' }}>Pastor</option>
                                                        <option value="Deacon" {{ old('title')==='Deacon'?'selected':'' }}>Deacon</option>
                                                        <option value="Evangelist" {{ old('title')==='Evangelist'?'selected':'' }}>Evangelist</option>
                                                        <option value="Dr" {{ old('title')==='Dr'?'selected':'' }}>Dr</option>
                                                        <option value="Mr" {{ old('title')==='Mr'?'selected':'' }}>Mr</option>
                                                        <option value="Mrs" {{ old('title')==='Mrs'?'selected':'' }}>Mrs</option>
                                                        <option value="Ms" {{ old('title')==='Ms'?'selected':'' }}>Ms</option>
                                                        <option value="Miss" {{ old('title')==='Miss'?'selected':'' }}>Miss</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name" class="form-control" placeholder="example: Encounter with destiny..." autocomplete="off" value="{{ old('first_name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="example: Encounter with destiny..." autocomplete="off" value="{{ old('last_name') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="basicInputFile">With Browse button</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imgInp" name="image" value="{{ old('image') }}" accept="image/*" onchange="shwimg()">
                                                    <label class="custom-file-label" for="inputGroupFile01">Image file only</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="p-1">
                                                    <img class="img-thumbnail" id="imgtoshow" src="{{ url('images/user.png') }}" alt="" style="width: 30%; max-height: 200px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 ">
                                                Create Preacher
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

    <script src="{{ url('app-assets/js/scripts/pages/app-user.js') }}"></script>
    <script src="{{ url('app-assets/js/scripts/navs/navs.js') }}"></script>

    <script>
        function shwimg(){
            // get the image to show selected image
            var i = document.getElementById('imgInp');

            //
            var filetoload = $("#imgInp")[0];

            // initiate the file reader object
            var reader = new FileReader();
            // read the contents of image file
            reader.readAsDataURL(filetoload.files[0]);
            reader.onload = function(e){
                // set the image source
                let srcs = e.target.result;

                jQuery('#imgtoshow').attr('src', srcs);

                // try to add result to another input
                // jQuery('#imgurl').val(e.target.result);
            }
            // another way to get the source of a file
            //=======================================//
            //display selected image into the image tag
            //document.getElementById('thepicture').src = window.URL.createObjectURL(i.files[0]);
        }
    </script>
@endsection