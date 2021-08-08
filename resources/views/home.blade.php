@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-xl-8 stretch-card grid-margin">
                    <div class="position-relative">
                        <div class="banner">
                            <img
                                    src="uploads/cach-cai-hinh-nen.jpg"
                                    alt="banner"
                                    class="img-fluid"
                            />
                            <div class="position-absolute text-white pl-2" id="title-banner" style="top: 50%">
                                <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                    global news
                                </div>
                                <h2 class="mb-2">
                                    Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams
                                    Postponed, 168 Trains
                                </h2>
                                <div class="fs-12">
                                    <span class="mr-2">Photo </span>10 Minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 stretch-card grid-margin">
                    <div class="card bg-dark text-white" style="padding: 5px  5px">
                            <h2 class="pl-3">Bài viết mới nhất</h2>
                            @if($latest_post->count() > 0)
                                @foreach($latest_post as $post)
                                <a href="" class="text-decoration-none text-white">
                                    <div class="d-flex pt-4 align-items-center justify-content-between">
                                        <div class="col-md-6 pr-3">
                                            <h5>{{strlen($post->title) > 60 ? substr($post->title,0, 50)."[...]" : $post->title  }}</h5>
                                            <div class="fs-12">
                                                <span class="mr-2">Photo </span>
                                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 rotate-img">
                                            <img
                                                    src="uploads/cach-cai-hinh-nen.jpg"
                                                    alt="thumb"

                                                    class="img-fluid img-lg"/>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                                @endif
                        </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-3 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h2 >Thể loại</h2>
                            <ul class="vertical-menu">
                                @if($child_categories->count() > 0)
                                    @foreach($child_categories as $child)
                                        <li>
                                            <a href="{{ route('categories.show', ['category' => $child->slug])}}">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            @if($top_hot_posts->count() > 0)
                                @foreach($top_hot_posts as $post)
                                    <div class="row">
                                        <div class="col-sm-4 grid-margin">
                                            <div class="position-relative">
                                                <div class="rotate-img">
                                                    <img
                                                            src="uploads/{{$post->image}}"
                                                            style="height: 150px !important;"
                                                            alt="{{ $post->title }}"
                                                            class="img-fluid"
                                                    />
                                                </div>
                                                <div class="badge-positioned">
                                                     <span class="badge badge-danger font-weight-bold"
                                                     >{{ $post->category->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8  grid-margin">
                                            <h2 class="mb-2 font-weight-600">
                                                <a href=""> {{ $post->title }}</a>
                                            </h2>
                                            <div class="fs-13 mb-2">
                                                <span class="mr-2">Photo </span> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </div>
                                            <p class="mb-0">
                                                {{strlen($post->short_description) > 120 ? substr($post->short_description,0, 120)."..." : $post->short_description  }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-sm-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-title">
                                        Video
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        @if($video_posts->count() > 0)
                                            @php $i = 0; @endphp
                                            @foreach($video_posts as $post)
                                                @php ++$i; @endphp
                                                @if($i <  5)
                                                <div class="col-sm-12 col-md-6 grid-margin">
                                                    <a href="">
                                                        <div class="position-relative">
                                                            <div class="rotate-img">
                                                                <img
                                                                        src="uploads/{{ $post->image }}"
                                                                        alt="{{ $post->title }}"
                                                                        style="height: 200px !important; width: 100%"
                                                                        class="img-fluid"/>
                                                            </div>
                                                            <div class="badge-positioned w-90">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <span class="badge badge-danger font-weight-bold">{{ $post->category->name }}</span>
                                                                    <div class="video-icon">
                                                                        <i class="mdi mdi-play"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title ">
                                            Video mới nhất
                                        </div>
                                        <p class="mb-3">See all</p>
                                    </div>
                                    @if($video_posts->count() > 0)
                                        @php $i = 0; @endphp
                                        @foreach($video_posts as $post)
                                            @php ++$i; @endphp
                                            @if($i >  4 && $i < 9)
                                                <div class="d-flex justify-content-between align-items-center border-bottom {{ $i > 5 ? 'pt-3 pb-2' : '' }}">
                                                    <div class="div-w-100 mr-3">
                                                        <a href="">
                                                            <div class="rotate-img d-flex ">
                                                                <img
                                                                        src="uploads/{{$post->image }}"
                                                                        alt="{{ $post->title }}"
                                                                        style="height: 100px !important; border-radius: 5px"
                                                                        class="img-fluid"/>
                                                                <div class="pl-2">
                                                                    <h5 class="font-weight-500 mb-0">
                                                                        <a href="">{{ $post->title }}</a>
                                                                    </h5>
                                                                    <div class="fs-13 mb-2">
                                                                        <span class="mr-2">Photo </span> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-sm-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-title">
                                        Video
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        @if($video_posts->count() > 0)
                                            @php $i = 0; @endphp
                                            @foreach($video_posts as $post)
                                                @php ++$i; @endphp
                                                @if($i <  5)
                                                    <div class="col-sm-12 col-md-6 grid-margin">
                                                        <a href="">
                                                            <div class="position-relative">
                                                                <div class="rotate-img">
                                                                    <img
                                                                            src="uploads/{{ $post->image }}"
                                                                            alt="{{ $post->title }}"
                                                                            style="height: 200px !important; width: 100%"
                                                                            class="img-fluid"/>
                                                                </div>
                                                                <div class="badge-positioned w-90">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <span class="badge badge-danger font-weight-bold">{{ $post->category->name }}</span>
                                                                        <div class="video-icon">
                                                                            <i class="mdi mdi-play"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title ">
                                            Video mới nhất
                                        </div>
                                        <p class="mb-3">See all</p>
                                    </div>
                                    @if($video_posts->count() > 0)
                                        @php $i = 0; @endphp
                                        @foreach($video_posts as $post)
                                            @php ++$i; @endphp
                                            @if($i >  4 && $i < 9)
                                                <div class="d-flex justify-content-between align-items-center border-bottom {{ $i > 5 ? 'pt-3 pb-2' : '' }}">
                                                    <div class="div-w-100 mr-3">
                                                        <a href="">
                                                            <div class="rotate-img d-flex ">
                                                                <img
                                                                        src="uploads/{{$post->image }}"
                                                                        alt="{{ $post->title }}"
                                                                        style="height: 100px !important; border-radius: 5px"
                                                                        class="img-fluid"/>
                                                                <div class="pl-2">
                                                                    <h5 class="font-weight-500 mb-0">
                                                                        <a href="">{{ $post->title }}</a>
                                                                    </h5>
                                                                    <div class="fs-13 mb-2">
                                                                        <span class="mr-2">Photo </span> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-sm-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-title">
                                        Video
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        @if($video_posts->count() > 0)
                                            @php $i = 0; @endphp
                                            @foreach($video_posts as $post)
                                                @php ++$i; @endphp
                                                @if($i <  5)
                                                    <div class="col-sm-12 col-md-6 grid-margin">
                                                        <a href="">
                                                            <div class="position-relative">
                                                                <div class="rotate-img">
                                                                    <img
                                                                            src="uploads/{{ $post->image }}"
                                                                            alt="{{ $post->title }}"
                                                                            style="height: 200px !important; width: 100%"
                                                                            class="img-fluid"/>
                                                                </div>
                                                                <div class="badge-positioned w-90">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <span class="badge badge-danger font-weight-bold">{{ $post->category->name }}</span>
                                                                        <div class="video-icon">
                                                                            <i class="mdi mdi-play"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title ">
                                            Video mới nhất
                                        </div>
                                        <p class="mb-3">See all</p>
                                    </div>
                                    @if($video_posts->count() > 0)
                                        @php $i = 0; @endphp
                                        @foreach($video_posts as $post)
                                            @php ++$i; @endphp
                                            @if($i >  4 && $i < 9)
                                                <div class="d-flex justify-content-between align-items-center border-bottom {{ $i > 5 ? 'pt-3 pb-2' : '' }}">
                                                    <div class="div-w-100 mr-3">
                                                        <a href="">
                                                            <div class="rotate-img d-flex ">
                                                                <img
                                                                        src="uploads/{{$post->image }}"
                                                                        alt="{{ $post->title }}"
                                                                        style="height: 100px !important; border-radius: 5px"
                                                                        class="img-fluid"/>
                                                                <div class="pl-2">
                                                                    <h5 class="font-weight-500 mb-0">
                                                                        <a href="">{{ $post->title }}</a>
                                                                    </h5>
                                                                    <div class="fs-13 mb-2">
                                                                        <span class="mr-2">Photo </span> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <livewire:posts.btn-loading-posts/>
        </div>
    </div>
@endsection
