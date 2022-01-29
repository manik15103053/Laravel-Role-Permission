@extends('backend.auth.auth-master')

@section('auth-content')
    <form method = "POST" action = "{{ route('admin.login.submit')}}">
        @csrf
        <div class="login-form-head">
            <h4>Sign In</h4>
            <p>Hello there, Sign in and start managing your Admin Template</p>
        </div>
        <div class="login-form-body">
        @include('backend.layouts.partial.message')
            <div class="form-gp">
                <label for="email">Email address</label>
                <input type="text" id="email" name="email">
                <i class="ti-email"></i>
                <div class="text-danger"></div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-gp">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <i class="ti-lock"></i>
                <div class="text-danger"></div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row mb-4 rmber-area">
                <div class="col-6">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                        <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
            </div>
            <div class="form-footer text-center mt-5">
                <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
            </div>
        </div>
    </form>
    @endsection
