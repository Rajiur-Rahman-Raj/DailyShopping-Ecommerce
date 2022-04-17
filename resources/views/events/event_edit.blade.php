@extends('layouts.backendmaster')

@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Edit Events</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li><a href="{{ url('view/events/list') }}">Event view list</a></li>
                  <li class="active"> edit event</li>
              </ol>
          </div>
      </div>
      <div class="col-md-6" style="margin-left: 25%;">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Edit/Update Events</h2>

          </div>
          <!-- success message -->
          @if(session('edit_msg'))
             <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ session('edit_msg') }}</strong>
            </div>
          @endif

          <div class="panel-body">
            <form action="{{ url('edit/event/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="event_id" value="{{ $single_events->id }}">

              <div class="form-group">
                <label for="exampleInputEmail1">Event Title <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('event_title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_events->event_title }}" name="event_title">
                @error('event_title')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Event Description <span style="font-size:14px" class="text-danger">*</span></label>
                <textarea type="text" class="form-control @error('event_description') is-invalid @enderror" id="exampleInputPassword1" cols="3" name="event_description">
                  {{ $single_events->event_description }}
                </textarea>
                @error('event_description')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Author <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="exampleInputPassword1" value="{{ $single_events->author }}" name="author">
                @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Event Date <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('event_date') is-invalid @enderror" id="exampleInputPassword1" value="{{ $single_events->event_date }}" name="event_date">
                @error('event_date')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Event Image <span style="font-size:14px" class="text-danger">[optional]</span></label>
                <input type="file" class="form-control @error('event_image') is-invalid @enderror" id="exampleInputPassword1" name="event_image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                @error('event_image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-danger">Preview</label>
                <img id="blah" alt="your image" width="100" height="100" src="{{ asset('uploads/event_img') }}/{{ $single_events->event_image }}" />
              </div>
              <button type="submit" class="btn btn-primary">Edit Event</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
