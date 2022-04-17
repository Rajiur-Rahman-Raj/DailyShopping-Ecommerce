@extends('layouts.backendmaster')
@section('all_product_active')
  active
@endsection
@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Events view list</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('recent/events') }}">Add New Event</a></li>
                <li>Event view list</li>
              </ol>
          </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-white">
          @if(session('delete_message'))
             <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ session('delete_message') }}</strong>
            </div>

          @endif
           <div class="panel-heading clearfix">
             <h2 class="panel-title">View All Event List</h2>



           </div>
           <div class="panel-body">
             <table class="table table-bordered" id="example3">
              <thead>
                <tr>
                  <th scope="col">SL.</th>
                  <th scope="col">Event Title</th>
                  <th scope="col">Event Description</th>
                  <th scope="col">Event Author </th>
                  <th scope="col">Event Date</th>
                  <th scope="col">Event Image</th>
                  <th scope="col">Created_at</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($all_events as $key => $all_event)
                  <tr>
                    <td> {{ $all_events->firstItem()+$key }}</td>
                    {{-- <td>{{ App\Category::find($product->category_id)->category_name }}</td> --}}

                    {{-- <td>{{ $product->relationtocategory->category_name }}</td> --}}
                    <td>{{ $all_event->event_title }}</td>
                    <td>
                      <textarea name="name" rows="4" cols="20">
                        {{ $all_event->event_description }}
                      </textarea>
                    </td>
                    <td>{{ $all_event->author }}</td>
                    <td>{{ $all_event->event_date }}</td>
                    <td>
                      <img src="{{ asset('uploads/event_img') }}/{{ $all_event->event_image }}" alt="image not found" width="100" height="60">
                    </td>
                    <td>{{ $all_event->created_at->diffForHumans() }}</td>
                    <td>
                      <a href="{{ url('event/edit') }}/{{ $all_event->id }}" class="btn btn-success btn-sm" style="font-size: 16px !important;"><i class="fa fa-edit"></i></a> |
                      <a href="{{ url('event/delete') }}/{{ $all_event->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete Event [{{ $all_event->event_title }}]')" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @empty
                  <tr class="text-center text-danger">
                    <td colspan="10">No Data Available</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            {{ $all_events->links() }}

           </div>
        </div>
      </div>

    </div>
  </div>


@endsection
