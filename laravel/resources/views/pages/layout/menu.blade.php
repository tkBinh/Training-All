<div class="flex-row container">
    <div class="flex-col hide-for-medium flex-left">
        <ul id="header-nave"
            class="nav header-nav header-bottom-nav nav-left nav-size-large nav-spacing-medium nav-uppercase">
            <li id="menu-item-home"
                class="menu-item menu-item-type-post_type menu-item-object-page
                    {{ request()->is('*home*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('home') }}" class="nav-top-link">Trang chủ</a>
            </li>
            <li id="menu-item-introduce"
                class="menu-item menu-item-type-post_type menu-item-object-page
                    {{ request()->is('*gioi-thieu*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('introduce') }}" class="nav-top-link">Giới thiệu</a>
            </li>
            <li id="menu-item-product"
                class="menu-item menu-item-type-post_type menu-item-object-page
                    {{ request()->is('*san-pham*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('product') }}" class="nav-top-link">Sản phẩm</a>
            </li>
            <li id="menu-item-media"
                class="menu-item menu-item-type-post_type menu-item-object-page
                    {{ request()->is('*anh-video*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('media') }}" class="nav-top-link">Ảnh &#038; Video</a>
            </li>
            <li id="menu-item-community"
                class="menu-item menu-item-type-taxonomy menu-item-object-category
                    {{ request()->is('*trach-nhiem-xa-hoi*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('community') }}" class="nav-top-link">Trách nhiệm xã hội</a>
            </li>
            <li id="menu-item-recruitment"
                class="menu-item menu-item-type-post_type menu-item-object-page
                    {{ request()->is('*tuyen-dung*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('recruitment') }}" class="nav-top-link">Tuyển dụng</a>
            </li>
            <li id="menu-item-news"
                class="menu-item menu-item-type-taxonomy menu-item-object-category
                    {{ request()->is('*tin-tuc*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('news') }}" class="nav-top-link">Tin tức</a>
            </li>
            <li id="menu-item-contact"
                class="menu-item menu-item-type-post_type menu-item-object-page
                    {{ request()->is('*lien-he*') ? 'current-menu-item' : '' }}">
                <a href="{{ route('contact') }}" class="nav-top-link">Liên hệ</a>
            </li>
        </ul>
    </div><!-- flex-col -->
    <div class="flex-col hide-for-medium flex-right flex-grow">
        <ul class="nav header-nav header-bottom-nav nav-right  nav-size-large nav-spacing-medium nav-uppercase">
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form- is-normal">
                        <form method="get" class="searchform"
                              action="{{ route('search') }}"
                              role="search">
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <input type="text" class="search-field mb-0" name="keyword"
                                           id="s" placeholder="Nhập từ khóa tìm kiếm..." />
                                </div><!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit"
                                            class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="icon-search"></i>
                                    </button>
                                </div><!-- .flex-col -->
                            </div><!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div><!-- flex-col -->
</div><!-- .flex-row -->
