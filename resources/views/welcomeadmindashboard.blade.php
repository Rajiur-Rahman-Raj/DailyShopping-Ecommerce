@extends('layouts.backendmaster')
@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

          <div class="pannel" style="text-align: center;margin-top: 5%;">
            <div class="alert alert-success text-danger">
              <h4>Wlecome {{ Auth::user()->name }} This is Your Dashboard</h4>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
