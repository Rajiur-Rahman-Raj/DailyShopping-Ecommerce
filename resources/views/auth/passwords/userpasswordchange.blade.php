@extends('layouts/backendmaster')
@section('backend_content')
  <div class="page-inner">
              <div id="main-wrapper">
                  <div class="row">
                      <div class="col-md-3 center" >
                          <div class="
                          panel panel-white" id="js-alerts" style="width: 150%;">
                              <div class="panel-body">
                                  <div class="register-box">
                                    {{-- @if(session('success_msg'))
                                       <div class="alert alert-success">
                                         <h3>{{ session('success_msg') }}</h3>
                                       </div>
                                    @endif --}}
                                    @if(session('success_msg'))
                                       <div class="alert alert-success alert-dismissible" role="alert">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       <strong>{{ session('success_msg') }}</strong>
                                       </div>
                                     @endif

                                      <p class="text-center m-t-md">Change Your Password </p>
                                      <form class="m-t-md" action="{{ url('user/change/password/insert') }}" method="POST">
                                        @csrf

                                          <div class="form-group">
                                            <label for="">Current Password <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="password" name="current_password" class="password form-control @error('current_password') is-invalid @enderror" placeholder="Enter Your Current Password" >

                                              @error('current_password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg text-danger">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                              @if(session('err_msg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ session('err_msg') }}</strong>
                                                </span>
                                              @endif
                                          </div>
                                          <div class="form-group">
                                              <label for="">New Password <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input type="password" name="new_password" class="password form-control @error('new_password') is-invalid @enderror" placeholder="Enter Your New Password">

                                              @error('new_password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg text-danger">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>

                                          <div class="form-group">
                                              <label for="">Confirm Password <span style="font-size:14px" class="text-danger">*</span></label>
                                              <input id="password-confirm" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password"  autocomplete="new-password" placeholder="enter confirm password">
                                              @error('confirm_password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong class="error-msg text-danger">{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                              @if(session('no_match'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ session('no_match') }}</strong>
                                                </span>
                                              @endif
                                          </div>

                                          <button type="submit" class="btn btn-success btn-block m-t-xs">Update Password</button>
                                      </form>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!-- Row -->
              </div><!-- Main Wrapper -->
          </div><!-- Page Inner -->
@endsection
