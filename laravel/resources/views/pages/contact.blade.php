@extends('pages.layout.page')
@section('title')
    Liên hệ
@endsection
@section('menu')
    <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
        @include('pages.layout.menu')
        @endsection
        @section('content')
            <main id="main" class="">
                <div id="content" class="content-area page-wrapper" role="main">
                    <div class="row row-main">
                        <div class="large-12 col">
                            <div class="col-inner">
                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_998123726">
                                    <div class="img-inner image-cover dark" style="padding-top:25%;">
                                        <img width="1366" height="350" src="source/images/oic-images/04/slider_6.jpg"
                                             data-src="images/oic-images/04/slider_6.jpg"
                                             class="attachment-original size-original lazy-load-active" alt="" srcset="source/images/oic-images/04/slider_6.jpg 1366w,
                                    source/images/oic-images/04/slider_6-300x77.jpg 300w,
                                    source/images/oic-images/04/slider_6-768x197.jpg 768w,
                                    source/images/oic-images/04/slider_6-1024x262.jpg 1024w" data-srcset="images/oic-images/04/slider_6.jpg 1366w,
                                    source/images/oic-images/04/slider_6-300x77.jpg 300w,
                                    source/images/oic-images/04/slider_6-768x197.jpg 768w,
                                    source/images/oic-images/04/slider_6-1024x262.jpg 1024w"
                                             sizes="(max-width: 1366px) 100vw, 1366px"></div>
                                </div>
                                <div class="gap-element" style="display:block; height:auto; padding-top:30px"></div>
                                <section class="section" id="section_861480237">
                                    <div class="bg section-bg fill bg-fill  bg-loaded">
                                    </div><!-- .section-bg -->
                                    <div class="section-content relative">
                                        <div class="row row-small row-full-width" id="row-348151333">
                                            <div class="col medium-4 small-12 large-4">
                                                <div class="col-inner">
                                                    <h2>
                                                        <span style="font-size: 80%; color: #008000;">THÔNG TIN LIÊN HỆ</span>
                                                    </h2>
                                                    <p>{!!$setting->value!!}</p>
                                                </div>
                                            </div>
                                            <div class="col medium-4 small-12 large-4">
                                                <div class="col-inner">

                                                    <h3>
                                                        <span style="font-size: 80%; color: #008000;">HỖ TRỢ KHÁCH HÀNG</span>
                                                    </h3>
                                                    <p></p>
                                                    <ul>
                                                        @foreach($list as $item)
                                                        <li style="text-align: left;">
                                                            <span style="font-size: 90%;">
                                                                <a href="{{route('customer-care-post', ['id' => $item->id])}}">
                                                            {!! $item->title !!}
                                                        </a>
                                                            </span>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col medium-4 small-12 large-4">
                                                <div class="col-inner">
                                                    <p>
                                                        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
                                                        <fb:like-box href="http://www.facebook.com/topweb.com.vn"
                                                                     width="340"
                                                                     height="375" show_faces="true" stream="false"
                                                                     header="false" class=" fb_iframe_widget"
                                                                     fb-xfbml-state="rendered"
                                                                     fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;header=false&amp;height=375&amp;href=http%3A%2F%2Fwww.facebook.com%2Ftopweb.com.vn&amp;locale=en_US&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=340">
                                                    <span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe
                                                                name="fb18bc72bb02" width="340px" height="375px"
                                                                frameborder="0" allowtransparency="true"
                                                                allowfullscreen="true" scrolling="no"
                                                                allow="encrypted-media"
                                                                title="fb:like_box Facebook Social Plugin"
                                                                src="https://www.facebook.com/plugins/like_box.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F__Bz3h5RzMx.js%3Fversion%3D42%23cb%3Dfca1af378b46a4%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff225fe51469507%26relation%3Dparent.parent&amp;container_width=0&amp;header=false&amp;height=375&amp;href=http%3A%2F%2Fwww.facebook.com%2Ftopweb.com.vn&amp;locale=en_US&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=340"
                                                                style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span>
                                                        </fb:like-box>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .section-content -->
                                </section>
                            </div><!-- .col-inner -->
                        </div><!-- .large-12 -->
                    </div><!-- .row -->
                </div>
            </main>
    </div>
@endsection