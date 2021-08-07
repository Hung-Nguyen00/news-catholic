<div>
    <div class="auth-form">
        <h4 class="text-center mb-4">Đăng kí tài khoản mới</h4>
        <form >
            @csrf
            <div class="form-group">
                <label><strong>Tên</strong></label>
                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" placeholder="Enter Your Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- insert defaults --}}
            <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
            <div class="form-group">
                <label><strong>Email</strong></label>
                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" placeholder="Enter Your Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>Mật khẩu</strong></label>
                <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" name="password"
                       placeholder="Enter Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label><strong>Nhập lại mật khẩu</strong></label>
                <input type="password" wire:model="password_confirmation"  class="form-control" name="password_confirmation"
                       placeholder="Choose Confirm Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="text-center mt-4">
                <button type="button" wire:click="store()" class="btn btn-primary btn-block">Đăng kí</button>
            </div>
        </form>
    </div>
</div>
