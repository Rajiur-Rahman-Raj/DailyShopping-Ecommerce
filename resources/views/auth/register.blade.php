@extends('layouts.login_register_main')

@section('log_reg_content')
  <body class="page-register">
  <div class="page-inner">
              <div id="main-wrapper">
                  <div class="row">
                      <div class="col-md-3 center">
                          <div class="panel panel-white" id="js-alerts" style="width: 150%;">
                              <div class="panel-body">
                                  <div class="register-box">
                                      <a href="{{ url('/') }}" class="logo-name text-lg text-center m-t-xs">Back to Home</a>
                                      <p class="text-center m-t-md">User Registration Form</p>
                                      <form class="m-t-md" action="{{ route('register') }}" method="POST">
                                        @csrf
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Full Name <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                              @error('name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Email <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Your Email">
                                              @error('email')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Password <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="password" name="password" class="password form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password">

                                              @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Confirm Password <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm-Password">
                                              @error('password_confirmation')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>

                                          <button type="submit" class="btn btn-success btn-block m-t-xs">Submit</button>
                                          <p class="text-center m-t-xs text-sm">Already have an account?</p>
                                          <a href="{{ url('login') }}" class="btn btn-default btn-block m-t-xs">Login</a>
                                      </form>
                                      <p class="text-center m-t-xs text-sm">2019 &copy; Web Training Institue</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!-- Row -->
              </div><!-- Main Wrapper -->
          </div><!-- Page Inner -->
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
