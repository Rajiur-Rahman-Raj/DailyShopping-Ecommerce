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
				   					<h2 class="bread"><span><a href="{{ url('/') }}">Home</a></span> <span>Shop</span></h2>
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
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">

							@forelse ($products as $product)
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
										<p class="price"><span>${{ $product->product_price }}</span></p>
									</div>
								</div>
							</div>
						@empty
							<div class="col-md-12 offset-6" style="margin-left:270px; margin-top:50px">
								<h3 style="color:black"> No Searching Result </h3>
								<p style="margin-top: 10px;font-size: 16px;color: #757575;line-height: 24px;">We're sorry. We cannot find any matches for your search term.</p>
								<p><i class="fa fa-search" style="font-size: 120px; color: #757575;"></i></p>
								<p style="margin-top:40px; font-size:24px;">Back to <a href="{{ url('category/wise/shop') }}" style="color:blue;text-decoration:underline;"> Shop Page</a> </p>
							</div>
						@endforelse


							@if ($category_id == null && $subcategory_id == null)
                @foreach ($all_products as $product)
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
											<p class="price"><span>${{ $product->product_price }}</span></p>
										</div>
									</div>
								</div>

								@endforeach
							@endif

						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									{{-- <li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">&raquo;</a></li> --}}
									{{ $products->links() }}
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categories</h2>
								<div class="fancy-collapse-panel">
			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

													{{-- @php
														$categories = App\Category::all();
													@endphp
													@foreach ($categories as $category)
														<div class="pane l panel-default">
 			                         <div class="panel-heading" role="tab" id="headingTwo">
 			                             <h4 class="panel-title">
 			                                 <a class="collapsed"  data-parent="#accordion" href="{{ url('category/wise/products') }}/{{ $category->id }}" aria-expanded="false" aria-controls="collapseTwo">{{ $category->category_name }}
 			                                 </a>
 			                             </h4>
 			                         </div>
 			                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
 			                             <div class="panel-body">
 			                                <ul>
 			                                 	<li><a href="#">Jeans</a></li>
 			                                 	<li><a href="#">T-Shirt</a></li>
 			                                 	<li><a href="#">Jacket</a></li>
 			                                 	<li><a href="#">Shoes</a></li>
 			                                 </ul>
 			                             </div>
 			                         </div>
 			                     </div>
													@endforeach --}}


											@foreach ($categories as $category)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$category->id}}" aria-expanded="true" aria-controls="collapseOne">{{$category->category_name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne{{$category->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    @php
																		// $subcategories = DB::table('sub_categories')->where('category_id',$category->id)->get();
																			 $subcategories = App\Subcategory::where('category_id', $category->id)->get();
																		@endphp

                                    @foreach ($subcategories as $subcategory)
                                    <ul>
                                        <li><a href="{{url('category/wise/products')}}/{{$category->id}}/{{$subcategory->id}}">{{$subcategory->sub_category_name}}</a></li>
                                    </ul>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                      @endforeach

	                  </div>
	               </div>
							</div>
							<div class="side">
								<h2>Price Range</h2>
								<form action="{{ url('price/range/filter') }}" method="post" class="colorlib-form-2">
									@csrf
				              	<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Price from:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
															<input type="hidden" name="category_id" value="{{ $category_id }}" class="form-controll">
															<input type="hidden" name="sub_category_id" value="{{ $subcategory_id }}" class="form-controll">

																<select name="range_from" id="people" class="form-control">
																@foreach ($product_price_ranges as $key => $product_price_range)
															 	 <option value="{{ $product_price_range->price_from }}">{{ $product_price_range->price_from }}</option>
																@endforeach
															  </select>


				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Price to:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="range_to" id="people" class="form-control">
																@foreach ($product_price_ranges as $key => $product_price_range)
															 	 <option value="{{ $product_price_range->price_to }}">{{ $product_price_range->price_to }}</option>
																@endforeach
				                      </select>
				                    </div>

				                  </div>
													<button type="submit" class="btn btn-primary btn-sm" style="border-radius: 5px 5px;margin-left: -10px;padding: 5px 20px;">Find Products</button>
				                </div>
				              </div>
				            </form>
							</div>
							<div class="side">
								<h2>Color</h2>
								<div class="color-wrap">
									<p class="color-desc">
										<a href="#" class="color color-1"></a>
										<a href="#" class="color color-2"></a>
										<a href="#" class="color color-3"></a>
										<a href="#" class="color color-4"></a>
										<a href="#" class="color color-5"></a>
									</p>
								</div>
							</div>
							<div class="side">
								<h2>Size</h2>
								<div class="size-wrap">
									<p class="size-desc">
										<a href="#" class="size size-1">xs</a>
										<a href="#" class="size size-2">s</a>
										<a href="#" class="size size-3">m</a>
										<a href="#" class="size size-4">l</a>
										<a href="#" class="size size-5">xl</a>
										<a href="#" class="size size-5">xxl</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- <div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-6 text-center">
							<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
						</div>
						<div class="col-md-6">
							<form class="form-inline qbstp-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Enter your email">
											<button type="submit" class="btn btn-primary">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> --}}


@endsection
