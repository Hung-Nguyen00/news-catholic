@extends('layouts.st_master')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Chỉnh sửa bài viết</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Các bài viết</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Chỉnh sửa bài viết</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Chỉnh sửa bài viết</h4>
                        </div>
                        <div class="card-body d-flex">
                            <form method="post" class="col-xl-12 col-lg-12 col-xxl-12 col-md-12" enctype="multipart/form-data" action="{{ route('admin.posts.update', $post->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="d-flex">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Tiêu đề') }}</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control @error('title') is-invalid @enderror"
                                                       name="title" value="{{ old('title') ?? $post->title}}" >
                                                @if($errors->has('title'))
                                                    <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                        {{ $errors->first('title') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="title" class="col-md-3 col-form-label">{{ __('Mô tả ngắn') }}</label>
                                            <div class="col-md-8">
                                            <textarea type="text"
                                                      class="form-control @error('short_description') is-invalid @enderror"
                                                      name="short_description"
                                                      style="height: 100px;"
                                                      >{{ old('short_description') ?? $post->short_description }}
                                            </textarea>
                                                @if($errors->has('short_description'))
                                                    <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                        {{ $errors->first('short_description') }}
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="image" class="col-md-3 col-form-label">{{ __('Ảnh đại diện') }}</label>
                                            <div class="col-md-8">
                                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                                       name="image" value="{{ old('image') }}" onchange="loadFile(event)">
                                                @if($errors->has('image'))
                                                    <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                        {{ $errors->first('image') }}
                                                    </div>
                                                @endif

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="category" class="col-md-3 col-form-label">{{ __('Thể loại') }}</label>
                                            <div class="col-md-8">
                                                <select name="category_id" id="" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('category_id'))
                                                    <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                        {{ $errors->first('category_id') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="responsive-image" style="float: right;">
                                        <img id="output" src="{{ asset('uploads/'.$post->image) }}" style="max-width: 80%" alt="your image" />
                                    </span>
                                    </div>
                                </div>
                                <div class="form-check row" style="margin-left: -6px">
                                    <label class="col-form-label" style="margin-right: 100px">Thuộc video</label>
                                    <input type="checkbox" class="form-check-input" {{ $post->is_video == 1 ? 'checked' : ''   }} name="is_video" id="exampleCheck1">
                                </div>
                                <div class="form-group row" style="margin-left: 0px">
                                    <label for="content_post" class="col-md-2 col-form-label">{{ __('Nội dung') }}</label>
                                    <div class="col-md-10" style="padding-left: -50px">
                                        <textarea class="summernote" id="editor" name="content_post" style="border-radius: 5px">
                                            {{ old('content_post') ?? $post->content}}
                                        </textarea>
                                        @if($errors->has('content_post'))
                                            <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                {{ $errors->first('content_post') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0 float-right">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Enter content....',
                tabsize: 2,
                height: 200,
                minHeight: 100,
                maxHeight: 300,
                focus: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ],
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']]
                    ]
                },
                codemirror: {
                    theme: 'monokai'
                }
            });

        });
    </script>
    <script src="{{ URL::to('assets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ URL::to('assets/js/plugins-init/summernote-init.js') }}"></script>
@endsection