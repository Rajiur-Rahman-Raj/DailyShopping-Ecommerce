@extends('layouts.backendmaster')
@section('all_product_active')
  active
@endsection
@section('backend_content')

  <div class="container">
    <div class="row">
      <div class="page-title">
          <h3 class="breadcrumb-header">Product view list</h3>
          <div class="page-breadcrumb">
              <ol class="breadcrumb breadcrumb-with-header">
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('product/add/view') }}">Add New Product</a></li>
                <li>Product view list</li>
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
             <h2 class="panel-title">View All Product List</h2>



           </div>
           <div class="panel-body">
             <table class="table table-bordered" id="example3" style="border-bottom: 0px !important">
              <thead>
                <tr>
                  {{-- <th scope="col">SL.</th> --}}
                  <th scope="col">Category</th>
                  <th scope="col">Subcategory</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price </th>
                  <th scope="col">Description </th>
                  <th scope="col">quantity </th>
                  <th scope="col">Alert Q</th>
                  <th scope="col">img</th>
                  <th scope="col">Created_at</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($products as $key => $product)
                  <tr>
                    {{-- <td> {{ $products->firstItem()+$key }}</td> --}}
                    <td>{{ App\Category::find($product->category_id)->category_name }}</td>

                    {{-- <td>{{ $product->relationtocategory->category_name }}</td> --}}

                    <td>{{ App\Subcategory::find($product->subcategory_id)->sub_category_name }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>
                      <textarea name="name" rows="4" cols="20">
                        {{ $product->product_description }}
                      </textarea>
                    </td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>{{ $product->alert_quantity }}</td>
                    <td>
                      <img src="{{ asset('uploads/product_img') }}/{{ $product->product_image }}" alt="image not found" width="100" height="60">
                    </td>
                    <td>{{ $product->created_at->diffForHumans() }}</td>
                    <td>
                      <a href="{{ url('product/edit') }}/{{ $product->id }}" class="btn btn-primary btn-sm" style="font-size: 16px !important; display:block; margin-bottom: 5px;"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('product/delete') }}/{{ $product->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete product [{{ $product->product_name }}]')" style="font-size: 16px !important; display:block"> <i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @empty
                  <tr class="text-center text-danger">
                    <td colspan="10">No Data Available</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            {{ $products->links() }}

           </div>
        </div>

        <div class="panel panel-white">
           <div class="panel-heading clearfix">
             <h2 class="panel-title">View Deleted Products</h2>
             @if(session('restore_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Good! </strong> {{ session('restore_msg') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             @endif

             @if(session('par_delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Good! </strong> {{ session('par_delete') }}
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
                  <th scope="col">SL.</th>
                  <th scope="col">P. Name </th>
                  <th scope="col">P. Price </th>
                  <th scope="col">P. Description </th>
                  <th scope="col">P. quantity </th>
                  <th scope="col">Alert Q</th>
                  <th scope="col">P. img</th>
                  <th scope="col">created_at</th>
                  <th scope="col">deleted_at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($deleted_products as $key => $deleted_product)
                  <tr>
                    <td> {{ $loop->index+1 }}</td>
                    <td>{{ $deleted_product->product_name }}</td>
                    <td>{{ $deleted_product->product_price }}</td>
                    <td>
                      <textarea name="name" rows="4" cols="20">
                      {{ $deleted_product->product_description }}
                      </textarea>
                    </td>
                    <td>{{ $deleted_product->product_quantity }}</td>
                    <td>{{ $deleted_product->alert_quantity }}</td>
                    <td>
                      <img src="{{ asset('uploads/product_img') }}/{{ $deleted_product->product_image }}" alt="image not found" width="100">
                    </td>
                    <td>{{ $deleted_product->created_at->diffForHumans() }}</td>
                    <td>{{ $deleted_product->deleted_at->diffForHumans() }}</td>
                    <td>
                      <a href="{{ url('product/delete/restore') }}/{{ $deleted_product->id }}" class="btn btn-sm btn-info text-white" style="font-size: 16px !important; margin-bottom: 5px;"><i class="fa fa-recycle"></i></a>
                      <a href="{{ url('product/delete/parmanet/delete')}}/{{ $deleted_product->id }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('are you sure parmanently delete product [{{ $deleted_product->product_name }}]')" style="font-size: 16px !important;"> <i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @empty
                  <tr class="text-center text-danger">
                    <td colspan="10">No Data Available</td>
                  </tr>
                @endforelse
              </tbody>
            </table>

           </div>
        </div>
      </div>

    </div>
  </div>

{{-- separate part --}}



@endsection
