<div>
    @if($categories->count() > 0)
    @foreach($categories as $category)
             <div class="row" style="padding-bottom: 32px" data-aos="fade-up">
           <div class=" col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap">
                        <div class="col-12 col-md-12 col-lg-7 d-flex flex-wrap">
                            <div class="card-title">
                                {{ $category->name }}
                            </div>
                            <div class="d-flex flex-wrap">
                                @if($posts->count() > 0)
                                @php $i = 0; @endphp
                                    @foreach($posts as $post)
                                        @if($post->category_id == $category->id && $i < 2)
                                            @php ++$i @endphp
                                            <div class="col-12 col-xl-6 col-md-6 ">
                                              <div class="row">
                                                  <div class="col-xl-12 col-lg-8 col-sm-12">
                                                  <a href="{{ route('admin.posts.show', $post) }}">
                                                    <div class="rotate-img">
                                                        <img
                                                                src="uploads/{{ $post->image }}"
                                                                alt="{{ $post->title }}"
                                                                style="width: 280px; height: 150px "
                                                                class="img-fluid"
                                                        />
                                                    </div>
                                                  </a>
                                                    <h2 class="mt-1 text-primary">
                                                        <a href="{{ route('admin.posts.show', $post) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h2>
                                                    <p class="fs-13 text-muted" style="margin-top: -5px">
                                                        <span class="mr-2">Hình ảnh </span>
                                                        {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y - h:i A') }}
                                                    </p>
                                                    <p class="fs-15" style="margin-top: -10px">
                                                        {{strlen($post->short_description) > 120 ? substr($post->short_description,0, 120)."..." : $post->short_description  }}
                                                    </p>
                                                </div>
                                              </div>
                                        </div>
                                        @endif
                                     @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card-title">
                               Các bài viết liên quan
                                <span class="float-right"><a href="{{ route('categories.show', ['category' => $category->slug])}}" class="fs-15">Xem tất cả</a></span>
                            </div>

                            <div class="d-flex flex-wrap">
                                @if($posts->count() > 0)
                                    @php $i = 0; @endphp
                                    @foreach($posts as $post)
                                        @if($post->category_id == $category->id)
                                            @php ++$i @endphp
                                            @if($i > 2 && $i< 6)
                                                <div class="col-sm-12 col-xs-6 pb-2">
                                                    <div class="border-bottom pb-2">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <a href="{{ route('admin.posts.show', $post) }}">
                                                                    <div class="rotate-img">
                                                                        <img
                                                                                src="uploads/{{$post->image}}"
                                                                                alt="thumb"
                                                                                class="img-fluid w-100"
                                                                        />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-7 ">
                                                                <p class="fs-16 font-weight-600 mb-0">
                                                                    <a href="{{ route('admin.posts.show', $post) }}" class="fs-16"> {{ $post->title }}</a>
                                                                </p>
                                                                <p class="fs-13 text-muted mb-0">
                                                                    <span class="mr-2">Hình ảnh </span>
                                                                    {{  Carbon\Carbon::parse($post->created_at)->format('d-m-Y - h:i A')  }}
                                                                </p>
                                                                <p class="mb-0 fs-13">
                                                                    {{strlen($post->short_description) > 60 ? substr($post->short_description,0, 60)."..." : $post->short_description  }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    @if($check_loading)
        <div class="d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center">
                <button wire:click="plusCategory" type="button" class="btn btn-primary">Xem Thêm</button>
            </div>
           @if($show_loading)
                <div class="d-flex pt-2 justify-content-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
           @endif
        </div>
     @endif
</div>