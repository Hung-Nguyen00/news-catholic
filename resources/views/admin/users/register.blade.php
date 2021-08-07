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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Các tài khoản</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                        <div class="authincation h-100">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-6">
                                    <div class="authincation-content">
                                        <div class="row no-gutters">
                                            <div class="col-xl-12">
                                                <livewire:users.register-user/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
