@extends('layouts.backendmaster')

@section('backend_content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center" style="margin-bottom:15px">Customer Name : {{ $customer_name->customer_name }}</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('customer/total/order/list') }}">Order List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
          </ol>
        </nav>
        <table class="table table-bordered bg-dark" id="example3">
        <thead>
          <tr>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Quantity</th>
          <th>purchase Date</th>
          <th>Review Products</th>
          </tr>
        </thead>
        <tfoot>
          <tr class="bg-info">
            <td colspan="2" class="text-center">Total Amount</td>
              <td colspan="3" class="text-center">= ${{ App\Sale::where('id',$sale_id)->first()->grand_total }}</td>
          </tr>

        </tfoot>
        @foreach ($billing_details as $billing_detail)
          <tr>
            <td>{{ $billing_detail->product_name }}</td>
            <td>৳ {{ $billing_detail->product_unit_price }}</td>
            <td>{{ $billing_detail->product_quantity }}</td>
            <td>{{ $billing_detail->created_at->diffForHumans() }}</td>
            <td>
              @if (App\Customerreview::where('billing_id', $billing_detail->id)->exists())
                <a href="" class="btn btn-sm btn-success">Your Review Done</a>

              @else
                @if (App\Shipping::find($billing_detail->shipping_id)->payment_status == 2)
                  <a href="{{ url('single/product/review') }}/{{ $billing_detail->id }}" class="btn btn-sm btn-primary">Product Review</a>
                @else
                  <span>( Pay your payment first.<br> Then you can review this product! )</span>
                @endif

              @endif
            </td>
          </tr>
        @endforeach


        {{-- @if (App\Sale::where('user_id', Auth::id())->exists())
        <tbody>
          @foreach ($all_orders as $all_order)
            <tr>
              <td>#{{ $all_order->shipping_id }}</td>
              <td>{{ $all_order->id }}</td>
              <td>${{ $all_order->grand_total }}</td>
              <td>{{ $all_order->created_at->format('d-M-Y || h:m:s:a') }}</td>
              @php
                $payment_type = App\Shipping::find($all_order->shipping_id)->payment_type;
              @endphp
              <td>{{  (($payment_type) == 1 ? 'Cash On Delivery' : (($payment_type) == 2 ? 'credit card' : 'others'))  }}</td>
              <td>
                @if ($payment_type == 2)
                  <a href="#" class="btn btn-sm btn-success">payment Successfull</a>

                @elseif ($payment_type == 1)
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
        @endif --}}
        </table>
      </div>
    </div>
  </div>
@endsection
