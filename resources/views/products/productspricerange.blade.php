@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">

    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Price Range Add View Page</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li class="active">Price Range add view</li>
              </ol>
          </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-white">
          @if(session('message'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('message') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Add Price Range</h2>

          </div>

          <div class="panel-body">
            <form action="{{ url('product/price/range/insert') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Price Range [From] <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="number" class="form-control @error('price_from') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your price range" name="price_from" value="{{ old('price_from') }}">
                @error('price_from')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Price Range [To] <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="number" class="form-control @error('price_to') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your price range" name="price_to" value="{{ old('price_to') }}">
                @error('price_to')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Range</button>
            </form>
          </div>

        </div>
      </div>
      <div class="col-md-9">
        <div class="panel pannel-white">
          @if(session('delete_msg'))
             <div class="alert alert-danger alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('delete_msg') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View All Price Range</h2>
          </div>
          <div class="panel-body">

            <table class="table table-bordered" id="example3">
             <thead>
               <tr>
                 <th scope="col">Serial Number</th>
                 <th scope="col">Price Range</th>
                 <th scope="col">Price To</th>
                 <th scope="col">Created At</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($all_price_ranges as $key => $all_price_range)
                 <tr>
                   <td> {{ $all_price_ranges->firstItem()+$key }}</td>
                   <td> {{ $all_price_range->price_from }}</td>
                   <td> {{ $all_price_range->price_to }}</td>
                   <td>{{ $all_price_range->created_at->diffForHumans() }}</td>
                   <td>
                     <a href="{{ url('price/range/edit') }}/{{ $all_price_range->id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                     <a href="{{ url('price/range/delete') }}/{{ $all_price_range->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete price range [{{ $all_price_range->price_from }}]')"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="10">No Price Range Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $all_price_ranges->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
