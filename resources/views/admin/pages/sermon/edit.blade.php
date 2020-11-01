<?php
$sidenav['sermon'] = 'active';
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
                    <h2 class="content-header-title float-left mb-0"> Sermons</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sermon.index') }}"> Sermons</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col">
                @include('layouts.notice')
            </div>
        </div>
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">New sermon</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->


                                <form method="post" action="{{ route('sermon.update', $sermon->uuid) }}" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('put') }}

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Sermon Title / Name *</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Sermon Title" value="{{ $sermon->title }}" required data-validation-required-message="This title field is required" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Sermon Theme</label>
                                                    <input type="text" name="theme" class="form-control" placeholder="example: Encounter with destiny..." autocomplete="off" value="{{ $sermon->theme }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Sermon Introduction *</label>
                                                    <textarea type="text" name="intro" class="form-control" placeholder="example: Encounter with destiny..." required data-validation-required-message="This title field is required" autocomplete="off">{{ $sermon->intro }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>sermon Date *</label>
                                                    <input type="date" name="date" value="{{ date('Y-m-d', $sermon->date) }}" class="form-control" placeholder="Date" required data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Minister</label>
                                                    <select name="preacher_id" class="form-control" required>
                                                        <option value="" selected>Select a preacher</option>
                                                        @foreach($preachers as $preacher)
                                                            <option value="{{ $preacher->uuid }}" {{ $preacher->uuid===$sermon->preacher_id?'selected':'' }}>{{ $preacher->fullname }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Sermon</label>
                                                    <textarea type="date" name="info" rows="30" class="form-control myfield" placeholder="Information" data-validation-required-message="This field is required">{{ $sermon->info }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <a href="{{ route('sermon.toggle', $sermon->uuid) }}" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{ $sermon->published?'Un Publish ':'Publish' }} Draft</a>
                                            
                                            @if($sermon->published)
                                                <button class="btn btn-dark glow mb-1 mb-sm-0 mr-0 mr-sm-1" disabled>
                                                    Update Draft
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                    Update Draft
                                                </button>
                                            @endif


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
    <script src="{{ asset('js/tinymce/jquery.tinymce.min.js') }}"></script>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute : "{{ URL::to('/') }}/",
            selector: "textarea.myfield",
            plugins: [
                "advlist autolink lists link image charmap print hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table textcolor contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],

            style_formats: [
                {title: 'Image Left', selector: 'img', styles: {
                    'float' : 'left',
                    'margin': '0 20px 0 10px'
                }},
                {title: 'Image Right', selector: 'img', styles: {
                    'float' : 'right',
                    'margin': '0 10px 0 20px'
                }}
            ],
            style_formats_merge: true,


            toolbar: "insertfile undo redo| styleselect | bold italic | alignleft aligncenter alignright alignjustify" +
            " | forecolor backcolor | bullist numlist outdent indent | link image media | fontsizeselect ",
            relative_urls: false,
            file_browser_callback : function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if(type == 'image'){
                    cmsURL = cmsURL + "&type=Images";
                }else{
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
@endsection