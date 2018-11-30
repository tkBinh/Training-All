<header id="header" class="header has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="masthead" class="header-main hide-for-sticky">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="{{ route('home') }}"
                       title="Liquid Nano Curcumin Oic cho bạn dạ dày khỏe mạnh"
                       rel="home">
                        <img width="211" height="91" src="{{ asset('source/images/oic-images/11/logo.png') }}"
                             class="header-logo"
                             alt="OIC logo"/>
                    </a>
                </div>
                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay"
                               data-color="" class="is-small" aria-controls="main-menu" aria-expanded="false">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right header-contact-info">
                    <div class="header-contact-right">
                        @if (!empty($info['hotline']))
                            <i class="icon-phone"></i>
                            <div class="hotline-info">
                                <span>Hotline tư vấn 24/7</span><br/>
                                <span class="hotline">{{ $info['hotline']->value }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="header-contact-left">
                        @if (!empty($info['tele_sale']))
                            <div>
                                <i class="icon-phone text-orange"></i>
                                <span>{{ $info['tele_sale']->value }}</span>
                            </div>
                        @endif
                            <div>
                                <i class="icon-envelop text-orange"></i>
                                <span>cskh@oic.com.vn</span>
                            </div>
                    </div>
                </div>
                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                    </ul>
                </div>
            </div><!-- .header-inner -->
        </div><!-- .header-main -->
        @yield('menu')
    </div><!-- .header-bottom -->
    <div class="header-bg-container fill">
        <div class="header-bg-image fill"></div>
        <div class="header-bg-color fill"></div>
    </div><!-- .header-bg-container -->
    </div><!-- header-wrapper-->
</header>