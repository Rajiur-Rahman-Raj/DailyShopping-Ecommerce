@extends('layouts.backendmaster')
@section('all_product_active')
  active
@endsection
@section('backend_content')
  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Add Our Recent Event</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('view/events/list') }}">View All Events</a></li>
                <li>Add New Event</li>
              </ol>
          </div>
      </div>
      <div class="col-md-6" style="margin-left: 25%;">
        <div class="panel panel-white">
          @if(session('event_success_msg'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('event_success_msg') }}</strong>
             </div>
          @endif
          <div class="panel-heading clearfix">

            <h2 class="panel-title">Add Evennts</h2>
            <!-- <ul>
               @foreach($errors->all() as $error) // default error message
                <li>{{ $error }}</li>
               @endforeach
            </ul> -->

            <!-- success message -->


          </div>
          <div class="panel-body">
            <form action="{{ url('add/event/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Event Title <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('event_title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Event Title" name="event_title" value="{{ old('event_title') }}">
                @error('event_title')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Event Description <span style="font-size:14px" class="text-danger">*</span></label>
                  <textarea type="text" class="form-control @error('v') is-invalid @enderror" id="exampleInputPassword1" cols="3" name="event_description">
                    {{ old('event_description') }}
                  </textarea>
                @error('event_description')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>



              <div class="form-group">
                <label for="exampleInputPassword1">Author <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your Author" name="author" value="{{ old('author') }}">
                @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Event Date <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="exampleInputPassword1" name="event_date" value="{{ old('event_date') }}">
                @error('event_date')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Event Image <span style="font-size:14px" class="text-danger">[optional]</span></label>
                <input type="file" class="form-control @error('event_image') is-invalid @enderror" id="exampleInputPassword1" name="event_image">
                @error('event_image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Event</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
