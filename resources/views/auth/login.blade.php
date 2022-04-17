
@extends('layouts.login_register_main')

@section('log_reg_content')
  <body class="page-login">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="panel panel-white" id="js-alerts" style="width:150%">
                                <div class="panel-body">
                                    <div class="login-box">
                                        <a href="{{ url('') }}" class="logo-name text-lg text-center m-t-xs">Back To Home</a>
                                        <p class="text-center m-t-md">Please login into your account.</p>
                                        <form class="m-t-md" method="POST" action="{{ route('login') }}">
                                          @csrf
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">E-Mail Address</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="current-password" placeholder="Enter Your Email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error-msg">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-form-label">Password</label>
                                                <input id="password" type="password" class="form-control password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error-msg">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                  <label class="form-check-label" for="remember">
                                                      {{ __('Remember Me') }}
                                                  </label>
                                              </div>
                                            </div>

                                            <button type="submit" class="btn btn-success btn-block">Login</button>
                                            <a href="{{ url('password/reset') }}" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                            <p class="text-center m-t-xs text-sm">Do not have an account?</p>
                                            <a href="{{ url('register') }}" class="btn btn-default btn-block m-t-md">Create an account</a>
                                        </form>
                                        <p class="text-center m-t-xs text-sm">2016 &copy; stacks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
