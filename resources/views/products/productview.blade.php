@extends('layouts.backendmaster')
@section('all_product_active')
  active
@endsection
@section('backend_content')
  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Product Add</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('product/viewlist') }}">View Product List</a></li>
              </ol>
          </div>
      </div>
      <div class="col-md-6" style="margin-left: 25%;">
        <div class="panel panel-white">
          @if(session('message'))
             <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>{{ session('message') }}</strong>
             </div>
           @endif
          <div class="panel-heading clearfix">

            <h2 class="panel-title">Add Products</h2>
            {{-- <!-- <ul>
               @foreach($errors->all() as $error) // default error message
                <li>{{ $error }}</li>
               @endforeach
            </ul> --> --}}

          </div>
          <div class="panel-body">
            <form action="{{ url('product/insert') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name <span style="font-size:14px" class="text-danger">*</span></label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" style="height:50px" id="category">
                  <option value="">--Select One--</option>
                  @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Sub Category <span style="font-size:14px" class="text-danger">*</span></label>
                <select id="subcategory" name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" style="height:50px">
                    <option>Select Sub-Category</option>
                </select>
                @error('subcategory_id')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Product Name <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Product Name" name="product_name" value="{{ old('product_name') }}">
                @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Price <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('product_price') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your Product Price" name="product_price" value="{{ old('product_price') }}">
                @error('product_price')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Description <span style="font-size:14px" class="text-danger">[optional]</span></label>
                <textarea type="text" class="form-control @error('product_description') is-invalid @enderror" id="exampleInputPassword1" cols="3" name="product_description">
                  {{ old('product_description') }}
                </textarea>
                @error('product_description')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Quantity <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('product_quantity') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your Product Quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                @error('product_quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Alert Quantity <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('alert_quantity') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your Product Alert Qantity" name="alert_quantity" value="{{ old('alert_quantity') }}">
                @error('alert_quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Image <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="exampleInputPassword1" name="product_image">
                @error('product_image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Products</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('custom_js')
  {{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
  <script>
      $('textarea').ckeditor();
      // $('.textarea').ckeditor(); // if class is prefered.
  </script> --}}

<script>
$(document).ready(function() {
    $('#category').on('change', function() {
    var category = $(this).val();
        if(category) {
        $.ajax({
            url: '/findsubWithcatId/'+category,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                // console.log(data);
                if(data){
                $('#subcategory').empty();
                $('#subcategory').focus;
                $('#subcategory').append('<option value="">-- Select Name --</option>');
                $.each(data, function(key, value){
                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_category_name+ '</option>');
            });
            }else{
            $('#subcategory').empty();
            }
            }
        });
        }else{
        $('#subcategory').empty();
        }
    });
    });
</script>
@endsection
