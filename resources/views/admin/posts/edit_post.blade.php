@extends('layouts.st_master')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Admin Dashboard</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Student</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Post</h4>
                        </div>
                        <div class="card-body d-flex">
                            <form method="post" class="col-xl-12 col-lg-12 col-xxl-12 col-md-12" enctype="multipart/form-data" action="{{ route('admin.posts.update', $post->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="d-flex">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Title') }}</label>
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
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Short Description') }}</label>
                                            <div class="col-md-8">
                                            <textarea type="text"
                                                      class="form-control @error('short_description') is-invalid @enderror"
                                                      name="short_description"
                                                      placeholder="short description">{{ old('short_description') ?? $post->short_description }}
                                            </textarea>
                                                @if($errors->has('short_description'))
                                                    <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                        {{ $errors->first('short_description') }}
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="image" class="col-md-3 col-form-label">{{ __('Avatar') }}</label>
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
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Category') }}</label>
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
                                <div class="form-group row" style="margin-left: 0px">
                                    <label for="name" class="col-md-2 col-form-label">{{ __('Content') }}</label>
                                    <div class="col-md-10" style="padding-left: -50px">
                                        <textarea class="summernote" name="content_post" style="border-radius: 5px">
                                            {{ old('content_post') ?? $post->content}}
                                        </textarea>
                                        @if($errors->has('content_post'))
                                            <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                                {{ $errors->first('content_post') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-check row">
                                    <label class="col-form-label" style="margin-right: 105px">Thuộc video</label>
                                    <input type="checkbox" class="form-check-input" {{ $post->is_video == 1 ? 'checked' : ''   }} name="is_video" id="exampleCheck1">
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

@push('child-scripts')
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
    <script>
        //Define an adapter to upload the files
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload. It sounds scary but do not
                // worry — the loader will be passed into the adapter later on in this guide.
                this.loader = loader;

                // URL where to send files.
                this.url = '{{ route('ckeditor.upload') }}';

                //
            }
            // Starts the upload process.
            upload() {
                return this.loader.file.then(
                    (file) =>
                        new Promise((resolve, reject) => {
                            this._initRequest();
                            this._initListeners(resolve, reject, file);
                            this._sendRequest(file);
                        })
                );
            }
            // Aborts the upload process.
            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }
            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = (this.xhr = new XMLHttpRequest());
                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                // xhr.open('POST', this.url, true);
                xhr.open("POST", this.url, true);
                xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
                xhr.responseType = "json";
            }
            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${file.name}.`;
                xhr.addEventListener("error", () => reject(genericErrorText));
                xhr.addEventListener("abort", () => reject());
                xhr.addEventListener("load", () => {
                    const response = xhr.response;
                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }
                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve({
                        default: response.url,
                    });
                });
                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener("progress", (evt) => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }
            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();
                data.append("upload", file);
                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.
                // Send the request.
                this.xhr.send(data);
            }
            // ...
        }

        function SimpleUploadAdapterPlugin(editor) {
            editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }

        //Initialize the ckeditor
        ClassicEditor.create(document.querySelector("#body"), {
            extraPlugins: [SimpleUploadAdapterPlugin],
        }).catch((error) => {
            console.error(error);
        });

    </script>
@endpush

