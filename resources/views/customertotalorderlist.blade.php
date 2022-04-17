@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">order list</li>
      </ol>
      <div class="col-md-12">

        <table class="table table-bordered bg-dark" id="example3">
        <thead>
          <tr>
          <th>purchase Id</th>
          <th>Total purchase Amount</th>
          <th>purchase Date</th>
          <th>payment type</th>
          <th>payment status</th>
          <th>Action</th>
          </tr>
        </thead>
        @if (App\Sale::where('user_id', Auth::id())->exists())
        <tbody>
          @foreach ($all_orders as $all_order)
            <tr>
              <td>#{{ $all_order->shipping_id }}</td>
              <td>${{ $all_order->grand_total }}</td>
              <td>{{ $all_order->created_at->format('d-M-Y || h:m:s:a') }}</td>
              @php
                $payment_type = App\Shipping::find($all_order->shipping_id)->payment_type;
                $payment_status = App\Shipping::find($all_order->shipping_id)->payment_status;
              @endphp
              <td>{{  (($payment_type) == 1 ? 'Cash On Delivery' : (($payment_type) == 2 ? 'credit card' : 'others'))  }}</td>
              <td>
                @if ($payment_status == 2)
                  <a href="#" class="btn btn-sm btn-success">payment Successfull</a>

                @elseif ($payment_status == 1)
                <a href="#" class="btn btn-sm btn-danger">pending</a>
              @endif
              </td>
              <td>
                <a href="{{ url('customer/single/order/details') }}/{{ $all_order->id }}" type="button" class="btn btn-sm btn-primary">View Details</a>
              </td>
            </tr>
          @endforeach
        </tbody>
        @else
          <tbody>
            <td colspan="7" class="text-center text-danger">you do not purchase any product </td>
          </tbody>
        @endif
        </table>
      </div>
      <a href="{{ url('user/dashboard') }}" class="btn btn-sm btn-info" style="margin-left: 45%;">Back To Home</a>
    </div>
  </div>
@endsection
