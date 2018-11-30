<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>@yield("title")</title>
    <meta name="robots" content="noindex,follow"/>
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    <link rel="dns-prefetch" href="//s.w.org"/>
    <link rel="stylesheet" id="contact-form-7-css" href="{{ asset('source/css/styles.css') }}" type="text/css"
          media="all"/>
    <link rel="stylesheet" id="font-awesome-four-css" href="{{ asset('source/css/font-awesome.min.css') }}"
          type="text/css" media="all"/>
    <link rel="stylesheet" id="flatsome-main-css" href="{{ asset('source/css/flatsome.css') }}" type="text/css"
          media="all"/>
    <link rel="stylesheet" id="flatsome-style-css" href="{{ asset('source/css/style.css') }}" type="text/css"
          media="all"/>
    <script type="text/javascript" src="{{ asset('source/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/js/jquery-migrate.min.js') }}"></script>
    <link rel="icon" href="{{ asset('source/images/oic-images/04/cropped-logo-32x32.png') }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset('source/images/oic-images/04/cropped-logo-192x192.png') }}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed"
          href="{{ asset('source/images/oic-images/04/cropped-logo-180x180.png') }}"/>
    <meta name="msapplication-TileImage" content="{{ asset('source/images/oic-images/04/cropped-logo-270x270.png') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('source/css/custom.css') }}">
    <script type="text/javascript" src="{{ asset('source/js/custom.js') }}"></script>
</head>

<body class="home page-template page-template-page-blank page-template-page-blank-php page page-id-2 header-shadow lightbox lazy-icons nav-dropdown-has-arrow">
<a class="skip-link screen-reader-text" href="#main">Skip to content</a>
<div id="wrapper">
    @include('pages.layout.header')
    @yield('content')
    @include('pages.layout.footer')
</div><!-- #wrapper -->
<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar nav-vertical nav-uppercase">
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form- is-normal">
                        <form method="get" class="searchform" action=""
                              role="search">
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <input type="search" class="search-field mb-0" name="s" value="" id="s"
                                           placeholder="Nhập từ khóa tìm kiếm..."/>
                                </div><!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit"
                                            class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="icon-search"></i></button>
                                </div><!-- .flex-col -->
                            </div><!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-36">
                <a href="{{ route('home') }}" class="nav-top-link">Trang chủ</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-35"><a
                        href="{{ route('introduce') }}"
                        class="nav-top-link">Giới thiệu</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33"><a
                        href="{{ route('product') }}"
                        class="nav-top-link">Sản phẩm</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31"><a
                        href="{{ route('media') }}"
                        class="nav-top-link">Ảnh &#038; Video</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-397"><a
                        href="{{ route('community') }}"
                        class="nav-top-link">Trách nhiệm xã hội</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30"><a
                        href="{{ route('recruitment') }}"
                        class="nav-top-link">Tuyển dụng</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-37"><a
                        href="{{ route('news') }}"
                        class="nav-top-link">Tin tức</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-34"><a
                        href="{{ route('contact') }}"
                        class="nav-top-link">Liên hệ</a></li>
        </ul>
    </div><!-- inner -->
</div><!-- #mobile-menu -->
<script id="lazy-load-icons">
    /* Lazy load icons css file */
    var fl_icons = document.createElement('link');
    fl_icons.rel = 'stylesheet';
    fl_icons.href = '{{ asset('source/css/fl-icons.css') }}';
    fl_icons.type = 'text/css';
    var fl_icons_insert = document.getElementsByTagName('link')[0];
    fl_icons_insert.parentNode.insertBefore(fl_icons, fl_icons_insert);
</script>
<script type="text/javascript" src="{{ asset('source/js/scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('source/js/hoverIntent.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('source/js/flatsome.js') }}"></script>
<script type="text/javascript" src="{{ asset('source/js/flatsome-lazy-load.js') }}"></script>
<script type="text/javascript" src="{{ asset('source/js/wp-embed.min.js') }}"></script>

</body>
</html>