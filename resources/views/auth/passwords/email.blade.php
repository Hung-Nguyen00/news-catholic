@extends('layouts.app')
@section('content')
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">Quên mật khẩu</h4>
                                <p class="auth-subtitle mb-3">Nhập email để gửi link lấy lại mật khẩu</p>

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>Email</strong></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                                        @error('email')
                                        <span class="text-danger font-weight-bold invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        @if(Session::has('message'))
                                            <p class="alert mt-2 {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">SEND</button>
                                    </div>
                                    <div class="text-center mt-3 text-lg fs-4">
                                        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Login</a>.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection