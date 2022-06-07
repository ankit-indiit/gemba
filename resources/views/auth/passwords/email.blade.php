@extends('layout.master')
@section('content') 
<section class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-8">
                <div class="contact-form-box">
                    <h3>Reset Password</h3>
                    <form method="POST" action="{{ route('password.email') }}" id="resetPasswordForm">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                        </div>
                        <button type="submit" class="submit-button">
                            {{ __('Send Password Reset Link') }}
                        </button>                                     
                    </form>
                    <div class="bottom-box">
                        <div class="text">Don't have an account? <a href="{{ route('register') }}" class="signup">Signup</a></div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
@endsection
@section('customGembaScripts')
<script type="text/javascript">
    $("#resetPasswordForm").validate({
        rules: {        
          email: {
             required: true,
          },          
        },
        messages: {
          email: "Please enter your email",
       },
    });
</script>
@endsection


{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
