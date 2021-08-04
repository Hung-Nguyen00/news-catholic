<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Catholic') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/mdi/css/materialdesignicons.min.css')  }}"/>
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/aos/dist/aos.css/aos.css') }}"/>
    <!-- End plugin css for this page -->
    <link href="{{ URL::to('assets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('client/assets/images/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client/assets/js/bootstrap.js') }}"/>
</head>
<body>
    <div id="app">
        <div class="container-scroller">
            <div class="main-panel">
                <!-- partial:partials/_navbar.html -->
                <header id="header">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="navbar-brand" style="width: 100%">
                                <div class="d-flex justify-content-between align-items-center" >
                                    <div>
                                        <a class="navbar-brand" href="#"
                                        ><img src="{{ asset('client/assets/images/logo.svg') }}" alt=""
                                            /></a>
                                    </div>
                                    <div>
                                        <button
                                                class="navbar-toggler"
                                                type="button"
                                                data-target="#navbarSupportedContent"
                                                aria-controls="navbarSupportedContent"
                                                aria-expanded="false"
                                                aria-label="Toggle navigation"
                                        >
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div
                                                class="navbar-collapse justify-content-center collapse"
                                                id="navbarSupportedContent"
                                        >
                                            <ul
                                                    class="navbar-nav d-lg-flex justify-content-between align-items-center"
                                            >
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       style="font-size: 16px !important;"
                                                       href="pages/magazine.html">Home</a>
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
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>
                {{--<div class="form-group">--}}
                    {{--<label> Description </label>--}}
                    {{--<textarea class="form-control" style="height: 100vh; width: 500px" id="editor"--}}
                              {{--placeholder="Enter the Description" name="editor"></textarea>--}}
                {{--</div>--}}
                <main>
                    @yield('content')
                </main>
                <footer>
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img src="client/assets/images/logo.svg" class="footer-logo" alt="" />
                                    <h5 class="font-weight-normal mt-4 mb-5">
                                        Newspaper is your news, entertainment, music fashion website. We
                                        provide you with the latest breaking news and videos straight from
                                        the entertainment industry.
                                    </h5>
                                    <ul class="social-media mb-3">
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="footer-border-bottom pb-2">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img
                                                                src="{{ asset('client/assets/images/dashboard/home_1.jpg') }}"
                                                                alt="thumb"
                                                                class="img-fluid"
                                                        />
                                                    </div>
                                                    <div class="col-9">
                                                        <h5 class="font-weight-600">
                                                            Cotton import from USA to soar was American traders
                                                            predict
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="footer-border-bottom pb-2 pt-2">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img
                                                                src="client/assets/images/dashboard/home_2.jpg"
                                                                alt="thumb"
                                                                class="img-fluid"
                                                        />
                                                    </div>
                                                    <div class="col-9">
                                                        <h5 class="font-weight-600">
                                                            Cotton import from USA to soar was American traders
                                                            predict
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img
                                                                src="client/assets/images/dashboard/home_3.jpg"
                                                                alt="thumb"
                                                                class="img-fluid"
                                                        />
                                                    </div>
                                                    <div class="col-9">
                                                        <h5 class="font-weight-600 mb-3">
                                                            Cotton import from USA to soar was American traders
                                                            predict
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                                    <div class="footer-border-bottom pb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 font-weight-600">Magazine</h5>
                                            <div class="count">1</div>
                                        </div>
                                    </div>
                                    <div class="footer-border-bottom pb-2 pt-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 font-weight-600">Business</h5>
                                            <div class="count">1</div>
                                        </div>
                                    </div>
                                    <div class="footer-border-bottom pb-2 pt-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 font-weight-600">Sports</h5>
                                            <div class="count">1</div>
                                        </div>
                                    </div>
                                    <div class="footer-border-bottom pb-2 pt-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 font-weight-600">Arts</h5>
                                            <div class="count">1</div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 font-weight-600">Politics</h5>
                                            <div class="count">1</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <div class="fs-14 font-weight-600">
                                            © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
                                        </div>
                                        <div class="fs-14 font-weight-600">
                                            Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
                                        </div>
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

    {{--<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>--}}
    {{--<script>--}}
        {{--//Define an adapter to upload the files--}}
        {{--class MyUploadAdapter {--}}
            {{--constructor(loader) {--}}
                {{--// The file loader instance to use during the upload. It sounds scary but do not--}}
                {{--// worry — the loader will be passed into the adapter later on in this guide.--}}
                {{--this.loader = loader;--}}

                {{--// URL where to send files.--}}
                {{--this.url = '{{ route('ckeditor') }}';--}}

                {{--//--}}
            {{--}--}}
            {{--// Starts the upload process.--}}
            {{--upload() {--}}
                {{--return this.loader.file.then(--}}
                    {{--(file) =>--}}
                        {{--new Promise((resolve, reject) => {--}}
                            {{--this._initRequest();--}}
                            {{--this._initListeners(resolve, reject, file);--}}
                            {{--this._sendRequest(file);--}}
                        {{--})--}}
                {{--);--}}
            {{--}--}}
            {{--// Aborts the upload process.--}}
            {{--abort() {--}}
                {{--if (this.xhr) {--}}
                    {{--this.xhr.abort();--}}
                {{--}--}}
            {{--}--}}
            {{--// Initializes the XMLHttpRequest object using the URL passed to the constructor.--}}
            {{--_initRequest() {--}}
                {{--const xhr = (this.xhr = new XMLHttpRequest());--}}
                {{--// Note that your request may look different. It is up to you and your editor--}}
                {{--// integration to choose the right communication channel. This example uses--}}
                {{--// a POST request with JSON as a data structure but your configuration--}}
                {{--// could be different.--}}
                {{--// xhr.open('POST', this.url, true);--}}
                {{--xhr.open("POST", this.url, true);--}}
                {{--xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");--}}
                {{--xhr.responseType = "json";--}}
            {{--}--}}
            {{--// Initializes XMLHttpRequest listeners.--}}
            {{--_initListeners(resolve, reject, file) {--}}
                {{--const xhr = this.xhr;--}}
                {{--const loader = this.loader;--}}
                {{--const genericErrorText = `Couldn't upload file: ${file.name}.`;--}}
                {{--xhr.addEventListener("error", () => reject(genericErrorText));--}}
                {{--xhr.addEventListener("abort", () => reject());--}}
                {{--xhr.addEventListener("load", () => {--}}
                    {{--const response = xhr.response;--}}
                    {{--// This example assumes the XHR server's "response" object will come with--}}
                    {{--// an "error" which has its own "message" that can be passed to reject()--}}
                    {{--// in the upload promise.--}}
                    {{--//--}}
                    {{--// Your integration may handle upload errors in a different way so make sure--}}
                    {{--// it is done properly. The reject() function must be called when the upload fails.--}}
                    {{--if (!response || response.error) {--}}
                        {{--return reject(response && response.error ? response.error.message : genericErrorText);--}}
                    {{--}--}}
                    {{--// If the upload is successful, resolve the upload promise with an object containing--}}
                    {{--// at least the "default" URL, pointing to the image on the server.--}}
                    {{--// This URL will be used to display the image in the content. Learn more in the--}}
                    {{--// UploadAdapter#upload documentation.--}}
                    {{--resolve({--}}
                        {{--default: response.url,--}}
                    {{--});--}}
                {{--});--}}
                {{--// Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded--}}
                {{--// properties which are used e.g. to display the upload progress bar in the editor--}}
                {{--// user interface.--}}
                {{--if (xhr.upload) {--}}
                    {{--xhr.upload.addEventListener("progress", (evt) => {--}}
                        {{--if (evt.lengthComputable) {--}}
                            {{--loader.uploadTotal = evt.total;--}}
                            {{--loader.uploaded = evt.loaded;--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}
            {{--}--}}
            {{--// Prepares the data and sends the request.--}}
            {{--_sendRequest(file) {--}}
                {{--// Prepare the form data.--}}
                {{--const data = new FormData();--}}
                {{--data.append("upload", file);--}}
                {{--// Important note: This is the right place to implement security mechanisms--}}
                {{--// like authentication and CSRF protection. For instance, you can use--}}
                {{--// XMLHttpRequest.setRequestHeader() to set the request headers containing--}}
                {{--// the CSRF token generated earlier by your application.--}}
                {{--// Send the request.--}}
                {{--this.xhr.send(data);--}}
            {{--}--}}
            {{--// ...--}}
        {{--}--}}

        {{--function SimpleUploadAdapterPlugin(editor) {--}}
            {{--editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {--}}
                {{--// Configure the URL to the upload script in your back-end here!--}}
                {{--return new MyUploadAdapter(loader);--}}
            {{--};--}}
        {{--}--}}

        {{--//Initialize the ckeditor--}}
        {{--ClassicEditor.create(document.querySelector("#editor"), {--}}
            {{--extraPlugins: [SimpleUploadAdapterPlugin],--}}
        {{--}).catch((error) => {--}}
            {{--console.error(error);--}}
        {{--});--}}

    {{--</script>--}}
    <!-- inject:js -->
    <script src="{{ asset('client/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('client/assets/vendors/aos/dist/aos.js/aos.js') }}"></script>
    <script src="{{ asset('client/assets/js/demo.js') }}"></script>
    <script src="{{ URL::to('assets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ URL::to('assets/js/plugins-init/summernote-init.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.easeScroll.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
</body>
</html>
