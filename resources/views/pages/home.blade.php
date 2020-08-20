@extends('layouts.app')

@section('content')



    <!--
    ************************************************************
    * HOME AREA
    *************************************************************
    -->
    <div class="home-area intro-section flex-cc" data-ckav-smd="padding-b-0 flex-cc">
        <div class="container zindex-1 intro-element">

            <!-- INTRO TEXT -->
            <div class="intro-text typo-light" data-ckav-smd="align-center">
                <h2 class="heading xlarge bold-900 text-upper" data-ckav-smd="large">{{ $site->home_title }}</h2>
                <p class="heading-sub width-50" data-ckav-smd="width-100 mini">
                    {{ $site->home_subtitle }}
                </p>
                <!--
                <a href="#services" class="button button-xlarge color-button-default color-hov-button-white solid radius-10" data-ckav-smd="button-medium">Lear More</a>
                -->
            </div>

        </div>

        <!--=================================
        = BACKGROUND HOLDER
        ==================================-->
        <div class="bg-holder zindex-0">

            <!-- OVERLAY -->
            <b data-bgholder="overlay" class="full-wh zindex-2" data-radial-gradient="rgba(0,0,0, 0)|rgba(0,0,0, 0.5)"></b>

            <!-- BACKGROUND IMAGE -->
            @include('layouts.backgroundImage')

        </div>
        <!-- ======= END : BACKGROUND HOLDER =======  -->

    </div>
    <!-- ************** END : HOME AREA **************  -->

    <!--
   ************************************************************
   * SOCIAL AREA
   *************************************************************
   -->
    <div class="social-area intro-element">
        <a href="#social" class="section-post button button-icon color-button-white border-op-light-2 radius-full"><i class="icon-share"></i></a>
    </div>
    <!-- ************** END : SOCIAL AREA **************  -->

    <!--
    ************************************************************
    * POP UP WRAPPER
    *************************************************************
    -->
    <div class="popup-area">

        <!--=================================
        = POPUP OVERLAY
        ==================================-->
        <div class="popup-overlay" data-bg-color="rgba(0,0,0,0.8)">

        </div>
        <!-- ======= END : POPUP OVERLAY =======  -->


        @include('layouts.about')


        @include('layouts.team')


        @include('layouts.services')


        @include('layouts.portfolio')


        @include('layouts.contact')


        @include('layouts.socials')

    </div>
    <!-- ************** END : POP UP WRAPPER **************  -->

   @include('layouts.footer')

    <!--
    ************************************************************
    * SUBSCRIBE POPUP
    *************************************************************
    -->
    <div id="popup-content" class="white-popup-block popup-content animate fadeInDown mfp-hide radius-6">
        <div class="pop-header padding-b-0" data-ckav-sm="padding-30 padding-b-0">
            <div class="square-90 iconwrp fs-80 margin-0 color-text-default"><i class="pe-7s-bell"></i></div>
            <h2 class="heading-section default bold-900 text-upper mr-0" data-ckav-sm="small">Newsletter</h2>
        </div>
        <div class="pop-body padding-t-20" data-ckav-sm="padding-30 padding-t-30">

            <div class="form-block">

                <form action="form-data/notify-me.php" class="form-widget form-control-op-02" novalidate="novalidate">
                    <div class="field-wrp">
                        <input type="hidden" name="to" value="{{ $site->email }}">

                        <div class="row gt10">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control radius-6" data-label="Name" required="" data-msg="Please enter name." type="text" name="name" placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control radius-6" data-label="Email" required="" data-msg="Please enter email." type="email" name="email" placeholder="Enter your email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button radius-6 solid color-button-default width-100 margin-0"><i class="fa fa-envelope-o"></i> SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ************** END : SUBSCRIBE POPUP **************  -->
@endsection
