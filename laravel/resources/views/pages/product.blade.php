@extends('pages.layout.page')
@section('title')
    Sản phẩm
@endsection
@section('menu')
    <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
        @include('pages.layout.menu')
        @endsection
        @section('content')
            <main id="main" class="">
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
                    @foreach($products as $key => $product)
                        @include('pages.layout.product-box')
                    @endforeach
                </div>
            </main><!-- #main -->
    </div>
@endsection