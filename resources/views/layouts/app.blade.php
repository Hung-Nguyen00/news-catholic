<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Phụng Thiên</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/mdi/css/materialdesignicons.min.css')  }}"/>
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/aos/dist/aos.css/aos.css') }}"/>
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{ asset('client/assets/images/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client/assets/js/bootstrap.js') }}"/>
    @livewireStyles
</head>
<body>
    <div id="app">
        <div class="container-scroller">
            <div class="main-panel">
                <!-- partial:partials/_navbar.html -->
                <header id="header shadow-b dark:bg-dark">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="navbar-brand" style="width: 100%">
                                <div class="d-flex justify-content-between align-items-center" >
                                    <div>
                                        <a class="navbar-brand d-flex justify-content-center align-items-center" href="{{ route('home') }}"
                                        ><img src="{{ asset($contact->logo) }}" style="width: 40px; height: 40px;" alt=""/>
                                            <span class="ml-2 text-white text-uppercase">{{ $contact->name_website }}</span>
                                        </a>
                                    </div>
                                    <div>
                                        <button
                                                class="navbar-toggler"
                                                type="button"
                                                data-target="#navbarSupportedContent"
                                                aria-controls="navbarSupportedContent"
                                                aria-expanded="false"
                                                aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="navbar-collapse justify-content-center collapse"
                                                id="navbarSupportedContent">
                                            <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       style="font-size: 16px !important;"
                                                       href="{{ route('home') }}">Trang chủ</a>
                                                </li>
                                                @if($categories->count() > 0)
                                                    @foreach($categories as $category)
                                                        @if($category->children()->count() > 0)
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle"
                                                               href="/"
                                                               onclick="return false"
                                                               id="dropdownMenuButton2"
                                                               data-toggle="dropdown"
                                                               aria-haspopup="true"
                                                               style="font-size: 16px !important;"
                                                               aria-expanded="true">{{ $category->name }} <span class="sr-only">(current)</span></a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                                                @foreach($category->children as $children)
                                                                <a class="dropdown-item"
                                                                   style="font-size: 16px !important;"
                                                                   href="{{ route('categories.show', ['category' => $children->slug])}}"> {{ $children->name }}</a>
                                                                @endforeach
                                                            </div>
                                                        </li>
                                                        @else
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                   style="font-size: 16px !important;"
                                                                   href="{{ route('categories.show', ['category' => $category->slug]) }}"
                                                                  >{{ $category->name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                               @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <ul class="social-media">
                                            @foreach($socials as $s)
                                                <li>
                                                    <a href="{{ $s->url }}">
                                                        <i class="mdi {{ $s->name_social }}"></i>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>
                <main>
                    @yield('content')
                </main>
                <footer>
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="d-flex align-items-center">
                                            <img src="{{ asset($contact->logo) }}"
                                             style="width: 70px; height: 70px"
                                             class="footer-logo" alt="" />
                                        <span class="text-uppercase font-weight-bold ml-2" style="font-size: 25px">{{ $contact->name_website }}</span>
                                    </div>
                                    <h5 class="font-weight-normal mt-2 mb-3">
                                        {{ $contact->description }}
                                    </h5>
                                    <h2 class="text-uppercase mb-3">Liên hệ quảng cáo</h2>
                                    <div class="d-flex flex-wrap align-content-end">
                                        <h2 class="mr-3 text-uppercase" style="margin-bottom: -10px;">{{ $contact->number_phone }}</h2>
                                        <ul class="social-media">
                                            @foreach($socials as $s)
                                            <li>
                                                <a href="{{ $s->url }}">
                                                    <i class="mdi {{ $s->name_social }}"></i>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="d-flex flex-wrap  justify-content-between">
                                        @foreach($category_footer as $category)
                                            <div class="col-md-4 pl-0 pr-0 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0 font-weight-600">
                                                        <a class="text-white text-decoration-none text-uppercase"
                                                          href="{{ route('categories.show', ['category' => $category->slug])}}"> {{ $category->name }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

                <!-- partial -->
            </div>
        </div>
    </div>

    <script src="{{ asset('client/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('client/assets/vendors/aos/dist/aos.js/aos.js') }}"></script>
    <script src="{{ asset('client/assets/js/demo.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.easeScroll.js') }}"></script>
    @livewireScripts
</body>
</html>
