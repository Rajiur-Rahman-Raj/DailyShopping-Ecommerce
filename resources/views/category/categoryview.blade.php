@extends('layouts.backendmaster')
@section('all_product_active')
  active
@endsection
@section('backend_content')

  <div class="container">

    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Category & Sub Category Add View Page</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li class="active">Category Add view</li>
              </ol>
          </div>
      </div>
      <div class="col-md-6">
        @if(session('message'))
           <div class="alert alert-success alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>{{ session('message') }}</strong>
           </div>
        @endif
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Add Categories</h2>
            <!-- success message -->

          </div>
          <div class="panel-body">
            <form action="{{ url('category/insert') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name <span style="font-size:14px" class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Category Name" name="category_name" value="{{ old('category_name') }}">
                @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
          </div>

        </div>
      </div>

      <div class="col-md-6">
        @if(session('sub_category_message'))
           <div class="alert alert-success alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>{{ session('sub_category_message') }}</strong>
           </div>
        @endif
        <div class="panel panel-white">
          <div class="panel-heading clearfix">

            <h2 class="panel-title">Add Sub Categories</h2>
            <!-- success message -->


          </div>
          <div class="panel-body">
            <form action="{{ url('sub/category/insert') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Category <span style="font-size:14px" class="text-danger">*</span></label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" style="height:50px">
                  <option value="">Select-One</option>
                  @foreach ($all_categories as $all_category)
                    <option value="{{ $all_category->id }}">{{ $all_category->category_name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"> Sub Category Name <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sub_category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Sub Category Name" name="sub_category_name" value="{{ old('sub_category_name') }}">
                @error('sub_category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary"> Add Sub Category </button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

<hr style="border-bottom:2px solid #adadad">

  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="panel pannel-white">
          @if(session('delete_message'))
             <div class="alert alert-danger alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('delete_message') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View All Categories</h2>

          </div>
          <div class="panel-body">
            <table class="table table-bordered" >
             <thead>
               <tr>
                 {{-- <th scope="col">SL.</th> --}}
                 <th scope="col">Category Name </th>
                 {{-- <th scope="col">Created_at</th> --}}
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($categories as $key => $category)
                 <tr>
                   {{-- <td> {{ $categories->firstItem()+$key }}</td> --}}
                   <td>{{ $category->category_name }}</td>
                   {{-- <td>{{ $category->created_at->diffForHumans() }}</td> --}}
                   <td>
                     <a href="{{ url('category/edit') }}/{{ $category->id }}" class="btn btn-info btn-sm" style="font-size: 16px !important;"><i class="fa fa-edit"></i></a> |
                     <a href="{{ url('category/delete') }}/{{ $category->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete product [{{ $category->category_name }}]')" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="4"> No Data Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $categories->links() }}

          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="panel pannel-white">
          @if(session('sub_category_delete_message'))
             <div class="alert alert-danger alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('sub_category_delete_message') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View All Sub Categories</h2>
          </div>
          <div class="panel-body">
            <table class="table table-bordered" id="example3">
             <thead>
               <tr>
                 {{-- <th scope="col">SL.</th> --}}
                 <th scope="col">Category </th>
                 <th scope="col"> Sub Category </th>
                 <th scope="col">Created_at</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($all_sub_categories as $key => $all_sub_category)
                 <tr>
                   {{-- <td> {{ $categories->firstItem()+$key }}</td> --}}
                   {{-- <td>{{ App\Category::find($all_sub_category->category_id)->category_name }}</td> --}}
                   <td>{{ $all_sub_category->relationshiptocategory->category_name }}</td>
                   <td>{{ $all_sub_category->sub_category_name }}</td>
                   <td>{{ $all_sub_category->created_at->format('m-d-Y') }}</td>
                   <td>
                     <a href="{{ url('sub/category/edit') }}/{{ $all_sub_category->id }}" class="btn btn-info btn-sm" style="font-size: 16px !important;"><i class="fa fa-edit"></i></a> |
                     <a href="{{ url('sub/category/delete') }}/{{ $all_sub_category->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete product [{{ $all_sub_category->sub_category_name }}]')" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="4"> No Data Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $all_sub_categories->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
