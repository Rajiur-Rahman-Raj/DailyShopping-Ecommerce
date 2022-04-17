@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">

    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Delivery Charge Add View</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li class="active">Delivery Charge add view</li>
              </ol>
          </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Add Delivery Charge</h2>

          </div>
          <!-- success message -->
          @if(session('message'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('message') }}</strong>
             </div>
          @endif
          <div class="panel-body">
            <form action="{{ url('deliverycharge/insert') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Delivery Name <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('delivery_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your delivery name" name="delivery_name" value="{{ old('delivery_name') }}">
                @error('delivery_name')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"> Delivery Charge <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('delivery_charge') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your delivery charge " name="delivery_charge" value="{{ old('delivery_charge') }}">
                @error('delivery_charge')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">Add delivery charge</button>
            </form>
          </div>

        </div>
      </div>
      <div class="col-md-9">
        <div class="panel pannel-white">
          @if(session('delete_msg'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('delete_msg') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">
            <h2 class="panel-title">View Delivery Charge</h2>
          </div>

          <div class="panel-body">
            <table class="table table-bordered" id="example3">
             <thead>
               <tr>

                 <th scope="col"> Delivery Name </th>
                 <th scope="col"> Delivery Charge </th>
                 <th scope="col">Created at</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($all_deliveries as $key => $all_delivery)
                 <tr>
                   <td> {{ $all_delivery->delivery_name }}</td>
                   <td>{{ $all_delivery->delivery_charge }}</td>
                   <td>{{ $all_delivery->created_at->diffForHumans() }}</td>
                   <td>
                     <a href="{{ url('deliverycharge/delete') }}/{{ $all_delivery->id }}" class="btn btn-danger btn-sm" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="4"> No delivery charge are Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $all_deliveries->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
