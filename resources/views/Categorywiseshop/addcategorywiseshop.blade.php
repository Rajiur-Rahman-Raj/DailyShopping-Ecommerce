@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Category Wise Shop Add view</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li class="active">Add Category Wise Shop</li>
              </ol>
          </div>
      </div>
      {{-- <div class="col-md-3">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Add Banner Content</h2>

          </div>
          <!-- success message -->
          @if(session('message'))
            <div class="alert alert-success" role="alert">
              <strong>Good!</strong> {{ session('message') }}
            </div>
          @endif
          <div class="panel-body">
            <form action="{{ url('banner/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <input type="text" class="form-control @error('product_category') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your product category" name="product_category" value="{{ old('product_category') }}">
                @error('product_category')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"  name="description">
                  {{ old('description') }}
                </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Category Offer [optional]</label>
                <input type="text" class="form-control @error('category_offer') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your offer" name="category_offer" value="{{ old('category_offer') }}">
                @error('category_offer')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Category Image</label>
                <input type="file" class="form-control @error('category_img') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_img">
                @error('category_img')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Banner</button>
            </form>
          </div>

        </div>
      </div> --}}
      {{-- <div class="col-md-9">
        <div class="panel pannel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View Banner Content</h2>
          </div>
          @if(session('delete_msg'))
            <div class="alert alert-success" role="alert">
              <strong>Good!</strong> {{ session('delete_msg') }}
            </div>
          @endif
          <div class="panel-body">
            <table class="table table-bordered">
             <thead>
               <tr>
                 <th scope="col">Category name/title</th>
                 <th scope="col">Description</th>
                 <th scope="col">Category Offers</th>
                 <th scope="col">Category Image</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($banners as $banner)
                 <tr>
                   <td> {{ $banner->product_category }}</td>
                   <td>{{  $banner->description }}</td>
                   <td>{{  $banner->category_offer }}</td>
                   <td>
                     <img src="{{ asset('uploads/banner_img') }}/{{ $banner->category_img }}" alt="image not found" width="100" height="60">
                   </td>
                   <td>
                     <a href="{{ url('banner/update') }}/{{ $banner->id }}" class="btn btn-info btn-sm"> Update</a> ||
                     <a href="{{ url('banner/delete') }}/{{ $banner->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete category [{{ $banner->product_category }}]')"> Delete</a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="5"> No Banner are available </td>
                 </tr>
               @endforelse
             </tbody>
           </table>

          </div>
        </div>
      </div> --}}
    </div>
  </div>
@endsection
