@extends('layouts.st_master')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Bài viết</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Bài viết</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Các bài viết</h4>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary" style="display: block">Thêm bài viết</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <livewire:posts.show-posts :posts="$posts" :categories="$categories"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::to('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/plugins-init/datatables.init.js') }}"></script>
@endsection