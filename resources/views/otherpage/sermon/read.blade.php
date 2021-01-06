<?php
    $active['sermons'] = 'active';
    $title = $sermon->title;
    $og['image'] = $sermon->preacher->photo;
    $og['title'] = $title;
    $description = $sermon->intro;
    $og['description'] = $description;
    $og['type'] = "article";
    $og['url'] = route('read.sermon', $sermon->uuid);
?>
@section('custom_css')
    <style>
        .section-bottom-layer:after, .section-bottom-layer-2:after {
            height: auto !important;
        }
    </style>
@endsection
@extends('layouts.otherpage.app')

@section('content')

    <section class="section-image light ken-burn-center section-bottom-layer" data-parallax="scroll" data-image-src="{{ url('images/o-bg.jpg') }}">
        <div class="container">
            <hr class="space" />
            <div class="row">
                <div class="col-lg-6" data-anima="fade-in" data-time="1000">
                    <hr class="space-lg hidden-sm" />
                    <h1>
                        {{ $sermon->title }}
                    </h1>
                    <p>
                        {{ $sermon->intro }}
                    </p>

                    <hr class="space-xs" />
                </div>
                <div class="col-lg-6" data-anima="fade-bottom" data-time="1000">
                    <img src="{{ $sermon->preacher->photo  }}" alt="" />
                </div>

            </div>
        </div>
    </section>

    <section class="section-base boxed-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-color">
                    {!! $sermon->info !!}
                    <hr class="space" />
                    <div class="row">
                        <div class="col-lg-8">
                            <ul class="icon-list icon-list-horizontal icon-list-blog">
                                <li>
                                    <i class="icon-calendar"></i><a href="#">{{ date('d M Y', $sermon->date) }}</a>
                                </li>
                            <!--
                                <li>
                                    <i class="icon-bookmark"></i>
                                    <a href="#">{{ $sermon->tags }}</a>,
                                    <a href="#">Software</a>
                                </li>
                                 -->
                                <li>
                                    <i class="icon-user"></i><a href="#">{{ $sermon->preacher->fullname }}</a>
                                </li>
                            </ul>
                        </div>
                        <!--
                        <div class="col-lg-4 align-right align-left-md">
                            <div class="list-nav">
                                <a href="#"></a>
                                <a class="list-archive" href="#"></a>
                                <a href="#">Next post</a>
                            </div>
                        </div>
                        -->
                    </div>
                    <hr class="space" />

                    <!--
                    <div class="cnt-box cnt-box-side box-small">
                        <a href="#" class="img-box"><img src="http://via.placeholder.com/450x450" alt="" /></a>
                        <div class="caption">
                            <h2>Richard Scally</h2>
                            <p>
                                Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore ectetur adipia.
                            </p>
                        </div>
                    </div>
                    -->

                    <hr />
                    <h2>Related articles.</h2>
                    <hr class="space-sm" />
                </div>
                <div class="col-lg-4 widget">
                    <hr class="space visible-md" />
                    <!--
                    <form class="form-box">
                        <div class="input-text-btn">
                            <input class="input-text" type="text" placeholder="Search ..." /><input type="submit" value="Search" class="btn" />
                        </div>
                    </form>
                    -->
                    <hr class="space-sm" />
                    <h3>Recent Sermons</h3>
                    <hr class="space-sm" />
                    <div class="menu-inner menu-inner-vertical menu-inner-image">
                        <ul>
                            @forelse($sermons as $item)
                                <li>
                                    <a href="{{ route('read.sermon', $item->uuid) }}">
                                        <img src="{{ $item->preacher->photo }}" alt="" style="width: 80px" />
                                        <span>{{ date('d M Y', $item->date) }}</span>
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @empty
                            <li>
                                <a href="#">
                                    No Recent Sermons
                                </a>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <hr class="space-sm" />
                </div>
            </div>
        </div>
    </section>


@endsection
