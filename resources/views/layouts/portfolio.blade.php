<style>
    .hb-rad-10 .hover-box{
        border-radius: 10px;
    }
</style>
<!--=================================
        = PORTFOLIO SECTION
        ==================================-->
<div id="information" class="popup-section portfolio-section typo-light">

    <!-- CLOSE BUTTON -->
    <div class="close-section">
        <a href="#" class="button button-icon color-button-white fs-30 border-op-light-2 radius-full"><i class="pe-7s-close"></i></a>
    </div>

    <div class="inner-section animated" data-anim-in="fadeIn" data-anim-out="fadeOut">
        <div class="container">

            <h5 class="text-center">Touch / Hover on cards to view details </h5>

            <div class="portfolio-widget grid-portfolio portfolio-row grid-03" data-zoom-gallery="yes" data-ckav-md="grid-02" data-ckav-sm="grid-01">
                <div class="portfolio-col animated p-3 hb-rad-10" data-anim-in="fadeInUp|0.1">
                    <figure class="hover-box hover-box-01">

                        <!-- OVERLAY -->
                        <div class="overlay flex-bl typo-light" data-linear-gradient="rgba(31,34,41,0.5)|rgba(31,34,41,1)">
                            <div class="info-text text-center">
                                @if(!empty($outline))
                                    <a href="{{ $outline->file->url }}" target="_blank" class="button button-icon radius-full margin-lr-5 color-button-default solid"><i class="icon-download"></i></a>
                                    <h3 class="heading-content tiny bold-600 margin-b-5 margin-t-30">WSF Outline</h3>
                                    <p class="mr-0 fs12 op-08">{{ $outline->name }}</p>
                                    <p class="text-center text-white">
                                        <small>{{ date('F d, Y', $outline->dfh) }}</small>
                                    </p>
                                @else
                                    <a href="#" target="_blank" class="button button-icon radius-full margin-lr-5 color-button-default solid"><i class="icon-download"></i></a>
                                    <h3 class="heading-content tiny bold-600 margin-b-5 margin-t-30">WSF Outline</h3>
                                    <p class="mr-0 fs12 op-08">No current outline</p>
                                @endif


                            </div>
                        </div>

                        <!-- IMAGE -->
                        <img src="{{ url('images/homecell.jpg') }}" alt="homecell image">

                    </figure>
                </div>

                <div class="portfolio-col animated p-3 hb-rad-10" data-anim-in="fadeInUp|0.2">
                    <figure class="hover-box hover-box-01">

                        <!-- OVERLAY -->
                        <div class="overlay flex-bl typo-light" data-linear-gradient="rgba(31,34,41,0.5)|rgba(31,34,41,1)">
                            <div class="info-text text-center">
                                {{--<a href="images/grid-portfolio-02.jpg" class="zoom-img button button-icon radius-full margin-lr-5 color-button-default solid"><i class="icon-size-fullscreen"></i></a>--}}
                                <a href="#" target="_blank" class="button button-icon radius-full margin-lr-5 color-button-default solid"><i class="icon-link"></i></a>
                                <h3 class="heading-content tiny bold-600 margin-b-5 margin-t-30">Latest Sermons</h3>
                                <p class="mr-0 fs12 op-08">I will meditate also of all thy work, and talk of thy doings | Psalm 77:12 </p>
                            </div>
                        </div>

                        <!-- IMAGE -->
                        <img src="{{ url('images/sermon.jpg') }}" alt="portfolio image">

                    </figure>
                </div>

                {{--@include('backup.info_cards')--}}
            </div>

        </div>
    </div>
</div>
<!-- ======= END : PORTFOLIO SECTION =======  -->