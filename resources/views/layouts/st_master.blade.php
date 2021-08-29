<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quản trị Phụng Thiên</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('client/assets/images/favicon.png') }}">
    <!-- Datatable -->
    <link href="{{ URL::to('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/skin.css') }}">
    <!-- Pick date -->
    <link href="{{ URL::to('assets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    {{-- message toastr --}}
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @yield('styles')
    @livewireStyles
</head>
<body>
<!-- Preloader start -->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>

<!-- Preloader end -->
<!-- Main wrapper start -->
<div id="main-wrapper">
@auth
    <!-- Nav header start -->
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                <img class="logo-abbr mr-2"
                     src="{{ URL::to('client/assets/images/favicon.png') }}"
                     style="width: 50px; height: 50px" alt="">
                Phụng Thiên
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!-- Nav header end -->

        <!-- Header start -->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                   <i class="la la-user-plus" style="font-size: 20px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('logout') }}"
                                       class="dropdown-item ai-icon"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2"> {{ __('Logout') }} </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header end ti-comment-alt -->
        <!-- Sidebar start -->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="" href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="la la-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-book"></i>
                            <span class="nav-text">Quản lý bài viết</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.posts.index') }}">Các bài viết</a></li>
                            <li><a href="{{ route('admin.posts.top_hot') }}">Bài viết nổi bật</a></li>
                            <li><a href="{{ route('admin.posts.video') }}">Bài viết thuộc video</a></li>
                            <li><a href="{{ route('admin.posts.create') }}">Thêm bài viết</a></li>
                            <li><a href="{{ route('admin.posts.own_post') }}">Bài viết của bạn</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-building"></i>
                            <span class="nav-text">Quản lý menu</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.categories.index') }}">Các Menu</a></li>
                            <li><a href="{{ route('admin.category.restore') }}">Khôi phục menu</a></li>
                        </ul>
                    </li>
                    <li><a class="" href="{{ route('admin.advertises.index') }}" aria-expanded="false">
                            <i class="la la-diamond"></i>
                            <span class="nav-text">Quảng cáo</span>
                        </a>
                    </li>
                    <li><a class="" href="{{ route('admin.socials.index') }}" aria-expanded="false">
                            <i class="la la-internet-explorer"></i>
                            <span class="nav-text">Thông tin liên lạc</span>
                        </a>
                    </li>
                    <li><a class="" href="{{ route('admin.contacts.index') }}" aria-expanded="false">
                            <i class="la la-info"></i>
                            <span class="nav-text">Thông tin website</span>
                        </a>
                    </li>
                    <li class="nav-label">Quản lí tài khoản</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user-plus"></i>
                            <span class="nav-text">Tài khoản</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.users.index') }}">Các tài khoản</a></li>
                            <li><a href="{{ route('admin.users.create') }}">Thêm tài khoản mới</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
@endauth

<!-- Content body start -->
@yield('content')
<!-- Content body end -->
</div>

<!-- Required vendors -->
<script src="{{ URL::to('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ URL::to('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::to('assets/js/custom.min.js') }}"></script>
<!-- Chart Morris plugin files -->
@auth
    <!-- Demo scripts -->
    <script src="{{ URL::to('assets/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/dashboard/dashboard-2.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    @yield('script')
    @stack('child-scripts')
    {!! Toastr::message() !!}
@endauth
@livewireScripts

</body>
</html>