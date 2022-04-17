@extends('layouts.backendmaster')

@section('backend_content')
  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Update Category</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li><a href="{{ url('category/add/view') }}">Category List</a></li>
                  <li class="active">Edit Category {{ $single_category_info->category_name }}</li>
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
            <h2 class="panel-title">Edit Category</h2>

          </div>
          <div class="panel-body">
            <form action="{{ url('category/edit/insert') }}" method="post">
              @csrf
              <input type="hidden" name="category_id" value="{{ $single_category_info->id }}">
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_category_info->category_name }}" name="category_name">
                @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
