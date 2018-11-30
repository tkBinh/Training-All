@extends('pages.layout.page')
@section('title')
    {{$news->title}}
@endsection
@section('menu')
    <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
        @include('pages.layout.menu')
        @endsection
        @section('content')
            <main id="main" class="">
                <div id="content" class="blog-wrapper blog-single page-wrapper">
                    <div class="row row-large ">
                        <div class="large-9 col">
                            <article id="post-301"
                                     class="post-301 post type-post status-publish format-video has-post-thumbnail hentry category-videos post_format-post-format-video">
                                <div class="article-inner ">
                                    @yield('post-content')
                                    <div class="blog-share text-center">
                                        <div class="is-divider medium"></div>
                                        <div class="social-icons share-icons share-row relative icon-style-outline ">
                                            <a href="whatsapp://send?text=C%C3%B4ng%20ty%20Foenik%20nh%E1%BA%ADn%20quy%E1%BA%BFt%20%C4%91%E1%BB%8Bnh%20khen%20th%C6%B0%E1%BB%9Fng%20n%C4%83m%202017 - http://localhost:8888/website/wordpress/cong-ty-foenik-nhan-quyet-dinh-khen-thuong-nam-2017/"
                                               data-action="share/whatsapp/share"
                                               class="icon button circle is-outline tooltip whatsapp show-for-medium"
                                               title="Share on WhatsApp"><i class="icon-phone"></i></a><a
                                                    href="//www.facebook.com/sharer.php?u=http://localhost:8888/website/wordpress/cong-ty-foenik-nhan-quyet-dinh-khen-thuong-nam-2017/"
                                                    data-label="Facebook"
                                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                                    rel="nofollow" target="_blank"
                                                    class="icon button circle is-outline tooltip facebook"
                                                    title="Share on Facebook"><i
                                                        class="icon-facebook"></i></a><a
                                                    href="//twitter.com/share?url=http://localhost:8888/website/wordpress/cong-ty-foenik-nhan-quyet-dinh-khen-thuong-nam-2017/"
                                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                                    rel="nofollow" target="_blank"
                                                    class="icon button circle is-outline tooltip twitter"
                                                    title="Share on Twitter"><i class="icon-twitter"></i></a><a
                                                    href="mailto:enteryour@addresshere.com?subject=C%C3%B4ng%20ty%20Foenik%20nh%E1%BA%ADn%20quy%E1%BA%BFt%20%C4%91%E1%BB%8Bnh%20khen%20th%C6%B0%E1%BB%9Fng%20n%C4%83m%202017&amp;body=Check%20this%20out:%20http://localhost:8888/website/wordpress/cong-ty-foenik-nhan-quyet-dinh-khen-thuong-nam-2017/"
                                                    rel="nofollow"
                                                    class="icon button circle is-outline tooltip email"
                                                    title="Email to a Friend"><i class="icon-envelop"></i></a><a
                                                    href="//pinterest.com/pin/create/button/?url=http://localhost:8888/website/wordpress/cong-ty-foenik-nhan-quyet-dinh-khen-thuong-nam-2017/&amp;media=http://localhost:8888/website/wordpress/wp-content/uploads/2018/04/video-2.jpg&amp;description=C%C3%B4ng%20ty%20Foenik%20nh%E1%BA%ADn%20quy%E1%BA%BFt%20%C4%91%E1%BB%8Bnh%20khen%20th%C6%B0%E1%BB%9Fng%20n%C4%83m%202017"
                                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                                    rel="nofollow" target="_blank"
                                                    class="icon button circle is-outline tooltip pinterest"
                                                    title="Pin on Pinterest"><i
                                                        class="icon-pinterest"></i></a><a
                                                    href="//plus.google.com/share?url=http://localhost:8888/website/wordpress/cong-ty-foenik-nhan-quyet-dinh-khen-thuong-nam-2017/"
                                                    target="_blank"
                                                    class="icon button circle is-outline tooltip google-plus"
                                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                                    rel="nofollow" title="Share on Google+"><i
                                                        class="icon-google-plus"></i></a><a
                                                    href="//www.linkedin.com/shareArticle?mini=true&url=http://localhost:8888/website/wordpress/cong-ty-foenik-nhan-quyet-dinh-khen-thuong-nam-2017/&title=C%C3%B4ng%20ty%20Foenik%20nh%E1%BA%ADn%20quy%E1%BA%BFt%20%C4%91%E1%BB%8Bnh%20khen%20th%C6%B0%E1%BB%9Fng%20n%C4%83m%202017"
                                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                                    rel="nofollow" target="_blank"
                                                    class="icon button circle is-outline tooltip linkedin"
                                                    title="Share on LinkedIn"><i class="icon-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div><!-- .entry-content2 -->
                                <footer class="entry-meta text-left">
                                    <div class="post-danh-muc">Danh mục:
                                        @yield('post-category')
                                    </div>
                                </footer><!-- .entry-meta -->
                            </article><!-- #-301 -->
                            @include('pages.layout.comment')
                        </div> <!-- .large-9 -->
                        @include('pages.layout.content-right')
                    </div><!-- .row -->
                </div><!-- .page-right-sidebar container -->
            </main><!-- #main -->
    </div>
@endsection