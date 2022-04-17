@extends('layouts.backendmaster')

@section('backend_content')


  @if (App\Userprofile::where('user_id', Auth::id())->exists())
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/user/profile') }}">Add Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Profile</li>
          </ol>
          <div class="col-md-6" style="border-right: 2px solid #51a599;">
            <div class="user_left">
              @if(session('edit_msg'))
                <div class="alert alert-success">
                  <strong>Good! </strong> {{ session('edit_msg') }}
                </div>
              @endif
              <h2>{{ Auth::user()->name }}</h2>
              <img src="{{ asset('uploads/user_profile_img') }}/{{ App\Userprofile::where('user_id', Auth::id())->first()->profile_image }}" alt="">

              <div class="update_image_form" style="margin-left:347px; width:180px;">
                @php
                  $single_user_info = App\Userprofile::where('user_id', Auth::id())->first();
                @endphp
                <form action="{{ url('update/user/profile/image') }}"  method="post" enctype="multipart/form-data">
                  @csrf
                  <h3 style="float:right; margin-right: 8px; margin-top: -200px;">Change Profile Photo</h3>
                  <input type="hidden" name="user_profile_id" value="{{ $single_user_info->id }}">
                  <input type="file" name="update_profile_image" style="margin-top: -60px;position: absolute;margin-left: 3px;">
                  <button type="submit" class="btn btn-success btn-sm" style="margin-left: 100px;margin-top: -41px;position: unset;">Change</button>
                </form>

              </div>

            </div>

          </div>
          <div class="col-md-6" style="">
            <div class="user_right">
              <h2>Follow Me</h2>
              <div class="user_icon">
                <ul class="list-unstyled text-center">
                  @if(Auth::user()->role == 2)
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->facebook }}" id="facebook" target="_blank"><i class="fa fa-facebook-f same_user_icon"  ></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->instagram }}" id="instagram" target="_blank"><i class="fa fa-instagram same_user_icon"></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->twitter }}" id="twitter" target="_blank"><i class="fa fa-twitter same_user_icon"></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->linkedin }}" id="linkedin" target="_blank"><i class="fa fa-linkedin same_user_icon"></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->youtube }}" id="youtube" target="_blank"><i class="fa fa-youtube same_user_icon"></i></a> </li>

                  @else
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->facebook }}" id="facebook" target="_blank"><i class="fab fa-facebook-f same_user_icon"  ></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->instagram }}" id="instagram" target="_blank"><i class="fab fa-instagram same_user_icon"></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->twitter }}" id="twitter" target="_blank"><i class="fab fa-twitter same_user_icon"></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->linkedin }}" id="linkedin" target="_blank"><i class="fab fa-linkedin-in same_user_icon"></i></a> </li>
                    <li> <a href="{{ App\Userprofile::where('user_id', Auth::id())->first()->youtube }}" id="youtube" target="_blank"><i class="fab fa-youtube same_user_icon"></i></a> </li>

                  @endif

                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="user_info_top">
            <h1 class="text-center" style="color: #2685ab;border-bottom: 1px solid #0fadb5;padding-bottom: 10px;"> My Profile Information </h1>
          </div>
          @php
            $first_name = App\Userprofile::where('user_id', Auth::id())->first();
          @endphp


          @if ($first_name->youtube == 'NULL')
            <div class="col-md-6" style="margin-left: 270px;">
              <div class="panel">
                <div class="panel-body">

                  <span style="color:red">Nothing to show your information!</span><span style="color:blue !important"> <a  class="btn btn-primary btn-sm" href="{{ url('add/user/profile') }}">Click Here </a> To add you profile</span>
                </div>

              </div>

            </div>
          @else
            <div class="col-md-6" style="margin-left: 270px;">
              <div class="panel">
                <div class="panel-body">
                  <div class="col-md-4" style="border-right: 2px solid red;">
                    <h4 style="margin-bottom:3px"> Ragistration Date : </h4>
                  </div>
                  <div class="col-md-6">
                    <h4 style="font-weight:normal">{{ Auth::user()->created_at->format('M-d-Y') }}</h4>
                  </div>
                  <div class="col-md-4" style="border-right: 2px solid red;">
                    <h4 style="margin-bottom:3px">First Name : </h4>
                  </div>
                  <div class="col-md-6">
                    <h4 style="font-weight:normal">{{ App\Userprofile::where('user_id', Auth::id())->first()->first_name }}</h4>
                  </div>

                  <div class="col-md-4" style="border-right: 2px solid red;">
                    <h4 style="margin-bottom:3px">Last Name : </h4>
                  </div>
                  <div class="col-md-6">
                    <h4 style="font-weight:normal">{{ App\Userprofile::where('user_id', Auth::id())->first()->last_name }}</h4>
                  </div>

                  <div class="col-md-4" style="border-right: 2px solid red;">
                    <h4 style="margin-bottom:3px">Address : </h4>
                  </div>
                  <div class="col-md-6">
                    <h4 style="font-weight:normal">{{ App\Userprofile::where('user_id', Auth::id())->first()->current_address }}</h4>
                  </div>

                  <div class="col-md-4" style="border-right: 2px solid red;">
                    <h4 style="margin-bottom:3px">Phone Number : </h4>
                  </div>
                  <div class="col-md-6">
                    <h4 style="font-weight:normal">{{ App\Userprofile::where('user_id', Auth::id())->first()->phone_number }}</h4>
                  </div>

                  <div class="col-md-4" style="border-right: 2px solid red;">
                    <h4 style="margin-bottom:3px">Email : </h4>
                  </div>
                  <div class="col-md-6">
                    <h4 style="font-weight:normal">{{ Auth::user()->email }}</h4>
                  </div>

                  <div class="col-md-4" style="border-right: 2px solid red;">
                    <h4 style="margin-bottom:3px">About Me</h4>
                  </div>
                  <div class="col-md-6">
                    <h4 style="font-weight:normal">{{ App\Userprofile::where('user_id', Auth::id())->first()->about_you }}</h4>
                  </div>

                </div>

              </div>

            </div>
          @endif

        </div>
      </div>
    </div>
    @else
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6" style="border-right: 2px solid #51a599;">
              @if(session('message'))
                <div class="alert alert-success">
                  <strong>Good! </strong> {{ session('message') }}
                </div>
              @endif
              <div class="user_left">
                <h2>{{ Auth::user()->name }}</h2>
                <img src="{{ asset('uploads/user_profile_img/avata.png') }}" alt="">

                <div class="update_image_form" style="margin-left: 347px;width: 180px;">

                  @if (!App\Userprofile::where('user_id', Auth::id())->exists())
                    <form action="{{ url('upload/user/profile/image') }}"  method="post" enctype="multipart/form-data">
                      @csrf
                      <h3 style="float:right; margin-right: 8px; margin-top: -200px;">Upload Profile Photo</h3>
                      <input type="file" name="upload_profile_image" style="margin-top: -60px;position: absolute;margin-left: 3px;">
                      <button type="submit" class="btn btn-success btn-sm" style="margin-left: 100px;margin-top: -41px;position: unset;">Upload</button>
                    </form>
                  @endif

                </div>
              </div>
            </div>
            <div class="col-md-6" style="">
              <div class="user_right">
                <h2>Follow Me</h2>
                <div class="user_icon">
                  <ul class="list-unstyled text-center">
                    <li> <a href="" id="facebook"><i class="fab fa-facebook-f same_user_icon"  ></i></a> </li>
                    <li> <a href="" id="instagram"><i class="fab fa-instagram same_user_icon"></i></a> </li>
                    <li> <a href="" id="twitter"><i class="fab fa-twitter same_user_icon"></i></a> </li>
                    <li> <a href="" id="linkedin"><i class="fab fa-linkedin-in same_user_icon"></i></a> </li>
                    <li> <a href="" id="youtube"><i class="fab fa-youtube same_user_icon"></i></a> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="user_info_top">
              <h1 class="text-center" style="color: #2685ab;border-bottom: 1px solid #0fadb5;padding-bottom: 10px;"> My Profile Information </h1>
            </div>

            <div class="col-md-6" style="margin-left: 270px;">
              <div class="panel">
                <div class="panel-body">

                  <span style="color:red">Nothing to show your information!</span><span style="color:blue !important"> <a  class="btn btn-primary btn-sm" href="{{ url('add/user/profile') }}">Click Here </a> To add you profile</span>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
  @endif

@endsection
