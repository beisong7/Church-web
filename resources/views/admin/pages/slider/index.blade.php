<?php
$sidenav['slider'] = 'active';
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
                    <h2 class="content-header-title float-left mb-0">Sliders</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sliders</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 text-right">
                    <a href="{{ route('gallery.list', ['type'=>'image', 'model'=>'slider']) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Data list view starts -->
        <section id="data-list-view" class="data-list-view-header">


            <!-- DataTable starts -->
            <div class="table-responsive">
                <table class="table data-list-view">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ADDED</th>
                        <th>THUMB</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td></td>
                            <td class="product-name">{{ $slider->created_at->diffForHumans() }}</td>
                            <td class="product-category">
                                <img src="{{ $slider->image->thumbnail->pic }}" alt="" style="max-width: 150px">
                            </td>
                            <td class="product-category">{{ $slider->active?'Active':'Inactive' }}</td>
                            <td class="product-action">
                                <span class="action-delete" data-uuid="{{ $slider->uuid }}"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- DataTable ends -->
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
    {{--<script src="{{ asset('app-assets/js/scripts/ui/data-list-view.js') }}"></script>--}}
    <script>
        /*=========================================================================================
         File Name: data-list-view.js
         Description: List View
         ----------------------------------------------------------------------------------------
         Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
         Author: PIXINVENT
         Author URL: http://www.themeforest.net/user/pixinvent
         ==========================================================================================*/

        $(document).ready(function() {
            "use strict"
            // init list view datatable
            var dataListView = $(".data-list-view").DataTable({
                responsive: false,
                columnDefs: [
                    {
                        orderable: true,
                        targets: 0,
                        checkboxes: { selectRow: true }
                    }
                ],
                dom:
                    '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
                oLanguage: {
                    sLengthMenu: "_MENU_",
                    sSearch: ""
                },
                aLengthMenu: [[10, 20, 30], [10, 20, 30]],
                select: {
                    style: "multi"
                },
                order: [[1, "asc"]],
                bInfo: false,
                pageLength: 10,
                buttons: [
                    {
//                        text: "<i class='feather icon-plus'></i> Add New",
//                        action: function() {
//                            $(this).removeClass("btn-secondary")
//                            $(".add-new-data").addClass("show")
//                            $(".overlay-bg").addClass("show")
//                            $("#data-name, #data-price").val("")
//                            $("#data-category, #data-status").prop("selectedIndex", 0)
//                        },
//                        className: "btn-outline-primary"
                    }
                ],
                initComplete: function(settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            });

            dataListView.on('draw.dt', function(){
                setTimeout(function(){
                    if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
                    }
                }, 50);
            });

            // init thumb view datatable
            var dataThumbView = $(".data-thumb-view").DataTable({
                responsive: false,
                columnDefs: [
                    {
                        orderable: true,
                        targets: 0,
                        checkboxes: { selectRow: true }
                    }
                ],
                dom:
                    '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
                oLanguage: {
                    sLengthMenu: "_MENU_",
                    sSearch: ""
                },
                aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
                select: {
                    style: "multi"
                },
                order: [[1, "asc"]],
                bInfo: false,
                pageLength: 4,
                buttons: [
                    {
                        text: "<i class='feather icon-plus'></i> Add New",
                        action: function() {
                            $(this).removeClass("btn-secondary")
                            $(".add-new-data").addClass("show")
                            $(".overlay-bg").addClass("show")
                        },
                        className: "btn-outline-primary"
                    }
                ],
                initComplete: function(settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            })

            dataThumbView.on('draw.dt', function(){
                setTimeout(function(){
                    if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
                    }
                }, 50);
            });

            // To append actions dropdown before add new button
            var actionDropdown = $(".actions-dropodown")
            actionDropdown.insertBefore($(".top .actions .dt-buttons"))


            // Scrollbar
            if ($(".data-items").length > 0) {
                new PerfectScrollbar(".data-items", { wheelPropagation: false })
            }

            // Close sidebar
            $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
                $(".add-new-data").removeClass("show")
                $(".overlay-bg").removeClass("show")
                $("#data-name, #data-price").val("")
                $("#data-category, #data-status").prop("selectedIndex", 0)
            })

            // On Edit
            $('.action-edit').on("click",function(e){
                e.stopPropagation();
                $('#data-name').val('Altec Lansing - Bluetooth Speaker');
                $('#data-price').val('$99');
                $(".add-new-data").addClass("show");
                $(".overlay-bg").addClass("show");
            });

            // On Delete
            $('.action-delete').on("click", function(e){
                var dom = $(this);
                var uuid = dom.data('uuid');
//                console.log(uuid);
                var route = '{{ route('slider.pop') }}'+'?uuid='+uuid;
                $.ajax({
                    type:'GET',
                    url: route,
                    data:{
                        _token : "{{ csrf_token() }}",
                    },

                    success:function(data) {
//                        console.log(data);
                        if(data.success){
                            e.stopPropagation();
                            dom.closest('td').parent('tr').fadeOut();
                        }

                    }
                });

            });

            // dropzone init
            Dropzone.options.dataListUpload = {
                complete: function(files) {
                    var _this = this
                    // checks files in class dropzone and remove that files
                    $(".hide-data-sidebar, .cancel-data-btn, .actions .dt-buttons").on(
                        "click",
                        function() {
                            $(".dropzone")[0].dropzone.files.forEach(function(file) {
                                file.previewElement.remove()
                            })
                            $(".dropzone").removeClass("dz-started")
                        }
                    )
                }
            }
            Dropzone.options.dataListUpload.complete()

            // mac chrome checkbox fix
            if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
            }
        })


    </script>
@endsection