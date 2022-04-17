@extends('layouts.frontendmaster')

@section('frontend_content')

		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ asset('frontend_assets/images/cover-img-1.jpg') }});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Products</h1>
				   					<h2 class="bread"><span><a href="{{ url('/') }}">Home</a></span> <span> Search Products </span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row row-pb-lg">
                @forelse ($products as $key => $product)
  								<div class="col-md-4 text-center">
  								<div class="product-entry">
  									<div class="product-img" style="background-image: url({{ asset('uploads/product_img') }}/{{ $product->product_image }});">
  										<p class="tag"><span class="new">New</span></p>
  										<div class="cart">
  											<p>
  												<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
  												<span><a href="{{ url('product/details') }}/{{ $product->id }}"><i class="icon-eye"></i></a></span>
  												<span><a href="#"><i class="icon-heart3"></i></a></span>
  												<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
  											</p>
  										</div>
  									</div>
  									<div class="desc">
  										<h3><a href="{{ url('product/details') }}/{{ $product->id }}">{{ $product->product_name }}</a></h3>
  										<p class="price"><span>৳ {{ $product->product_price }}</span></p>
  									</div>
  								</div>
  							</div>
							@empty
								{{-- <h4 style="text-align:center"> <span style="color:black">Searching <span style="color:red"> "Not Found" </span>  </span> <a href="{{ url('/') }}" style="text-decoration:underline; color:blue">go back to home</a>  </h4> --}}
								<div class="col-md-12 offset-6" style="margin-left:270px;">
									<h3 style="color:black"> No Searching Result </h3>
									<p style="margin-top: 10px;font-size: 16px;color: #757575;line-height: 24px;">We're sorry. We cannot find any matches for your search term.</p>
									<p><i class="fa fa-search" style="font-size: 120px; color: #757575;"></i></p>
									<p style="margin-top:40px; font-size:24px;"><a href="{{ url('/') }}" style="color:blue;text-decoration:underline;"> go back to home</a> </p>
								</div>
							@endforelse

						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">

									{{ $products->links() }}

								</ul>
							</div>
						</div>
					</div>

          {{-- <div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categories</h2>
								<div class="fancy-collapse-panel">
			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

													@php
														$categories = App\Category::all();
													@endphp
													@foreach ($categories as $category)
														<div class="pane l panel-default">
 			                         <div class="panel-heading" role="tab" id="headingTwo">
 			                             <h4 class="panel-title">
 			                                 <a class="collapsed" style="text-transform: capitalize;"  data-parent="#accordion" href="{{ url('category/wise/products') }}/{{ $category->id }}" aria-expanded="false" aria-controls="collapseTwo">{{ $category->category_name }}
 			                                 </a>
 			                             </h4>
 			                         </div>

 			                     </div>
													@endforeach
			                  </div>
			               </div>
							</div>
						</div>
					</div> --}}

				</div>
			</div>
		</div>


@endsection
