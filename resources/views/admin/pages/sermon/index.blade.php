<?php
$sidenav['sermon'] = 'active';
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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-list-view.css') }}">

@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-10 col-sm-12">
                    <h2 class="content-header-title float-left mb-0">Sermons</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sermons</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 text-right">
                    <a href="{{ route('sermon.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Data list view starts -->
        <section id="data-list-view" class="data-list-view-header">


            <div class="row">
                <div class="col">
                    @include('layouts.notice')
                </div>
            </div>
            <!-- TABLE START -->
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sermons</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th style="max-width: 400px">TITLE</th>
                                            <th>LAST UPDATE</th>
                                            <th>PUBLISHED</th>
                                            <th>ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($sermons as $sermon)
                                            <tr>
                                                <td class="product-category" style="max-width: 400px">{{ $sermon->title }}</td>
                                                <td class="product-category">{{ date('F d, Y', strtotime($sermon->created_at)) }}</td>
                                                <td class="product-category">{{ $sermon->published?'Yes':'No' }}</td>
                                                <td class="product-action">
                                                    <a href="{{ route('sermon.toggle', $sermon->uuid) }}" class="ml-2 text-white">
                                                        @if($sermon->published)
                                                            <i title="Un-Publish" class="text-danger feather icon-cloud-lightning"></i>
                                                        @else
                                                            <i title="Publish" class=" feather icon-upload"></i>
                                                        @endif
                                                    </a>
                                                    <a href="{{ route('sermon.edit', $sermon->uuid) }}" class="ml-2 text-white">
                                                        <i title="Start Edit" class=" feather icon-edit"></i>
                                                    </a>
                                                    <span title="Delete Immediately" class="ml-2 action-delete" data-uuid="{{ $sermon->uuid }}"><i class="feather icon-trash"></i></span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <h4 class="text-center">No Records Found</h4>
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    {{ $sermons->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- TABLE ENDS -->
        </section>
        <!-- Data list view end -->

    </div>

@endsection


@section('vendor_js')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
@endsection

@section('custom_js')
    <script>

    </script>
@endsection