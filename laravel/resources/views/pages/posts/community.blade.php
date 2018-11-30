@extends('pages.layout.post')
@section('post-title')
    trách nhiệm xã hội
@endsection
@section('post-content')
    <header class="entry-header">
        <div class="entry-header-text entry-header-text-top text-left">
            <h6 class="entry-category is-xsmall">
                <a href="{{ route('news') }}"
                   rel="category tag">@yield('post-title')
                </a>
            </h6>
            <h1 class="entry-title">{{$news->title}}</h1>
            <div class="entry-divider is-divider small"></div>
        </div><!-- .entry-header -->
        <div class="entry-image relative">
            <a href="">
                <img width="300" height="201"
                     src="{{ asset('source/images/lazy.png') }}"
                     data-src="{{ asset('source/images/oic-images/04/video-2.jpg') }}"
                     class="lazy-load attachment-large size-large wp-post-image" alt=""/>
            </a>
            <div class="badge absolute top post-date badge-square">
                <div class="badge-inner">
                    <span class="post-date-day">13</span><br>
                    <span class="post-date-month is-small">Th4</span>
                </div>
            </div>
        </div><!-- .entry-image -->
    </header><!-- post-header -->
    <div class="entry-content single-page">
        <div>
            {!!$news->content!!}
        </div>
        @endsection
        @section('post-category')
            <a href="/tin-tuc" rel="category tag"> Tin tức.</a><br/>
    </div>
@endsection