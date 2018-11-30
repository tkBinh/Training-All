@extends('pages.layout.post')
@section('post-title')
    videos
@endsection
@section('post-content')
    <h1 class="entry-title">Công ty Foenik nhận quyết định khen thưởng năm 2017</h1>
    <div class="entry-divider is-divider small"></div>
    </div><!-- .entry-header -->
    <div class="entry-image relative">
        <a href="">
            <img width="300" height="201"
                 src="{{ asset('source/images/lazy.png') }}"
                 data-src="{{ asset('source/images/oic-images/04/video-2.jpg') }}"
                 class="lazy-load attachment-large size-large wp-post-image" alt=""/></a>
        <div class="badge absolute top post-date badge-square">
            <div class="badge-inner">
                <span class="post-date-day">13</span><br>
                <span class="post-date-month is-small">Th4</span>
            </div>
        </div>
    </div><!-- .entry-image -->
    </header><!-- post-header -->
    <div class="entry-content single-page">
        <p>Công ty Foenik nhận quyết định khen thưởng năm 2017</p>
        @endsection
        @section('post-category')
            <a href="" rel="category tag"> Videos.</a>.
@endsection