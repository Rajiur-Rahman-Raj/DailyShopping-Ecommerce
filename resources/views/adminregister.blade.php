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
                                    @if(session('success_msg'))
                                       <div class="alert alert-success">
                                         <h3>{{ session('success_msg') }}</h3>
                                       </div>
                                    @endif
                                    @if(session('err_msg'))
                                      <div class="alert alert-danger">
                                          <h3>{{ session('err_msg') }}</h3>
                                      </div>
                                    @endif

                                      <a href="{{ url('/') }}" class="logo-name text-lg text-center m-t-xs">Back to Home</a>
                                      <p class="text-center m-t-md">Admin Registration</p>
                                      <form class="m-t-md" action="{{ url('admin/register/insert') }}" method="POST">
                                        @csrf
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Full Name <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                              @error('name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg text-danger">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Email <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Your Email">
                                              @error('email')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg text-danger">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Password <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="password" name="password" class="password form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password" value="{{ old('password') }}">

                                              @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Confirm Password <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" placeholder="Confirm-Password" value="{{ old('password_confirmation') }}">
                                              @error('password_confirmation')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                              @if(session('no_match'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ session('no_match') }}</strong>
                                                </span>
                                              @endif
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
