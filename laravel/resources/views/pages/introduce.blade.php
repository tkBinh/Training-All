@extends('pages.layout.page')
@section('title')
    Giới thiệu
@endsection
@section('menu')
    <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
        @include('pages.layout.menu')
        @endsection
        @section('content')
            <main id="main" class="introduce">
                <div id="content" class="content-area page-wrapper" role="main">
                    <div class="row row-main">
                        <div class="large-12 col">
                            <div class="col-inner">
                                <div class="img has-hover x md-x lg-x y md-y lg-y">
                                    <div class="img-inner image-cover image-banner dark">
                                        <img src="{{ asset('source/images/oic-images/04/slider_6.jpg') }}"
                                             data-src="{{ asset('source/images/oic-images/04/slider_6.jpg') }}"
                                             class="attachment-original size-original lazy-load-active" alt=""
                                             srcset="{{ asset('source/images/oic-images/04/slider_6.jpg') }} 1366w, {{ asset('source/images/oic-images/04/slider_6-300x77.jpg') }} 300w, {{ asset('source/images/oic-images/04/slider_6-768x197.jpg') }} 768w, {{ asset('source/images/oic-images/04/slider_6-1024x262.jpg') }} 1024w"
                                             data-srcset="{{ asset('source/images/oic-images/04/slider_6.jpg') }} 1366w, {{ asset('source/images/oic-images/04/slider_6-300x77.jpg') }} 300w, {{ asset('source/images/oic-images/04/slider_6-768x197.jpg') }} 768w, {{ asset('source/images/oic-images/04/slider_6-1024x262.jpg') }} 1024w"
                                             sizes="(max-width: 1366px) 100vw, 1366px">
                                    </div>
                                </div>
                                <div class="row row-small">
                                    <div class="col medium-9 small-12 large-9">
                                        <div class="col-inner">
                                            {!! $article->value !!}
                                        </div>
                                    </div>
                                    <div class="col medium-3 small-12 large-3">
                                        <div class="col-inner content-right">
                                            <h3>
                                                <span class="title">GIỚI THIỆU CHUNG</span>
                                            </h3>
                                            <ul>
                                                @foreach($introduces as $item)
                                                    <li class="bullet-star">
                                                        <a href="{{route('introduce-post', ['id' => $item->id])}}">
                                                            {!! $item->title !!}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <a class="button primary lowercase expand" style="border-radius:4px;">
                                                <i class="icon-phone"></i> <span>Hotline: {!! $info['hotline']->value !!}</span>
                                            </a>

                                            <a rel="noopener noreferrer" href="{!! $info['fb_link']->value !!}"
                                               target="_blank"
                                               class="button secondary lowercase expand" style="border-radius:4px;">
                                                <i class="icon-facebook"></i> <span>Chat Facebook</span>
                                            </a>

                                            <h3><span style="color: #008000; font-size: 90%;">HỖ TRỢ ONLINE</span></h3>

                                            <div class="icon-box featured-box icon-box-left text-left">
                                                <div class="icon-box-img" style="width: 60px">
                                                    <div class="icon">
                                                        <div class="icon-inner">
                                                            <img width="70" height="70"
                                                                 src="{{ asset('source/images/oic-images/04/support-1.png') }}"
                                                                 data-src="{{ asset('source/images/oic-images/04/support-1.png') }}"
                                                                 class="attachment-medium size-medium lazy-load-active"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="icon-box-text last-reset">
                                                    <p>
                                                        <span style="font-size: 115%;">Phòng Kinh doanh<br></span>
                                                        <span style="font-size: 90%;">{!! $info['tele_sale']->value !!}<br></span>
                                                        <span style="font-size: 90%;">{!! $info['email']->value !!}</span>
                                                    </p>
                                                </div>
                                            </div><!-- .icon-box -->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col-inner -->
                        </div><!-- .large-12 -->
                    </div><!-- .row -->
                </div>
            </main>
    </div>
@endsection