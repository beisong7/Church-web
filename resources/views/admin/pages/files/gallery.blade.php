<?php
$sidenav['file'] = 'active';
$data_col = "content-detached-left-sidebar";
$bd_class="content-detached-left-sidebar ecommerce-application";
?>
@extends('admin.layouts.app')

@section('vendor_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/noui-slider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce-shop.css') }}">
    <style>
        div.item-img.text-center{
            background-color: #151a52 !important;
            height: 250px;
        }
    </style>
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-10">
                    <h2 class="content-header-title float-left mb-0">Files</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Files</li>
                        </ol>
                    </div>
                </div>
                <div class="col-2 text-right">
                    <a href="{{ route('file.upload') }}" class="btn btn-primary btn-small">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-detached content-right" style="float:none; margin-left: 0">
        <div class="content-body" style="margin-left: 0;">
            <div class="shop-content-overlay"></div>
            <!-- background Overlay when sidebar is shown  ends-->

            <!-- Ecommerce Search Bar Starts -->
            <section id="ecommerce-searchbar">
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <fieldset class="form-group position-relative">
                            <input type="text" class="form-control search-product" id="iconLeft5" placeholder="Search here">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </section>
            <!-- Ecommerce Search Bar Ends -->
            @include('layouts.notice')
            <!-- Ecommerce Products Starts -->
            <section id="ecommerce-products" class="grid-view">
                @foreach($files as $file)
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            <a href="#" style=" ">
                                <div class="item-img text-center" style="position: relative;vertical-align: middle;text-align: center;">
                                    <img class="img-fluid" src="{{ $file->thumb }}" alt="img-placeholder" style="max-height: 100%;max-width: 100%;width: auto;height: auto;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">
                                </div>
                            </a>
                            <div class="card-body">

                                <div>
                                    <h5 class="item-description">{{ $file->name }}</h5>
                                </div>
                                <div class="item-wrapper">
                                    <div>
                                        <p class="item-price">
                                            Width: {{ $file->width }}px
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-options text-center">
                                @if(!empty($model))
                                    @if($model==='slider')
                                        <div class="wishlist">
                                            <i class="fa fa-info-circle"></i> <span>
                                                {{ $file->sized }}MB
                                            </span>
                                        </div>
                                        <div class="cart">
                                            <a href="{{ route('add.slider', $file->uuid) }}"><i class="feather icon-layers"></i> <span class="">Add to Slider</span></a>
                                        </div>
                                    @endif
                                @else
                                    <div class="wishlist">
                                        <i class="fa fa-trash"></i> <span>Delete</span>
                                    </div>
                                    <div class="cart">
                                        <a href="#"><i class="feather icon-layers"></i> <span class="">Preview</span></a>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                @endforeach
                <!--
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            <div class="item-img text-center">
                                <a href="app-ecommerce-details.html">
                                    <img class="img-fluid" src="../../../app-assets/images/pages/eCommerce/1.png" alt="img-placeholder"></a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div class="item-rating">
                                        <div class="badge badge-primary badge-md">
                                            <span>4</span> <i class="feather icon-star"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="item-price">
                                            $39.99
                                        </h6>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="app-ecommerce-details.html">Amazon - Fire TV Stick with Alexa Voice Remote - Black</a>
                                    <p class="item-company">By <span class="company-name">Google</span></p>
                                </div>
                                <div>
                                    <p class="item-description">
                                        Enjoy smart access to videos, games and apps with this Amazon Fire TV stick. Its Alexa voice remote lets you
                                        deliver hands-free commands when you want to watch television or engage with other applications. With a
                                        quad-core processor, 1GB internal memory and 8GB of storage, this portable Amazon Fire TV stick works fast
                                        for buffer-free streaming.
                                    </p>
                                </div>
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-rating">
                                        <div class="badge badge-primary badge-md">
                                            <span>4</span> <i class="feather icon-star"></i>
                                        </div>
                                    </div>
                                    <div class="item-cost">
                                        <h6 class="item-price">
                                            $39.99
                                        </h6>
                                    </div>
                                </div>
                                <div class="wishlist">
                                    <i class="fa fa-heart-o"></i> <span>Wishlist</span>
                                </div>
                                <div class="cart">
                                    <i class="feather icon-shopping-cart"></i> <span class="add-to-cart">Add to cart</span> <a href="app-ecommerce-checkout.html" class="view-in-cart d-none">View In Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                -->
            </section>
            <!-- Ecommerce Products Ends -->

            <!-- Ecommerce Pagination Starts -->
            <section id="ecommerce-pagination">
                <div class="row">
                    <div class="col-sm-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mt-2">
                                <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <!-- Ecommerce Pagination Ends -->

        </div>
    </div>

@endsection


@section('vendor_js')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/ui/prism.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/wNumb.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/nouislider.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection

@section('custom_js')
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-shop.js') }}"></script>
@endsection