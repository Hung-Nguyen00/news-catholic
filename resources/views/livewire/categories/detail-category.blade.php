<div>
    <div class="row">
        <div class="col-lg-8">
            @if($posts_category->count() > 0)
                @foreach($posts_category as $post)
                <div class="row">
                <div class="col-sm-4 grid-margin">
                    <div class="rotate-img">
                        <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">
                        <img
                                src="{{ asset('uploads/'.$post->image)}}"
                                style="height: 130px; width: 200px"
                                alt="{{ $post->title }}"
                                class="img-fluid"
                        />
                        <a/>
                    </div>
                </div>
                <div class="col-sm-8 grid-margin">
                    <h2 class="font-weight-600 mb-2">
                        <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="fs-13 text-muted mb-0">
                        <span class="mr-2">{{ $post->is_video ? 'Video' : 'Hình ảnh' }} </span>
                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                    </p>
                    <p class="fs-15">
                        {{ strlen($post->short_description) > 180 ? substr($post->short_description, 0 , 180).'...' : $post->short_description }}
                    </p>
                </div>
            </div>
                @endforeach
            @endif
        </div>
        <div class="col-lg-4 " >
            <div class="position-sticky" style="top: 0;">
                <h2 class="mb-2 text-primary font-weight-600">
                    Bài viết mới nhất
                </h2>
                @if($latest_posts->count() > 0)
                    @foreach($latest_posts as $post)
                        <div class="row">
                             <div class="col-sm-12">
                                <div class="pt-3">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h5 class="font-weight-600 mb-1">
                                                <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
                                            </h5>
                                            <p class="fs-13 text-muted mb-0">
                                                <span class="mr-2">{{ $post->is_video ? 'Video' : 'Hình ảnh' }} </span>
                                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="rotate-img">
                                                <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">
                                                <img
                                                        src="{{ asset('uploads/'. $post->image) }}"
                                                        alt="{{ $post->title }}"
                                                        class="img-fluid"
                                                />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="mt-3">
                    <h2 class="mb-2 text-primary font-weight-600">
                        Bài viết hot nhất
                    </h2>
                    @if($top_hot_post->count() > 0)
                        @foreach($top_hot_post as $post)
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="pt-3">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <h5 class="font-weight-600 mb-1">
                                                    <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
                                                </h5>
                                                <p class="fs-13 text-muted mb-0">
                                                    <span class="mr-2">{{ $post->is_video ? 'Video' : 'Hình ảnh' }} </span>
                                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                </p>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="rotate-img">
                                                    <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">
                                                        <img
                                                                src="{{ asset('uploads/'. $post->image) }}"
                                                                alt="{{ $post->title }}"
                                                                class="img-fluid"
                                                        />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        @if($check_loading &&  $posts_category->count() > 5)
        <button wire:click="addMorePost" class="btn btn-primary">Xem Thêm</button>
        @endif
    </div>
</div>
