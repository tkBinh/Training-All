@extends('pages.layout.page')

@section('title')
    {{$title}}
@endsection

@section('menu')

    <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
        @include('pages.layout.menu')
        @endsection
        @section('content')
            <main id="main">
                <div id="content" role="main" class="content-area">
                    <div class="slider-wrapper relative " id="slider-1891720303">
                        <div class="slider slider-nav-dots-simple slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal"
                             data-flickity-options='{
            			"cellAlign": "center",
            			"imagesLoaded": true,
           			 	"lazyLoad": 1,
            			"freeScroll": false,
            			"wrapAround": true,
            			"autoPlay": 3000,
            			"pauseAutoPlayOnHover" : true,
            			"prevNextButtons": true,
           			 	"contain" : true,
            			"adaptiveHeight" : true,
            			"dragThreshold" : 5,
            			"percentPosition": true,
            			"pageDots": true,
            			"rightToLeft": false,
            			"draggable": true,
           				"selectedAttraction": 0.1,
            			"parallax" : 0,
            			"friction": 0.6 }'>
                            @foreach($featuredContent as $content)
                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1982799057">
                                    <div class="img-inner image-cover dark" style="padding-top:25%;">
                                        <img width="1366" height="350" src="{{$content}}"
                                             class="attachment-original size-original" alt=""
                                             srcset="{{$content}}"
                                             sizes="(max-width: 1366px) 100vw, 1366px"/>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="loading-spin dark large centered"></div>
                    </div><!-- .ux-slider-wrapper -->
                    <div class="gap-element clearfix" style="display:block; height:auto; padding-top:10px"></div>
                    <section class="section section1" id="section_1164250065">
                        <div class="bg section-bg fill bg-fill  bg-loaded">
                        </div><!-- .section-bg -->
                        <div class="section-content relative">
                            <div class="row row-small" id="row-424062657">
                                {{----}}
                                <div class="col cot1 medium-3 small-6 large-3">
                                    <div class="col-inner">
                                        <div class="slider-wrapper relative " id="slider-902942154">
                                            <div class="slider slider-type-fade slider-nav-dots-simple slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal"
                                                 data-flickity-options='{
            								"cellAlign": "center",
            								"imagesLoaded": true,
            								"lazyLoad": 1,
            								"freeScroll": false,
            								"wrapAround": true,
            								"autoPlay": 4000,
            								"pauseAutoPlayOnHover" : true,
            								"prevNextButtons": true,
            								"contain" : true,
            								"adaptiveHeight" : true,
            								"dragThreshold" : 5,
            								"percentPosition": true,
            								"pageDots": false,
            								"rightToLeft": false,
            								"draggable": true,
            								"selectedAttraction": 0.1,
            								"parallax" : 0,
            								"friction": 0.6 }'>
                                                <div class="row row-collapse" id="row-993965534">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>$newsTop[0]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[0]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[0]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[0]->title
                                                                                            }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span
                                                                                                    class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-collapse" id="row-2030467527">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>
                                                                        $newsTop[1]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[1]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[1]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[1]->title
                                                                                           }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span
                                                                                                    class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loading-spin dark large centered"></div>
                                        </div><!-- .ux-slider-wrapper -->
                                    </div>
                                </div>
                                {{----}}
                                <div class="col cot1 medium-3 small-6 large-3">
                                    <div class="col-inner">
                                        <div class="slider-wrapper relative " id="slider-902942154">
                                            <div class="slider slider-type-fade slider-nav-dots-simple slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal"
                                                 data-flickity-options='{
            								"cellAlign": "center",
            								"imagesLoaded": true,
            								"lazyLoad": 1,
            								"freeScroll": false,
            								"wrapAround": true,
            								"autoPlay": 4000,
            								"pauseAutoPlayOnHover" : true,
            								"prevNextButtons": true,
            								"contain" : true,
            								"adaptiveHeight" : true,
            								"dragThreshold" : 5,
            								"percentPosition": true,
            								"pageDots": false,
            								"rightToLeft": false,
            								"draggable": true,
            								"selectedAttraction": 0.1,
            								"parallax" : 0,
            								"friction": 0.6 }'>
                                                <div class="row row-collapse" id="row-993965534">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>
                                                                        $newsTop[2]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[2]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[2]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[2]->title
                                                                                            }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span
                                                                                                    class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-collapse" id="row-2030467527">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>
                                                                        $newsTop[3]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[3]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[3]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[3]->title
                                                                                           }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span
                                                                                                    class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loading-spin dark large centered"></div>
                                        </div><!-- .ux-slider-wrapper -->
                                    </div>
                                </div>
                                <div class="col cot1 medium-3 small-6 large-3">
                                    <div class="col-inner">
                                        <div class="slider-wrapper relative " id="slider-902942154">
                                            <div class="slider slider-type-fade slider-nav-dots-simple slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal"
                                                 data-flickity-options='{
            								"cellAlign": "center",
            								"imagesLoaded": true,
            								"lazyLoad": 1,
            								"freeScroll": false,
            								"wrapAround": true,
            								"autoPlay": 4000,
            								"pauseAutoPlayOnHover" : true,
            								"prevNextButtons": true,
            								"contain" : true,
            								"adaptiveHeight" : true,
            								"dragThreshold" : 5,
            								"percentPosition": true,
            								"pageDots": false,
            								"rightToLeft": false,
            								"draggable": true,
            								"selectedAttraction": 0.1,
            								"parallax" : 0,
            								"friction": 0.6 }'>
                                                <div class="row row-collapse" id="row-993965534">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>
                                                                        $newsTop[4]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[4]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[4]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[4]->title
                                                                                            }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span
                                                                                                    class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-collapse" id="row-2030467527">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>
                                                                        $newsTop[5]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[5]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[5]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[5]->title
                                                                                           }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loading-spin dark large centered"></div>
                                        </div><!-- .ux-slider-wrapper -->
                                    </div>
                                </div>
                                <div class="col cot1 medium-3 small-6 large-3">
                                    <div class="col-inner">
                                        <div class="slider-wrapper relative " id="slider-902942154">
                                            <div class="slider slider-type-fade slider-nav-dots-simple slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal"
                                                 data-flickity-options='{
            								"cellAlign": "center",
            								"imagesLoaded": true,
            								"lazyLoad": 1,
            								"freeScroll": false,
            								"wrapAround": true,
            								"autoPlay": 4000,
            								"pauseAutoPlayOnHover" : true,
            								"prevNextButtons": true,
            								"contain" : true,
            								"adaptiveHeight" : true,
            								"dragThreshold" : 5,
            								"percentPosition": true,
            								"pageDots": false,
            								"rightToLeft": false,
            								"draggable": true,
            								"selectedAttraction": 0.1,
            								"parallax" : 0,
            								"friction": 0.6 }'>
                                                <div class="row row-collapse" id="row-993965534">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>
                                                                        $newsTop[6]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[6]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[6]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[6]->title
                                                                                            }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-collapse" id="row-2030467527">
                                                    <div class="col small-12 large-12">
                                                        <div class="col-inner">
                                                            <div class="row large-columns-1 medium-columns- small-columns-1 row-collapse">
                                                                <div class="col post-item">
                                                                    <div class="col-inner">
                                                                        <a href="{{route('news-post', ['id' =>
                                                                        $newsTop[7]->id])}}"
                                                                           class="plain">
                                                                            <div class="box box-overlay dark box-text-bottom box-blog-post has-hover">
                                                                                <div class="box-image">
                                                                                    <div class="image-cover"
                                                                                         style="padding-top:80%;">
                                                                                        <img width="500" height="321"
                                                                                             src="source/images/lazy.png"
                                                                                             data-src=""
                                                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                                                             alt="" srcset=""
                                                                                             data-srcset="{{
                                                                                             $newsTop[7]->image
                                                                                              }} 500w,{{
                                                                                             $newsTop[7]->image
                                                                                              }} 300w"
                                                                                             sizes="(max-width: 500px) 100vw, 500px"/>
                                                                                        <div class="overlay"
                                                                                             style="background-color: rgba(0,0,0,.25)"></div>
                                                                                    </div>
                                                                                </div><!-- .box-image -->
                                                                                <div class="box-text text-left"
                                                                                     style="background-color:rgba(0, 0, 0, 0.63);">
                                                                                    <div class="box-text-inner blog-post-inner">
                                                                                        <h5 class="post-title is-large uppercase">
                                                                                            {{ $newsTop[7]->title
                                                                                           }}</h5>
                                                                                        <div class="is-divider"></div>
                                                                                        <p class="kham-pha">Khám phá
                                                                                            <span class="fa fa-angle-right"></span>
                                                                                        </p>
                                                                                    </div><!-- .box-text-inner -->
                                                                                </div><!-- .box-text -->
                                                                            </div><!-- .box -->
                                                                        </a><!-- .link -->
                                                                    </div><!-- .col-inner -->
                                                                </div><!-- .col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loading-spin dark large centered"></div>
                                        </div><!-- .ux-slider-wrapper -->
                                    </div>
                                </div>
                                <style scope="scope">
                                </style>
                            </div>
                        </div><!-- .section-content -->
                    </section>
                    {{----}}
                    <div class="container section-title-container">
                        <h3 class="section-title section-title-center">
                            <b></b>
                            <span class="section-title-main" style="color:rgb(1, 134, 34);">LIÊN KẾT TRUYỀN THÔNG</span><b></b>
                        </h3>
                    </div><!-- .section-title -->
                    <div class="row row-small align-center row-logo" id="row-1783215150">
                        @foreach ($productLogo as $logo)
                            <div class="col medium-2 small-12 large-2">
                                <div class="col-inner">
                                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_258415121">
                                        <div class="img-inner dark">
                                            <img width="269" height="216"
                                                 src="{{$logo}}"
                                                 class="attachment-original size-original img-test" alt=""
                                                 sizes="(max-width: 300px) 100vw, 300px"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="gap-element clearfix" style="display:block; height:auto; padding-top:30px"></div>
                    @include('pages.layout.home-news-content')
                </div>
            </main><!-- #main -->
    </div>
@endsection
