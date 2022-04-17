@extends('layouts.login_register_main')

@section('log_reg_content')
  <body class="page-login">
          <main class="page-content">
              <div class="page-inner">
                  <div id="main-wrapper">
                      <div class="row">
                          <div class="col-md-3 center">
                              <div class="panel panel-white" id="js-alerts">
                                  <div class="panel-body">
                                      <div class="login-box">
                                          <a href="{{ '/' }}" class="logo-name text-lg text-center m-t-xs">Back To Home</a>
                                          <p class="text-center m-t-md">Enter your email address below to reset your password</p>
                                          @if (session('status'))
                                              <div class="alert alert-success" role="alert">
                                                  {{ session('status') }}
                                              </div>
                                          @endif
                                          <form class="m-t-md" method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                              <div class="form-group">
                                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="error-msg">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                              </div>
                                              <button type="submit" class="btn btn-success btn-block m-b-xs">Sebd Reset Password Link</button>
                                              <a href="{{ url('login') }}" class="btn btn-default btn-block">Back</a>
                                          </form>
                                          <p class="text-center m-t-xs text-sm">2019 &copy; Web Training Institue</p>
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
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
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
