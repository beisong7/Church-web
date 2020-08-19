<?php $sidenav['gallery'] = 'active'; ?>
@extends('admin.layouts.app')

@section('vendor_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">

@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css') }}">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">File Uploader</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('files') }}">Files</a></li>
                            <li class="breadcrumb-item active">File Uploader</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Dropzone section start -->
        <section id="dropzone-examples">
            <!-- button file upload starts -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">File Upload</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">
                                    Drag and drop acceptable files into the <code>dropzone</code> or click the <code>select files</code> button to manually select and add files.
                                </p>
                                <p class="card-text">Acceptable formats:
                                    <code>.jpg</code>
                                    <code>.jpeg</code>
                                    <code>.png</code>
                                    <code>.pdf</code>
                                    <code>.gif</code>
                                    <code>.doc</code>
                                    <code>.docx</code>
                                    <code>.docx</code>
                                </p>
                                <button id="select-files" class="btn btn-primary mb-1"><i class="icon-file2"></i> select files</button>
                                <form action="#" class="dropzone dropzone-area" id="dpz-btn-select-files">
                                    <div class="dz-message">Drop Files Here To Upload</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- button file upload ends -->
        </section>
    </div>



@endsection


@section('vendor_js')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/ui/prism.min.js') }}"></script>
@endsection

@section('custom_js')
    {{--<script src="{{ asset('app-assets/js/scripts/extensions/dropzone.js') }}"></script>--}}
    <script>
        /*=========================================================================================
         File Name: dropzone.js
         Description: dropzone
         --------------------------------------------------------------------------------------
         Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
         Author: PIXINVENT
         Author URL: http://www.themeforest.net/user/pixinvent
         ==========================================================================================*/

        Dropzone.options.dpzSingleFile = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }
        };

        /********************************************
         *               Multiple Files              *
         ********************************************/
        Dropzone.options.dpzMultipleFiles = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 100.5, // MB
            clickable: true
        }


        /********************************************************
         *               Use Button To Select Files              *
         ********************************************************/
        new Dropzone(document.body, { // Make the whole body a dropzone
            url: "{{ route('uploadStore') }}", // Set the url
            previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
            clickable: "#select-files", // Define the element that should be used as click trigger to select files.
        });


        /****************************************************************
         *               Limit File Size and No. Of Files                *
         ****************************************************************/
        Dropzone.options.dpzFileLimits = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5.0, // MB
            maxFiles: 20,
            maxThumbnailFilesize: 1, // MB
        }


        /********************************************
         *               Accepted Files              *
         ********************************************/
        Dropzone.options.dpAcceptFiles = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            // acceptedFiles: 'image/*'
        }


        /************************************************
         *               Remove Thumbnail                *
         ************************************************/
        Dropzone.options.dpzRemoveThumb = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            addRemoveLinks: true,
            dictRemoveFile: " Trash"
        }

        /*****************************************************
         *               Remove All Thumbnails                *
         *****************************************************/
        Dropzone.options.dpzRemoveAllThumb = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            init: function () {

                // Using a closure.
                var _this = this;

                // Setup the observer for the button.
                $("#clear-dropzone").on("click", function () {
                    // Using "_this" here, because "this" doesn't point to the dropzone anymore
                    _this.removeAllFiles();
                    // If you want to cancel uploads as well, you
                    // could also call _this.removeAllFiles(true);
                });
            }
        }

    </script>
@endsection