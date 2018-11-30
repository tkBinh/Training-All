<section class="section tin-tuc" id="section_943566438">
    <div class="bg section-bg fill bg-fill  bg-loaded">
    </div><!-- .section-bg -->
    <div class="section-content relative">
        <div class="row">
            <div class="col cot1 medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="container section-title-container">
                        <h3 class="section-title section-title-normal">
                            <b></b>
                            <span class="section-title-main" style="color:rgb(9, 119, 0);">
                                 TIN TỨC NỔI BẬT
                            </span>
                            <b></b>
                            <a href="/tin-tuc/" target="">
                                Xem tất cả<i class="icon-angle-right"></i>
                            </a>
                        </h3>
                    </div><!-- .section-title -->
                    <div class="row large-columns-1 medium-columns-1 small-columns-1 row-xsmall">
                        {{--{{ $topNews }}--}}
                        @foreach($latestNewsPost as $news)
                            <div class="col post-item">
                                <div class="col-inner">
                                    <a href="{{route('news-post', ['id' => $news->id])}}" class="plain">
                                        <div class="box box-vertical box-text-middle box-blog-post has-hover">
                                            <div class="box-image" style="width:30%;">
                                                <div class="image-cover" style="padding-top:75%;">
                                                    <img width="500" height="321"
                                                         src="source/images/lazy.png"
                                                         data-src="{{ $news->cover }}"
                                                         class="lazy-load attachment-original size-original wp-post-image"
                                                         alt="" srcset=""
                                                         data-srcset="{{ $news->cover }}"
                                                         sizes="(max-width: 500px) 100vw, 500px"/></div>
                                            </div><!-- .box-image -->
                                            <div class="box-text text-left">
                                                <div class="box-text-inner blog-post-inner">
                                                    <h5 class="post-title is-large ">
                                                        {!! $news->title !!}
                                                    </h5>
                                                    <div class="is-divider"></div>
                                                    <p class="kham-pha">
                                                        Khám phá <span class="fa fa-angle-right"></span>
                                                    </p>
                                                    <p class="from_the_blog_excerpt ">
                                                        {!! substr(strip_tags($news->content),0,180) !!}[...]
                                                    </p>
                                                    <button href="{{ route('news-post', ['id' => $news->id]) }}"
                                                            class="button  is-link is-small mb-0">
                                                        Xem chi tiết +
                                                    </button>
                                                </div><!-- .box-text-inner -->
                                            </div><!-- .box-text -->
                                        </div><!-- .box -->
                                    </a><!-- .link -->
                                </div><!-- .col-inner -->
                            </div><!-- .col -->
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col cot1 medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="container section-title-container">
                        <h3 class="section-title section-title-normal"><b></b><span
                                    class="section-title-main"
                                    style="color:rgb(9, 119, 0);">VIDEOS</span><b></b><a
                                    href="/videos/"
                                    target="">Xem tất cả<i class="icon-angle-right"></i></a></h3>
                    </div><!-- .section-title -->
                    <div class="row large-columns-1 medium-columns-1 small-columns-1 row-xsmall">
                        @foreach($configVideoPost as $video)
                            <div class="col post-item has-post-icon">
                                <div class="col-inner">
                                    <a href="{{route('news-post', ['id' => $video->id])}}"
                                       class="plain">
                                        <div class="box box-vertical box-text-middle box-blog-post has-hover">
                                            <div class="box-image" style="width:30%;">
                                                <div class="image-cover" style="padding-top:75%;">
                                                    <img width="300" height="201"
                                                         src="source/images/lazy.png"
                                                         data-src="{{ $video->cover }}"
                                                         class="lazy-load attachment-original size-original wp-post-image"
                                                         alt=""/></div>
                                                <div class="absolute no-click x50 y50 md-x50 md-y50 lg-x50 lg-y50">
                                                    <div class="overlay-icon">
                                                        <i class="icon-play"></i>
                                                    </div>
                                                </div>
                                            </div><!-- .box-image -->
                                            <div class="box-text text-left">
                                                <div class="box-text-inner blog-post-inner">
                                                    <h5 class="post-title is-large ">
                                                        {!! $video->title !!}
                                                    </h5>
                                                    <div class="is-divider"></div>
                                                    <p class="kham-pha">Khám phá <span
                                                                class="fa fa-angle-right"></span></p>
                                                    <p class="from_the_blog_excerpt ">
                                                        {!! substr(strip_tags($video->content),0,180) !!}[...]
                                                    </p>
                                                    <button href="{{route('news-post', ['id' => $video->id])}}"
                                                            class="button  is-link is-small mb-0">
                                                        Xem chi tiết +
                                                    </button>
                                                </div><!-- .box-text-inner -->
                                            </div><!-- .box-text -->
                                        </div><!-- .box -->
                                    </a><!-- .link -->
                                </div><!-- .col-inner -->
                            </div><!-- .col -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .section-content -->
