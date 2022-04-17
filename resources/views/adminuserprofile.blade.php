@extends('layouts.backendmaster')
@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="col-md-7" style="margin-left:255px;">
        <div class="page-breadcrumb">
            <ol class="breadcrumb breadcrumb-with-header">
              <li><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Your Profile</li>
              <li><a href="{{ url('view/admin/profile') }}" style="color:blue">View Your Profile</a></li>

            </ol>
        </div>
        <div class="panel">
          @if(session('message'))
            <div class="alert alert-success">
              <strong>Good! </strong> {{ session('message') }}
            </div>
          @endif
          @if(session('edit_msg'))
            <div class="alert alert-success">
              <strong>Good! </strong> {{ session('edit_msg') }}
            </div>
          @endif

          @if (App\Userprofile::where('user_id', Auth::id())->exists())
            @php
              $single_user_info = App\Userprofile::where('user_id', Auth::id())->first();
            @endphp
            <div class="panel-heading clearfix">
              <h2 class="panel-title text-danger text-center" >Update your Profile</h2>
            </div>
            <div class="panel-body">
              <form action="{{ url('user/profile/update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_profile_id" value="{{ $single_user_info->id }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Your First Name</label>
                  <input type="text" name="first_name" value="{{ $single_user_info->first_name }}" class="form-control @error('product_name') is-invalid @enderror" placeholder="Enter Your First Name">
                  @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Your Last Name</label>
                  <input type="text" name="last_name" value="{{ $single_user_info->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your last name">
                  @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Your Current Address</label>
                  <input type="text" class="form-control @error('current_address') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Current Address" name="current_address" value="{{ $single_user_info->current_address }}">
                  @error('product_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Phone Number</label>
                  <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your phone Number" name="phone_number" value="{{ $single_user_info->phone_number }}">
                  @error('phone_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Facebook link <span style="color:red">[optional]</span></label>
                  <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="facebook" value="{{ $single_user_info->facebook }}">
                  @error('facebook')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">instagram link <span style="color:red">[optional]</span></label>
                  <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="instagram" value="{{ $single_user_info->instagram }}">
                  @error('instagram')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Twitter link <span style="color:red">[optional]</span></label>
                  <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="twitter" value="{{ $single_user_info->twitter }}">
                    @error('twitter')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Linkedin link <span style="color:red">[optional]</span></label>
                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="linkedin" value="{{ $single_user_info->linkedin }}">
                      @error('linkedin')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Youtube link <span style="color:red">[optional]</span></label>
                      <input type="text" class="form-control @error('youtube') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="youtube" value="{{ $single_user_info->youtube }}">
                        @error('youtube')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Add Your Profile image</label>
                  <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="exampleInputPassword1" name="profile_image">
                    @error('profile_image')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Write About You</span></label>
                    <textarea type="text" class="form-control @error('about_you') is-invalid @enderror" id="exampleInputPassword1" name="about_you" ></textarea>
                      @error('about_you')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                  <button type="submit" class="btn btn-primary">Update Your Profile</button>
                </form>
            </div>
          @else
            <div class="panel-heading clearfix">
              <h2 class="panel-title">Add your Profile</h2>
            </div>
            <div class="panel-body">
              <form action="{{ url('add/user/profile/insert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Your First Name</label>
                  <input type="text" name="first_name" value="" class="form-control @error('product_name') is-invalid @enderror" placeholder="Enter Your First Name">
                    @error('first_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Your Last Name</label>
                    <input type="text" name="last_name" value="" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your last name">
                      @error('last_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Your Current Address</label>
                      <input type="text" class="form-control @error('current_address') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Current Address" name="current_address" value="">
                        @error('product_name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your phone Number" name="phone_number" value="">
                          @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Facebook link <span style="color:red">[optional]</span></label>
                          <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="facebook" value="">
                            @error('facebook')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputPassword1">instagram link <span style="color:red">[optional]</span></label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="instagram" value="">
                              @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Twitter link <span style="color:red">[optional]</span></label>
                              <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="twitter" value="">
                                @error('twitter')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Linkedin link <span style="color:red">[optional]</span></label>
                                <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="linkedin" value="">
                                  @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Youtube link <span style="color:red">[optional]</span></label>
                                  <input type="text" class="form-control @error('youtube') is-invalid @enderror" id="exampleInputPassword1" placeholder="its optional, if you want then you can add" name="youtube" value="">
                                    @error('youtube')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Add Your Profile image</label>
                              <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="exampleInputPassword1" name="profile_image">
                                @error('profile_image')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Write About You</label>
                                <textarea type="text" class="form-control @error('about_you') is-invalid @enderror" id="exampleInputPassword1" name="about_you" ></textarea>
                                  @error('about_you')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>

                              <button type="submit" class="btn btn-primary">Add Your Profile</button>
                            </form>
                          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

@endsection
