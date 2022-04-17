@extends('layouts.frontendmaster')

@section('frontend_content')
  <aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url( {{ asset('frontend_assets/images/cover-img-1.jpg') }} );">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Product Details</h1>
				   					<h2 class="bread"><span><a href="{{ url('/') }}">Home</a></span> <span><a href="{{ url('category/wise/shop') }}">Shop</a></span> <span>{{ $single_product_info->product_name }}</span></h2>
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
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url( {{ asset('uploads/product_img') }}/{{ $single_product_info->product_image }} );">
											<p class="tag"><span class="sale">Sale</span></p>
										</div>
										<div class="thumb-nail">
											<a href="#" class="thumb-img" style="background-image: url( {{ asset('uploads/product_img') }}/{{ $single_product_info->product_image }} );"></a>
											<a href="#" class="thumb-img" style="background-image: url( {{ asset('uploads/product_img') }}/{{ $single_product_info->product_image }} );"></a>
											<a href="#" class="thumb-img" style="background-image: url( {{ asset('uploads/product_img') }}/{{ $single_product_info->product_image }} );"></a>
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3>{{ $single_product_info->product_name }}</h3>
										<p class="price">
											<span>৳ {{ $single_product_info->product_price }}</span>
                      @php
                        if(App\Customerreview::where('product_id',$single_product_info->id)->exists()){
                          $total_review = App\Customerreview::where('product_id',$single_product_info->id)->count();
                          $sum_of_rating =  App\Customerreview::where('product_id',$single_product_info->id)->sum('customer_rating');
                          $final_rating = $sum_of_rating / $total_review;
                        }else{
                          $final_rating = 0;
                        }

                      @endphp

											<span class="rate text-right">
                        @if ($final_rating == 1)
                          <i class="icon-star-full"></i>
  												<i class="icon-star"></i>
  												<i class="icon-star"></i>
  												<i class="icon-star"></i>
  												<i class="icon-star"></i>
                        @elseif ($final_rating == 2)
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
  												<i class="icon-star"></i>
  												<i class="icon-star"></i>
  												<i class="icon-star"></i>
                        @elseif ($final_rating == 3)
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
  												<i class="icon-star"></i>
  												<i class="icon-star"></i>
                        @elseif ($final_rating == 4)
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
  												<i class="icon-star"></i>
                        @elseif ($final_rating == 5)
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                        @elseif ($final_rating == 0)
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                        @endif
                        @if (App\Customerreview::where('product_id',$single_product_info->id)->exists())
                          ( {{ $total_review }} Reviews)
                        @else
                          (  0  Reviews)
                        @endif
											</span>
										</p>
										<p>{{ $single_product_info->product_description }}</p>
                    <form action="{{ url('add/to/cart') }}" method="post">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $single_product_info->id }}">

                      <!-- <div class="product-content">
                        <div class="color-choose">
            							<span>Colors:</span>
            							<div class="cs-item">
            								<input type="radio" name="color" id="black-color" value="black" checked>
            								<label class="cs-black" for="black-color"></label>
            							</div>
            							<div class="cs-item">
            								<input type="radio" name="color" value="blue" id="blue-color">
            								<label class="cs-blue" for="blue-color"></label>
            							</div>
            							<div class="cs-item">
            								<input type="radio" name="color" value="yellow" id="yollow-color">
            								<label class="cs-yollow" for="yollow-color"></label>
            							</div>
            							<div class="cs-item">
            								<input type="radio" name="color" value="red" id="orange-color">
            								<label class="cs-orange" for="orange-color"></label>
            							</div>
    						        </div>
            						<div class="size-choose">
          							<span>Size:</span>
          							<div class="sc-item">
          								<input type="radio" name="size" value="L" id="l-size" checked>
          								<label for="l-size">L</label>
          							</div>
          							<div class="sc-item">
          								<input type="radio" name="size" value="XL" id="xl-size">
          								<label for="xl-size">XL</label>
          							</div>
          							<div class="sc-item">
          								<input type="radio" name="size" value="XXL" id="xxl-size">
          								<label for="xxl-size">XXL</label>
          							</div>
          						</div>
                      </div> -->

                    @if(session('message'))
                       <div class="alert alert-success">
                         <strong>Good! </strong> {{ session('message') }}
                       </div>
                    @endif
                    @if(App\Product::find($single_product_info->id)->product_quantity <= 0)
                      <div class="col-md-5">
                        <div class="alert alert-danger">
                          <span>Product Out of Stock</span>
                        </div>
                      </div>
                    @else
                      <p><button type="submit" class="btn btn-primary btn-addtocart"></i>Add to Cart</button></p>
                    @endif

                  </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Description</a></li>
									<li><a data-toggle="tab" href="#manufacturer">Manufacturer</a></li>
                  @if (App\Customerreview::where('product_id',$single_product_info->id)->exists())
                    <li><a data-toggle="tab" href="#review">Reviews ({{ $total_review }})</a></li>
                  @else
                    <li><a data-toggle="tab" href="#review">Reviews (0)</a></li>
                  @endif
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										<p>{{ $single_product_info->product_description }}</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
										<ul>
											<li>The Big Oxmox advised her not to do so</li>
											<li>Because there were thousands of bad Commas</li>
											<li>Wild Question Marks and devious Semikoli</li>
											<li>She packed her seven versalia</li>
											<li>tial into the belt and made herself on the way.</li>
										</ul>
						         </div>
						         <div id="manufacturer" class="tab-pane fade">
						         	<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>

								   </div>
								   <div id="review" class="tab-pane fade">
								   	<div class="row">
								   		<div class="col-md-12">
                        @if (App\Customerreview::where('product_id',$single_product_info->id)->exists())
                          <h3>{{ $total_review }} Reviews</h3>
                        @else
                          <h3>(0) Reviews</h3>
                        @endif
                        @php
                          $total_customer_reviews = App\Customerreview::where('product_id', $single_product_info->id)->get();


                        @endphp
                        @foreach ($total_customer_reviews as $total_customer_review)
                          <div class="review">

                            @if (App\Userprofile::where('user_id', $total_customer_review->user_id)->exists())
                              @php
                              $customer_images =  App\Userprofile::where('user_id', $total_customer_review->user_id)->get();
                              @endphp
                              @foreach ($customer_images as $customer_image)
                                  <div class="user-img" style="background-image: url( {{ asset('uploads/user_profile_img') }}/{{ $customer_image->profile_image }} );"></div>
                                  <div class="desc">

                              @endforeach
                            @else
                              <div class="user-img" style="background-image: url( {{ asset('uploads/user_profile_img/avata.png') }}"></div>
                              <div class="desc">
                            @endif

                              <h4>
                                <span class="text-left">{{ App\User::find($total_customer_review->user_id)->name }}</span>
                                <span class="text-right">{{ $total_customer_review->created_at->format('d M Y') }}</span>
                              </h4>
                              <p class="star">

                                <span>
                                  @if ($total_customer_review->customer_rating == 1)
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                  @elseif ($total_customer_review->customer_rating == 2)
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                  @elseif ($total_customer_review->customer_rating == 3)
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                  @elseif ($total_customer_review->customer_rating == 4)
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star"></i>
                                  @elseif ($total_customer_review->customer_rating == 5)
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                  @elseif ($total_customer_review->customer_rating == 0)
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                  @endif
                                </span>
                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                              </p>
                              <p>{{ $total_customer_review->customer_comments }}</p>
                            </div>
                          </div>
                        @endforeach

								   		</div>

								   	</div>
								   </div>
					         </div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Similar Products</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
          @foreach ($related_products as $related_product)
					  <div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url( {{ asset('uploads/product_img') }}/{{ $related_product->product_image }} );">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="{{ $related_product->id }}"><i class="icon-eye"></i></a></span>
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="{{ $related_product->id }}">{{ $related_product->product_name }}</a></h3>
								<p class="price"><span>৳ {{ $related_product->product_price }}</span></p>
							</div>
						</div>
					</div>
          @endforeach
				</div>
			</div>
		</div>

		<div id="colorlib-subscribe">
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
		</div>

@endsection
