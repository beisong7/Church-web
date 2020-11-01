<style>
    .media-box-full .caption:after {
        content: '';
        background-image: none;
        background-size: contain;
        position: relative;
        width: 0;
        height: 0;
        bottom: 0;
        z-index: 0;
    }

    .media-box-full .caption {
        padding: 15px;
    }
</style>
<section class="section-base section-bottom-layer">
    <div class="container">
        <hr class="space" />
        <div class="row">
            <div class="col-lg-7">
                <ul class="slider slider-zoom-center" data-options="type:carousel,perView:3,perViewSm:1,focusAt:center,gap:0,nav:true,controls:out,autoplay:3000">
                    @foreach($sermons as $sermon)
                        <li>
                            <a href="#" class="media-box media-box-full light align-left">
                                <img src="{{ url($sermon->preacher->image) }}" alt="" style="max-height: 200px; width: 100%" />
                                <div class="caption">
                                    <h2>{{ $sermon->preacher->fullname }}</h2>
                                    <div class="extra-field">{{ $sermon->title }}</div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-5">
                <h2>Most Recent Teaching<br /></h2>
                <p>
                    Get the lastest impactful teachings on the Word of God that will transform your life.
                </p>
                <a href="#" class="btn-text">More Sermons</a>
            </div>
        </div>
    </div>
</section>