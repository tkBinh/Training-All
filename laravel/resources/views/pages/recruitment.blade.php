@extends('pages.layout.page')
@section('title')
    Tuyển dụng
@endsection
@section('menu')
    <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
        @include('pages.layout.menu')
        @endsection
        @section('content')
            <style>
                .pull-right ul {
                    list-style: none;
                    padding:20px 300px;
                    text-align: center;
                    left: auto;
                    right: auto;

                }
                .pull-right li {
                    background: #4d9200;
                    border-radius: 6px;
                    color: white;
                    float: left;
                    padding: 5px 10px;
                    font-weight: bold;
                    margin: 2px;
                }
            </style>
            <main id="main">
                <div id="content" class="blog-wrapper blog-archive page-wrapper">
                    <div class="row row-large ">
                        <div class="large-9 col">
                            <div class="row large-columns-2 medium-columns- small-columns-1 row-masonry"
                                 data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>
                                @foreach($listNews as $news)
                                    <div class="col post-item" style="height: 350px;">
                                        <div class="col-inner">
                                            <a href="{{route('recruitment-post', ['id' => $news->id])}}"
                                               class="plain">
                                                <div class="box box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56%;">
                                                            <img width="300" height="193" src="source/images/lazy.png"
                                                                 data-src="{{$news->cover}}"
                                                                 class="lazy-load attachment-medium size-medium wp-post-image"
                                                                 alt="" srcset=""
                                                                 data-srcset="{{$news->cover}} 500w"
                                                                 sizes="(max-width: 300px) 100vw, 300px"/>
                                                        </div>
                                                    </div><!-- .box-image -->
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">
                                                            <h5 class="post-title is-large ">{{$news->title}}</h5>
                                                            <div class="is-divider"></div>
                                                            <p class="kham-pha">
                                                                Khám phá
                                                                <span class="fa fa-angle-right"></span>
                                                            </p>
                                                            {{--{!!substr($news->content,0,100)!!}--}}
                                                            <p class="from_the_blog_excerpt ">
                                                                {!!strip_tags(substr($news->content,0,230))!!}[...]
                                                            </p>
                                                        </div><!-- .box-text-inner -->
                                                    </div><!-- .box-text -->
                                                    <div class="badge absolute top post-date badge-square">
                                                        <div class="badge-inner">
                                                            <span class="post-date-day">13</span><br>
                                                            <span class="post-date-month is-xsmall">Th4</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .box -->
                                            </a><!-- .link -->
                                        </div><!-- .col-inner -->
                                    </div><!-- .col -->
                                @endforeach
                                <div class="pull-right">
                                    {{ $listNews->links() }}
                                </div>
                            </div>
                        </div> <!-- .large-9 -->
                        @include('pages.layout.content-right')
                    </div><!-- .row -->
                </div><!-- .page-wrapper .blog-wrapper -->
            </main><!-- #main -->
    </div>
@endsection