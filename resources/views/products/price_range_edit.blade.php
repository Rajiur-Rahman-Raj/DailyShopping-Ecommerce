@extends('layouts.backendmaster')

@section('backend_content')
  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Update Price Range</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li><a href="{{ url('products/price/range') }}">Price Range List</a></li>
                  <li class="active">Edit Price Range</li>
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
            <h2 class="panel-title">Edit Price Range</h2>
          </div>
          <div class="panel-body">
            <form action="{{ url('price/range/edit/insert') }}" method="post">
              @csrf
              <input type="hidden" name="price_range_id" value="{{ $single_price_range_info->id }}">
              <div class="form-group">
                <label for="exampleInputEmail1">Price Range [From] <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="number" class="form-control @error('price_from') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_price_range_info->price_from }}" name="price_from">
                @error('price_from')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Price Range [To] <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="number" class="form-control @error('price_to') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_price_range_info->price_to }}" name="price_to">
                @error('price_to')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Update Price Range</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
