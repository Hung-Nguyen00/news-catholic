<div>
    <div class="row mb-3">
        <div class="col-sm-12" style="z-index: 9999">
            <h2 class="font-weight-600 text-capitalize">
                {{  $post->title }}
            </h2>
            <div>
                <span class="badge badge-pill badge-danger" style="padding: 5px 10px">{{ $post->getNameCategory($post->category_id) }}</span>
            </div>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-lg-8">
                <h5>{{ $post->short_description }}</h5>
                {!! $post->content !!}
            </div>
            <div class="col-lg-4 " >
                <div class="position-sticky" style="top: 0;">
                    <h2 class="mb-2 text-primary font-weight-600">
                        Bài viết liên quan
                    </h2>
                    @if($related_posts->count() > 0)
                        @foreach($related_posts as $post)
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
    </div>
</div>