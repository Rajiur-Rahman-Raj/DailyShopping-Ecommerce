@extends('layouts.backendmaster')

@section('backend_content')
  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Edit Products</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                  <li><a href="{{ url('home') }}">Home</a></li>
                  <li><a href="{{ url('product/viewlist') }}">Product List</a></li>
                  <li class="active"> edit Product {{ $single_products->product_name }}</li>
              </ol>
          </div>
      </div>
      <div class="col-md-6" style="margin-left: 25%;">

        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h2 class="panel-title">Edit/Update Product</h2>

          </div>
          <!-- success message -->
          @if(session('edit_msg'))
             <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ session('edit_msg') }}</strong>
            </div>
          @endif

          <div class="panel-body">
            <form action="{{ url('product/edit/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product_id" value="{{ $single_products->id }}">

              <div class="form-group">
                <label for="exampleInputEmail1">Ctegory<span style="font-size:14px" class="text-danger">*</span></label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" style="height:50px" id="category">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ ($single_products->category_id == $category->id)?'selected':'' }}>{{ $category->category_name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              {{-- <div class="form-group">
                <label for="exampleInputEmail1">Sub Category<span style="font-size:14px" class="text-danger">*</span></label>
                <select class="form-control @error('sub_category_name') is-invalid @enderror" name="sub_category_name" style="height:50px">
                  @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ ($single_products->subcategory_id == $subcategory->id)?'selected':'' }}>{{ $subcategory->sub_category_name }}</option>
                  @endforeach
                </select>
                @error('sub_category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div> --}}

              <div class="form-group">
                <label for="exampleInputEmail1">Sub Category <span style="font-size:14px" class="text-danger">*</span></label>
                <select id="subcategory" name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" style="height:50px">
                    <option value="{{ $sub_category_id }}">{{$sub_category_name}}</option>
                </select>
                @error('subcategory_id')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Product Name <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_products->product_name }}" name="product_name">
                @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Price</label>
                <input type="text" class="form-control @error('product_price') is-invalid @enderror" id="exampleInputPassword1" value="{{ $single_products->product_price }}" name="product_price">
                @error('product_price')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Description <span style="font-size:14px" class="text-danger">[optional]</span></label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" cols="3" name="product_description">
                  {{ $single_products->product_description }}
                </textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Quantity <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('product_quantity') is-invalid @enderror" id="exampleInputPassword1" value="{{ $single_products->product_quantity }}" name="product_quantity">
                @error('product_quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Alert Quantity <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="text" class="form-control @error('alert_quantity') is-invalid @enderror" id="exampleInputPassword1" value="{{ $single_products->alert_quantity }}" name="alert_quantity">
                @error('alert_quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Image <span style="font-size:14px" class="text-danger">*</span></label>
                <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="exampleInputPassword1" name="product_image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                  @error('product_image')
                      <span class="invalid-feedback" role="alert">
                          <strong class="text-danger">{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-danger">Preview</label>
                <img id="blah" alt="your image" width="100" height="100" src="{{ asset('uploads/product_img') }}/{{ $single_products->product_image }}" />
              </div>
              <button type="submit" class="btn btn-primary">Edit Products</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('custom_js')
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
