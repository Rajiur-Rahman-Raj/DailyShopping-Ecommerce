@extends('layouts.backendmaster')

@section('backend_content')
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Our Website</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
        </ol>
        <div class="col-md-3">

          <div class="panel bg-dark" style="border-radius: 5px !important;">

            <div>
              <h2 style="border-bottom: 2px solid #000000;text-align: center;padding-bottom: 8px;">Your Total Order</h2>
            </div>
            <div class="panel-body text-center text-warning">
              <span style="font-size:20px">{{ $total_sales }}</span> <span>{{ ($total_sales <= 1 ?'order':'orders') }}</span>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel bg-dark" style="border-radius: 5px !important;">
            <div>
              <h2 style="border-bottom: 2px solid #000000;text-align: center;padding-bottom: 8px;">Order Date</h2>
            </div>
            <div class="panel-body text-center text-warning">
              @if (App\Shipping::where('user_id', Auth::id())->exists())
                <ul class="list-unstyled">
                  @foreach ($order_dates as $order_date)
                    <li style="margin-bottom:10px"><a href="#">{{ $order_date->created_at->format('d-M-Y || h:m:s:a') }}</a></li>
                    <a href="{{ url('customer/single/order/details') }}/{{ $order_date->id }}" class="btn btn-sm btn-primary" style="margin-bottom:7px">Order Details</a>
                  @endforeach
                </ul>
              @else
                <span>No order date here</span>
              @endif

            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel bg-dark" style="border-radius: 5px !important;">
            <div>
              <h2 style="border-bottom: 2px solid #000000;text-align: center;padding-bottom: 8px;">Your Payment Type</h2>
            </div>
            <div class="panel-body text-center text-warning">
              @if (App\Shipping::where('user_id', Auth::id())->exists())
                <ul class="list-unstyled">
                  @foreach ($payment_type as $payment)
                    <li style="margin-bottom:10px"><a href="#">{{ $order_date->created_at->format('d-M-Y || h:m:s:a') }}</a></li>
                    <a herf="" class="btn btn-sm btn-info" style="margin-bottom:7px">{{  (($payment->payment_type) == 1 ? 'Cash On Delivery' : (($payment->payment_type) == 2 ? 'credit card' : 'others'))  }}</a>
                  @endforeach
                </ul>
              @else
                <span>you do no purchase any product</span>
              @endif
          </div>
        </div>


      </div>

    </div>
  </div>
@endsection
