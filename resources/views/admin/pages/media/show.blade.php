<?php
$sidenav['media'] = 'active';
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
                    <h2 class="content-header-title float-left mb-0">Media</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('media.index') }}">Media</a></li>
                            <li class="breadcrumb-item active">Show Media Group</li>
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
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Media Group</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->
                                @include('layouts.notice')
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control slug-update" placeholder="Group Title" value="{{ $media->title }}" required data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Information</label>
                                                <textarea type="text" name="info" class="form-control" placeholder="Information" required>{{ $media->info }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Slug</label>
                                                <input type="hidden" name="slug" class="slug-replace" value="{{ $media->slug }}">
                                                <input disabled="disabled" type="text" class="form-control slug-replace" placeholder="Titled Slug" value="{{ $media->slug }}" required data-validation-required-message="This  field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                        <div class="">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                                        <i class="feather icon-layers"></i> <span class="d-none d-sm-block"> Media Group Items</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="row">
                                            @forelse($media->items as $item)
                                                @include('admin.pages.media.item')

                                            @empty
                                                <div class="col-12">
                                                    <h4 class="text-center">
                                                        No Item
                                                    </h4>
                                                    <a href="{{ route('gallery.list', ['type'=>'all', 'model'=>'media', 'action'=>'add', 'anchor'=>$media->uuid, 'return'=>'media.index']) }}"
                                                       class="">Add Items</a>
                                                </div>
                                            @endforelse
                                        </div>

                                    </div>


                                </div>

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

    <script>
        $(document).ready(function () {
            $('.slug-update').on('keyup', function (e) {
                let val = $(this).val();
                $('.slug-replace').val(val.replace(/\s/g, '-'))
            })
        })
    </script>
@endsection