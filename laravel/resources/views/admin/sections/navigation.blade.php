<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>OIC Management</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                {{--<img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">--}}
            </div>
            <div class="profile_info">
                {{--<h2>{{ auth()->user()->name }}</h2>--}}
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Chung</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Trang chủ
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Quản lý</h3>
                <ul class="nav side-menu">
                    @if(App\Helpers\Permissions\Permissions::checkPermisison('role.view'))
                        <li>
                            <a href="{{ route('admin.roles') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Vai trò
                            </a>
                        </li>
                    @endif
                    @if(App\Helpers\Permissions\Permissions::checkPermisison('user.view'))
                        <li>
                            <a href="{{ route('admin.users') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Người dùng
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('admin.collaborator') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Cộng tác viên
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer') }}">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            Khách hàng
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.news') }}">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            Tin tức
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.media') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Ảnh & Video
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            Sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.news.top') }}">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            Tin tức nổi bật
                        </a>
                    </li>
                        <li>
                            <a href="{{ route('admin.collaborator') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                               Quản lý comment
                            </a>
                        </li>
                    @if(App\Helpers\Permissions\Permissions::checkPermisison('permission.view'))
                        <li>
                            <a href="{{ route('admin.permissions') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Quyền truy cập
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="menu_section">
                <h3>Khác</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('report') }}">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            Báo cáo
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting') }}">
                            <i class="fa fa-gear" aria-hidden="true"></i>
                            Cài đặt
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
