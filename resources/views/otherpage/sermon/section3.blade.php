<section id="news" class="section-base section-color">
    <div class="container">
        <br>
        <br>
        <h2 class="align-center ">Popular Sermons.</h2>
        <p class="width-650 align-center">
            Most viewed sermons for the past few months
        </p>
        <hr class="space" />
        <div class="row">

            @foreach($popular as $sermon)
                <div class="col-lg-6 col-sm-12">
                    <div class="grid-list" data-columns="1">
                        <div class="grid-box">
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-blog-side boxed">
                                    <a href="#" class="img-box">
                                        <div class="blog-date">
                                            <span>{{ date('d', $sermon->date) }}</span>
                                            <span>{{ date('M Y', $sermon->date) }}</span>
                                        </div>
                                        <img src="{{ $sermon->preacher->photo }}" alt="" />
                                    </a>
                                    <div class="caption">
                                        <h2>{{ $sermon->title }}</h2>
                                        <ul class="icon-list icon-list-horizontal">
                                            <li><i class="icon-bookmark"></i><a href="#">SERMON</a></li>
                                        </ul>
                                        <p>{{ $sermon->intro }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>

