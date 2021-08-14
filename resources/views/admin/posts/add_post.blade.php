@extends('layouts.st_master')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Trang chủ</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Các bài viết</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Thêm vài viết mới</a></li>
                    </ol>
                </div>
            </div>
            @if($message)
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm bài viết mới</h4>
                        </div>
                        <div class="card-body d-flex">
                            <form method="post" class="col-xl-12 col-lg-12 col-xxl-12 col-md-12" enctype="multipart/form-data" action="{{ route('admin.posts.store') }}">
                                @csrf
                                <div class="d-flex">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Tên tiêu đề') }}</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" >
                                                @if($errors->has('title'))
                                                    <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                        {{ $errors->first('title') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Mô tả ngắn') }}</label>
                                            <div class="col-md-8">
                                            <textarea type="text"
                                                      class="form-control @error('short_description') is-invalid @enderror"
                                                      name="short_description"
                                                      style="height: 100px;"
                                                        >{{ old('short_description') ?? 'Viết mô tả ngắn' }}
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
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Thể loại') }}</label>
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
                                        <img id="output" src="{{ asset('uploads/empty_image.jpg') }}" style="max-width: 80%" alt="your image" />
                                    </span>
                                    </div>
                                </div>
                                <div class="form-check pt-2 row">
                                    <label class="col-md-2  col-form-label" style="margin-left: -6px; margin-right: 35px;">Thuộc video</label>
                                    <input type="checkbox" class="form-check-input" name="is_video">
                                </div>
                                <div class="form-check pt-2 row">
                                    <label class="col-md-2 col-form-label" style="margin-left: -6px; margin-right: 35px;">Nội dung sao chép </label>
                                    <input type="checkbox" class="form-check-input" name="is_copy">
                                </div>
                                <div class="form-group pt-2 row" style="margin-left: 0px">
                                    <label for="name" class="col-md-2 col-form-label">{{ __('Nội dung') }}</label>
                                    <div class="col-md-10" style="padding-left: -50px">
                                        <textarea  class="summernote"  id="body" name="content_post" style="border-radius: 5px">  {{ old('content_post')}}</textarea>
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
    </script>

    <script src="{{ URL::to('assets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ URL::to('assets/js/plugins-init/summernote-init.js') }}"></script>
@endsection

