@extends('layouts.backendmaster')
@section('all_product_active')
  active
@endsection
@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">All Customer Information List</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li class="active">Customer Information List</li>
              </ol>
          </div>
      </div>

      <div class="col-md-12">
        <div class="panel pannel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View Customer Information List</h2>
            @if(session('delete_message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Good! </strong> {{ session('delete_message') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
            @endif
          </div>
          <div class="panel-body">
            <table class="table table-bordered" id="example3">
             <thead>
               <tr>
                 {{-- <th scope="col">SL.</th> --}}
                 <th scope="col"> Order Id </th>
                 <th scope="col">Customer Name</th>
                 <th scope="col">Product Name</th>
                 <th scope="col">Product Unit Price</th>
                 <th scope="col">Product Quantity</th>
                 <th scope="col">Total Pay Amount</th>
                 <th scope="col">Payment Type</th>
                 <th scope="col">Payment Status</th>
                 <th scope="col">order date</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($customer_infos as $key => $customer_info)
                 <tr>
                   {{-- <td> {{ $customer_infos->firstItem()+$key }}</td> --}}
                   <td>#{{ $customer_info->id }}</td>
                   <td>{{ $customer_info->customer_name }}</td>
                   <td>{{ $customer_info->product_name }}</td>
                   <td>{{ $customer_info->product_unit_price }}</td>
                   <td>{{ $customer_info->product_quantity }}</td>
                   <td>{{ $customer_info->Total_amount }}</td>

                   <td>
                     @if ( App\Shipping::where('id', $customer_info->shipping_id)->first()->payment_type == 1)
                       <a class="btn btn-info btn-sm"> Cash </a>
                     @else
                       <a class="btn btn-primary btn-sm"> Card </a>

                     @endif

                   </td>
                   <td>
                     @if ( App\Shipping::where('id', $customer_info->shipping_id)->first()->payment_status == 1)
                       <a href="{{ url('payment/pending') }}/{{ $customer_info->id }}" class="btn btn-info btn-sm"> Pending </a>
                     @else
                       <a class="btn btn-primary btn-sm"> Clear </a>

                     @endif
                   </td>
                   <td>{{ $customer_info->created_at->format('Y-d-m') }}</td>
                   <td>

                     <a href="{{ url('customer/order/delete') }}/{{ $customer_info->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete product [{{ $customer_info->customer_name }}]')" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="10"> No Data Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $customer_infos->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
