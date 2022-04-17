@extends('layouts.backendmaster')

@section('backend_content')
  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Update Sub Categories</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li><a href="{{ url('category/add/view') }}">Category List</a></li>
                  <li class="active">Edit Sub-Category {{ $single_sub_category_info->sub_category_name }}</li>
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
            <h2 class="panel-title">Edit Sub Category</h2>

          </div>
          <div class="panel-body">
            <form action="{{ url('sub/category/edit/insert') }}" method="post">
              @csrf
              <input type="hidden" name="sub_category_id" value="{{ $single_sub_category_info->id }}">
              <div class="form-group">
                <label for="exampleInputEmail1">Category <span style="font-size:14px" class="text-danger">*</span></label>
                <select class="form-control @error('category_name') is-invalid @enderror" name="category_name" style="height:50px">
                  @foreach ($all_categories as $all_category)
                    <option value="{{ $all_category->id }}" {{ ($single_sub_category_info->category_id == $all_category->id)?'selected':'' }}>{{ $all_category->category_name }}</option>
                  @endforeach

                </select>
                @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Sub Category Name <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sub_category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_sub_category_info->sub_category_name }}" name="sub_category_name">
                @error('sub_category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Update sub-Category</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
