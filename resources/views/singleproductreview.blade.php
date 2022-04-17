@extends('layouts.backendmaster')

@section('backend_content')
  <div class="container">
    @if (App\Customerreview::where('billing_id', $billing_id)->exists())
      <div class="row">
        <div class="col-md-6" style="margin-left: 22%;margin-top: 32px;
">
          <div class="alert alert-success text-danger">
            <strong style="color:green !important">Your review added successfully! </strong> <strong> And you Provided your review once!</strong>
          </div>
          <a href="{{ url('customer/total/order/list') }}" style="margin-left:36%;" class="btn btn-info btn-sm"> Back To Order list </a>
        </div>
      </div>

    @else
      <div class="row">
        <div class="col-md-6" style="margin-left:24%">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('customer/total/order/list') }}">order list</a></li>
            <li class="breadcrumb-item active" aria-current="page">Review Product</li>
          </ol>
          <div class="pannel">
            <h2 style="text-align: center;border: 2px solid #b3b3b3;padding: 8px 0px 7px 0px;">Add Your Review</h2>
            <div class="pannel-body">
              <form action="{{ url('single/product/review/insert') }}" method="post">
                @csrf
                <input type="hidden" name="billing_id" value="{{ $billing_id }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Your Comments</label>
                  <textarea name="customer_comments" rows="8" cols="80" class="form-control @error('last_name') is-invalid @enderror"></textarea>
                  @error('comment')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rating</label>
                  <div class="slidecontainer">
                    <input type="range" min="1" max="5" step="1" name="customer_rating">
                     <span style="margin-left: -4;">1<i class="fas fa-star same_star"></i></span><span style="margin-left: 111px;">2<i class="fas fa-star same_star"></i></span><span style="margin-left: 105px;">
                      3<i class="fas fa-star same_star"></i>
                    </span><span style="margin-left: 112px;">4<i class="fas fa-star same_star"></i></span><span style="margin-left: 109px;">5<i class="fas fa-star same_star"></i></span>
                  </div>
                  @error('rating')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                  <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success" style="margin-top: 35px;margin-left: 40%;"> Add Review </button>
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    @endif

  </div>
@endsection
