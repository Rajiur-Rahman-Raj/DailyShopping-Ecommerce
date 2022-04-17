@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">

    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Coupon Add View Page</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li class="active">Coupon add view</li>
              </ol>
          </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Add Coupon</h2>

          </div>
          <!-- success message -->
          @if(session('message'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('message') }}</strong>
             </div>
          @endif
          <div class="panel-body">
            <form action="{{ url('coupon/insert') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Coupon Code <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('coupon_conde') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Coupon Code" name="coupon_code" value="{{ old('coupon_code') }}">
                @error('coupon_code')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Coupon Discount <span style="font-size:14px" class="text-danger">*[must be a numeric value]</span></label>
                <input type="text" class="form-control @error('coupon_discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Coupon discount" name="coupon_discount" value="{{ old('coupon_discount') }}">
                @error('coupon_discount')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Validity Date <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="date" class="form-control @error('valid_date') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="validity date for this coupon" name="valid_date" value="{{ old('valid_date') }}">
                @error('valid_date')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Coupon</button>
            </form>
          </div>

        </div>
      </div>
      <div class="col-md-9">
        <div class="panel pannel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View All Coupons</h2>
          </div>
          @if(session('delete_msg'))
             <div class="alert alert-danger alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('delete_msg') }}</strong>
             </div>
          @endif
          <div class="panel-body">

            <table class="table table-bordered" id="example3">
             <thead>
               <tr>
                 <th scope="col">Coupon Code </th>
                 <th scope="col">Discount</th>
                 <th scope="col">Valid Date</th>
                 <th scope="col">Created At</th>
                 <th scope="col">Coupon Status</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($coupons as $key => $coupon)
                 <tr>
                   <td> {{ $coupon->coupon_code }}</td>
                   <td>{{ $coupon->coupon_discount }}</td>
                   <td>{{ $coupon->valid_date }}</td>
                   <td>{{ $coupon->created_at->diffForHumans() }}</td>
                   <td>
                     @if (Carbon\Carbon::now()->format('Y-m-d') <= $coupon->valid_date)
                       <strong class="text-success"> Valid Coupon</strong>
                     @else
                       <strong class="text-danger">Expired Coupon</strong>
                     @endif
                   </td>
                   <td>
                     <a href="{{ url('coupon/delete') }}/{{ $coupon->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete product [{{ $coupon->coupon_code }}]')" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="10">No Coupon Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $coupons->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
