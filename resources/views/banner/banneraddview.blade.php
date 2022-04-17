@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Banner Add view</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li class="active">Banner add view</li>
              </ol>
          </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Add Banner Content</h2>

          </div>
          <!-- success message -->
          @if(session('message'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('message') }}</strong>
             </div>
          @endif
          <div class="panel-body">
            <form action="{{ url('banner/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Banner Title <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('banner_title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your banner title" name="banner_title" value="{{ old('banner_title') }}">
                @error('banner_title')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"> Banner Image <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="file" class="form-control @error('banner_img') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="banner_img">
                @error('banner_img')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Banner</button>
            </form>
          </div>

        </div>
      </div>
      <div class="col-md-9">
        <div class="panel pannel-white">
          @if(session('delete_msg'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('delete_msg') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View Banner Content</h2>
          </div>
          <div class="panel-body">
            <table class="table table-bordered" id="example3">
             <thead>
               <tr>
                 <th scope="col">Serial</th>
                 <th scope="col">Banner Title</th>
                 <th scope="col">BannerImage</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($banners as $key => $banner)
                 <tr>
                   <td> {{ $banners->firstItem()+$key }}</td>
                   <td> {{ $banner->banner_title }}</td>
                   <td>
                     <img src="{{ asset('uploads/banner_img') }}/{{ $banner->banner_img }}" alt="image not found" width="100" height="60">
                   </td>
                   <td>
                     <a href="{{ url('banner/update') }}/{{ $banner->id }}" class="btn btn-info btn-sm" style="font-size: 16px !important;"><i class="fa fa-edit"></i></a> ||
                     <a href="{{ url('banner/delete') }}/{{ $banner->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete category [{{ $banner->banner_title }}]')"style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="5"> No Banner are available </td>
                 </tr>
               @endforelse
             </tbody>
           </table>

           {{ $banners->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
