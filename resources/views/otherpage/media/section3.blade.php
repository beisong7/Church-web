<section class="section-base section-bottom-layer">
    <div class="container">
        <br>
        <br>
        <h2 class="align-center ">Recent Media.</h2>
        <p class="width-650 align-center">
            Get relevant resources for your spiritual growth
        </p>
        <hr class="space" />
        <div class="row">

            @foreach($media as $item)
                <div class="col-lg-6 col-sm-12">
                    <div class="grid-list" data-columns="1">
                        <div class="grid-box">
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-blog-side boxed">
                                    <a href="{{ route('media.show.contents', $item->slug) }}" class="img-box">
                                        <div class="blog-date">
                                            <span>{{ date('d', strtotime($item->updated_at)) }}</span>
                                            <span>{{ date('M Y', strtotime($item->updated_at)) }}</span>
                                        </div>
                                        <img src="{{ $item->image }}" alt="" />
                                    </a>
                                    <div class="caption">
                                        <h2><a href="{{ route('media.show.contents', $item->slug) }}" style="color: #3E566B; text-decoration: none;">{{ $item->title }}</a></h2>

                                        <p>{{ $item->info }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

                <div class="list-pagination align-center">
                    {{ $media->links() }}
                </div>


        </div>
    </div>
</section>

