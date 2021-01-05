<?php
    $active['media'] = 'active';
?>
@section('custom_css')

@endsection
@extends('layouts.otherpage.app')

@section('content')
    {{----}}
    <header class="header-image ken-burn-center light" data-parallax="true" data-natural-height="600" data-natural-width="1920" data-bleed="0" data-image-src="{{ url('images/o-bg.jpg') }}" data-offset="0">
        <div class="container ">
            <div style="height: 100px"></div>
            <h2 style="margin-bottom: 0">{{ $media->title }}</h2>
            <p style="margin-top: 10px">{{ $media->info }}</p>
        </div>
        <div style="height: 50px"></div>
    </header>

    <section class="section-base section-color">
        <div class="container">
            <ul class="text-list text-list-side boxed-area">
                @forelse($media->items->reverse() as $item)
                    <li>
                        <h3>{{ @$item->file->ext }}</h3>
                        <p>Download {{ ucwords(strtolower(str_replace("_"," ", @$item->file->original_name))) }}</p>
                        <div><a href="{{ route('media.content.download', encrypt(@$item->uuid)) }}">Download</a></div>
                    </li>
                @empty
                    <li>
                        <h3>No Content Available</h3>
                        <p>
                            Contents will be loaded shortly.
                        </p>
                        <div><a href="{{ route('media.list') }}">Back to Media</a></div>
                    </li>
                @endforelse
            </ul>
            {{--
            <div class="grid-list" data-columns="3" data-columns-md="2" data-columns-sm="1">
                <div class="grid-box">
                    @foreach($media->items as $item)
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-blog-top boxed" data-href="post.html">
                                <a href="post.html" class="img-box">
                                    <div class="blog-date">
                                        <span>01</span>
                                        <span>JAN 2020</span>
                                    </div>
                                    <img src="http://via.placeholder.com/800x600" alt="" />
                                </a>
                                <div class="caption">
                                    <h2>Shipping family turned money managers are now billionaires</h2>
                                    <ul class="icon-list icon-list-horizontal">
                                        <li><i class="icon-calendar"></i><a href="#">01 / 15 / 2020</a></li>
                                        <li><i class="icon-bookmark"></i><a href="#">Finance</a></li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore.amet consectetur adipisicing elito sed do eiusmod tempore.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            --}}
        </div>
    </section>

@endsection
