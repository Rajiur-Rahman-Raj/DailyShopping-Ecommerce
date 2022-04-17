@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Update Banner</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li><a href="{{ url('banner/add/view') }}">Banner add view</a></li>
                  <li class="active">Banner update</li>
              </ol>
          </div>
      </div>
      <div class="col-md-6" style="margin-left: 25%;">
        <div class="panel panel-white">
          @if(session('edit_msg'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('edit_msg') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Add Banner Content</h2>

          </div>
          <div class="panel-body">
            <form action="{{ url('update/banner/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="banner_id" value="{{ $single_banner->id }}">
              <div class="form-group">
                <label for="exampleInputEmail1">Banner Title <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('banner_title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="banner_title" value="{{ $single_banner->banner_title }}">
                @error('banner_title')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Banner Image <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="file" class="form-control @error('banner_img') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="banner_img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                  @error('banner_img')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color:red">{{ $message }}</strong>
                      </span>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-danger">Preview</label>
                    <img id="blah" alt="your image" width="100" height="100" src="{{ asset('uploads/banner_img') }}/{{ $single_banner->banner_img }}" />
                  </div>

              </div>
              <button type="submit" class="btn btn-primary">Update Banner</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
