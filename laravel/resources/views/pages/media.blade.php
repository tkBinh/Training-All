@extends('pages.layout.page')
@section('title')
    Ảnh & Video
@endsection
@section('menu')
    <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
        @include('pages.layout.menu')
        @endsection
        @section('content')
            <style>
                .img-desc {
                    word-wrap: break-word;
                    height: 20px;
                    overflow: hidden;
                }
                .pull-right ul {
                    list-style: none;
                    padding: 20px 300px;
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
            <main id="main" class="">
                <div id="content" class="content-area page-wrapper" role="main">
                    <div class="row row-main">
                        <div class="large-12 col">
                            <div class="col-inner">
                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_385328400">
                                    <div class="img-inner image-cover dark" style="padding-top:25%;">
                                        <img width="1366" height="350" src="source/mages/lazy.png"
                                             data-src="source/images/oic-images/04/slider_1.jpg"
                                             class="lazy-load attachment-original size-original" alt="" srcset=""
                                             data-srcset="source/images/oic-images/04/slider_1.jpg 1366w, source/images/oic-images/04/slider_1-300x77.jpg 300w, source/images/oic-images/04/slider_1-768x197.jpg 768w, source/images/oic-images/04/slider_1-1024x262.jpg 1024w"
                                             sizes="(max-width: 1366px) 100vw, 1366px"/>
                                    </div>
                                </div>
                                <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small">
                                    @foreach($media as $file)
                                        <div class="gallery-col col">
                                            <div class="col-inner">
                                                @if ($file->type == \App\Models\Media::MEDIA_IMAGE)
                                                    <a class="image-lightbox lightbox-gallery"
                                                       href="{{$file->url}}" title="">
                                                        <div class="box has-hover gallery-box box-overlay dark">
                                                            <div class="box-image image-overlay-add image-cover"
                                                                 style="padding-top:80%;">
                                                                <img width="300" height="209"
                                                                     src="source/images/lazy.png"
                                                                     data-src="{{$file->thumbnail_url}}"
                                                                     class="lazy-load attachment-medium size-medium"
                                                                     alt=""
                                                                     ids="457,450,431,321,323,404,316,302,299,283,280,137,180,93,82,120,112"
                                                                     col_spacing="small" columns="5" image_height="80%"
                                                                     image_overlay="rgba(0, 108, 30, 0.45)"
                                                                     image_hover="overlay-add"
                                                                     srcset=""
                                                                     data-srcset="{{$file->thumbnail_url}} 300w"
                                                                     sizes="(max-width: 300px) 100vw, 300px"/>
                                                                <div class="overlay fill"
                                                                     style="background-color: rgba(0, 108, 30, 0.45)">
                                                                </div>
                                                            </div><!-- .image -->
                                                            <div class="box-text text-left">
                                                                <p class="img-desc">{{$file->description}}</p>
                                                            </div><!-- .text -->
                                                        </div><!-- .box -->
                                                    </a>
                                                @elseif ($file->type == \App\Models\Media::MEDIA_VIDEO)
                                                    <div class="box has-hover gallery-box box-overlay dark">
                                                        <div class="box-image image-overlay-add "
                                                             style="">
                                                            <a href="{{$file->url}}" target="_blank">
                                                                <video width="100%" height="209" src="{{$file->url}}"
                                                                       class="size-medium"></video>
                                                                <div class="overlay fill"
                                                                     style="background-color: rgba(0, 108, 30, 0.45)">
                                                                </div>
                                                            </a>
                                                        </div><!-- .image -->
                                                        <div class="box-text text-left">
                                                            <p></p>
                                                        </div><!-- .text -->
                                                    </div><!-- .box -->
                                                @endif
                                            </div><!-- .col-inner -->
                                        </div><!-- .col -->
                                    @endforeach
                                        <div class="pull-right">
                                            {{ $media->links() }}
                                        </div>
                                </div>
                            </div><!-- .col-inner -->
                        </div><!-- .large-12 -->
                    </div><!-- .row -->
                </div>
            </main><!-- #main -->
    </div>
@endsection