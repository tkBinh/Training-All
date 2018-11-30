<div class="large-3 col">
    <div id="secondary" class="widget-area " role="complementary">
        <aside id="media_image-2" class="widget widget_media_image">
            <img width="300" height="201" src="source/images/oic-images/04/huong-duong.jpg"
                 class="image wp-image-283  attachment-full size-full" alt="" style="max-width: 100%; height:
                                                                         auto;"/>
        </aside>
        <aside id="recent-posts-2" class="widget widget_recent_entries">
            <span class="widget-title ">Tin tức &#8211; bài viết</span>
            <div class="is-divider small"></div>
            <ul>
                @foreach($info['post_random'] as $news)
                    <li>
                        <a href="{{route('news-post', ['id' => $news->id])}}">{{$news->title}}</a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <aside id="categories-2" class="widget widget_categories"><span
                    class="widget-title "><span>Chuyên mục</span></span>
            <div class="is-divider small"></div>
            <ul>
                <li class="cat-item cat-item-4">
                    <a href="{{ route('introduce')}}">Giới thiệu</a>
                </li>
                <li class="cat-item cat-item-1">
                    <a href="{{ route('recruitment') }}">Tuyển dụng</a>
                </li>
                <li class="cat-item cat-item-1">
                    <a href="{{ route('news')}}">Tin tức</a>
                </li>
                <li class="cat-item cat-item-3">
                    <a href="{{ route('community')}}">Trách nhiệm xã hội</a>
                </li>
            </ul>
        </aside>
        <aside id="media_video-2" class="widget widget_media_video"><span
                    class="widget-title "><span>Video</span></span>
            <div class="is-divider small"></div>
            <div style="width:100%;" class="wp-video"><!--[if lt IE 9]>
                <script>document.createElement('video');</script><![endif]-->
                <video class="wp-video-shortcode" id="video-28-1" preload="metadata"
                       controls="controls">
                    <source type="video/youtube"
                            src="https://www.youtube.com/watch?v=nyfUo8DCix4&#038;_=1"/>
                    <a href="https://www.youtube.com/watch?v=nyfUo8DCix4">https://www.youtube.com/watch?v=nyfUo8DCix4</a>
                </video>
            </div>
        </aside>
    </div><!-- #secondary -->
</div><!-- .sidebar -->