</section>
<section class="section tin-tuc" id="section_267498226">
    <div class="bg section-bg fill bg-fill  bg-loaded">
    </div><!-- .section-bg -->
    <div class="section-content relative">
        <div class="row">
            <div class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="container section-title-container">
                        <h3 class="section-title section-title-normal"><b></b>
                            <span class="section-title-main" style="color:rgb(9, 119, 0);">
                                TRÁCH NHIỆM XÃ HỘI
                            </span>
                            <b></b>
                            <a href="/trach-nhiem-xa-hoi/" target="">
                                Xem tất cả<i class="icon-angle-right"></i>
                            </a>
                        </h3>
                    </div><!-- .section-title -->
                    <div class="row large-columns-1 medium-columns-1 small-columns-1 row-xsmall">
                        @foreach($latestCommunityPost as $community)
                            <div class="col post-item">
                                <div class="col-inner">
                                    <a href="{{route('community-post', ['id' => $community->id])}}"
                                       class="plain">
                                        <div class="box box-vertical box-text-middle box-blog-post has-hover">
                                            <div class="box-image" style="width:30%;">
                                                <div class="image-cover" style="padding-top:75%;">
                                                    <img width="300" height="201"
                                                         src="source/images/lazy.png"
                                                         data-src="{{ $community->cover }}"
                                                         class="lazy-load attachment-original size-original wp-post-image"
                                                         alt=""/></div>
                                            </div><!-- .box-image -->
                                            <div class="box-text text-left">
                                                <div class="box-text-inner blog-post-inner">
                                                    <h5 class="post-title is-large ">
                                                        {!! $community->title !!}
                                                    </h5>
                                                    <div class="is-divider"></div>
                                                    <p class="kham-pha">Khám phá <span
                                                                class="fa fa-angle-right"></span></p>
                                                    <p class="from_the_blog_excerpt ">
                                                        {!! substr(strip_tags($community->content),0,180) !!}[...] </p>
                                                    <button href="{{route('community-post', ['id' => $community->id])}}"
                                                            class="button  is-link is-small mb-0">
                                                        Xem chi tiết +
                                                    </button>
                                                </div><!-- .box-text-inner -->
                                            </div><!-- .box-text -->
                                        </div><!-- .box -->
                                    </a><!-- .link -->
                                </div><!-- .col-inner -->
                            </div><!-- .col -->
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="container section-title-container">
                        <h3 class="section-title section-title-normal"><b></b><span
                                    class="section-title-main"
                                    style="color:rgb(9, 119, 0);">THƯ VIỆN ẢNH</span><b></b><a
                                    href="/anh-video" target="">Xem tất cả<i
                                        class="icon-angle-right"></i></a></h3>
                    </div><!-- .section-title -->
                    <div class="row large-columns-4 medium-columns- small-columns-2 row-xsmall">
                        @foreach($photoLibrary as $photo)
                            <div class="gallery-col col">
                                <div class="col-inner">
                                    <a class="image-lightbox lightbox-gallery"
                                       href="{{ $photo->url }}"
                                       title="">
                                        <div class="box has-hover gallery-box box-overlay dark">
                                            <div class="box-image image-overlay-add image-cover"
                                                 style="padding-top:81%;">
                                                <img width="269" height="216"
                                                     src="{{ $photo->url }}"
                                                     class="attachment-medium size-medium" alt=""
                                                     ids="180,137,120,82,93,283,280,323,321,316,302,299"
                                                     col_spacing="xsmall" image_height="81%"
                                                     image_overlay="rgba(0, 99, 0, 0.38)"
                                                     image_hover="overlay-add"/>
                                                <div class="overlay fill"
                                                     style="background-color: rgba(0, 99, 0, 0.38)">
                                                </div>
                                            </div><!-- .image -->
                                            <div class="box-text text-left">
                                                <p></p>
                                            </div><!-- .text -->
                                        </div><!-- .box -->
                                    </a></div><!-- .col-inner -->
                            </div><!-- .col -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .section-content -->
</section>