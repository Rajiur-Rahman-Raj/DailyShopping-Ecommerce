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
				   					<h1>Shopping Cart</h1>
				   					<h2 class="bread"><span><a href="{{ url('/') }}">Home</a></span> <span><a href="{{ url('category/wise/shop') }}">Product</a></span> <span>Shopping Cart</span></h2>
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
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-11 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center">
								<span>Remove</span>
							</div>
						</div>
            @php
              $sub_total = 0;
            @endphp
            @forelse ($cart_info as $cart_details)
              <form action="{{ url('update/cart') }}" method="post">
                @csrf
						   <div class="product-cart">
                 @if(session('error_msg'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ session('error_msg') }}</strong>
                    </div>
                  @endif
                 @if(session('update_quantity'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ session('update_quantity') }}</strong>
                    </div>
                  @endif
							<div class="one-forth">
								<div class="product-img" style="background-image: url( {{ asset('uploads/product_img') }}/{{ $cart_details->relationtoproduct->product_image }} );">
								</div>
								<div class="display-tc">
									<h3>{{ $cart_details->relationtoproduct->product_name }}</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">৳ {{ $cart_details->relationtoproduct->product_price }}</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
                  <input type="hidden" name="product_id[]" value="{{ $cart_details->product_id }}">
									<input type="text" id="quantity" name="user_given_product_quantity[]" class="form-control input-number text-center" value="{{ $cart_details->product_quantity }}" >
								</div>
							</div>


							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">৳ {{ preg_replace("/[^0-9]/", "", $cart_details->relationtoproduct->product_price) * $cart_details->product_quantity }}</span>
								</div>

                @php
                  $sub_total = $sub_total + preg_replace("/[^0-9]/", "", $cart_details->relationtoproduct->product_price) * $cart_details->product_quantity;
                @endphp
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="{{ url('single/cart/delete') }}/{{ $cart_details->id }}" class="closed"></a>
								</div>
							</div>
						</div>
          @empty
            @if(session('order_message'))
               <div class="alert alert-success">
                 <strong>Good! </strong> {{ session('order_message') }}
               </div>
            @endif
            <div class="text-center text-danger alert alert-danger" style="font-size:20px">
              <td colspan="5"> No Cart Available here.. </td>
            </div>
          @endforelse
					</div>
				</div>
        <div class="row cart-buttons">
				<div class="col-lg-5 col-md-5">
					<a class="site-btn btn-continue" href="{{ url('/') }}" style="    background: #E26329; padding: 11px; display: inline-block; color: white; font-size: 20px; margin-bottom: 30px; margin-left: 94px; margin-top: -24px;">Continue shooping</a>
				</div>
				<div class="col-lg-7 col-md-7 text-lg-right text-right" style="margin-left: -97px;margin-top: -43px;">
					<a class="site-btn btn-clear" href="{{ url('cart/delete') }}" style="background: #403c3c;padding: 10px 15px;font-size: 18px;margin-right: 15px;color: white;">Clear cart</a>
					<button type="submit" class="site-btn btn-line btn-update" style="background:#363d96;padding: 5px 15px;color: white;border: none;font-size: 18px;">Update Cart</button>
				</div>
      </form>
			</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1" style=" margin-top: 5%;">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">
                  @if(session('coupon_not_exists'))
                    <div class="alert alert-danger" role="alert">
                      <strong>oh ho!</strong> {{ session('coupon_not_exists') }}
                    </div>
                  @endif
                  @if(session('expired_coupon'))
                    <div class="alert alert-danger" role="alert">
                      <strong>oh ho!</strong> {{ session('expired_coupon') }}
                    </div>
                  @endif
										<div class="row form-group">
											<div class="col-md-9">
												<input type="text" name="quantity" id="coupon_value" class="form-control input-number" placeholder="Your Coupon Number...">
											</div>
											<div class="col-md-3">
												<input type="submit" value="Apply Coupon" class="btn btn-primary" id="coupon_btn">
											</div>
										</div>

                    <div class="shipping_info">
                      <h4 style="color:red; background:$ddd; padding:10px 20px;">Shipping method</h4>
                      <p>Select the one you want :</p>
                      <div class="shipping-chooes">
                        <div class="shipping-chooes">
                          @foreach ($delivery_infos as $delivery_info)
                            <div class="sc-item">
                              <input type="radio" name="sc" id="{{ $delivery_info->id }}">
                              <label for="{{ $delivery_info->id }}" id='{{ $delivery_info->id }}' style="cursor:pointer">{{ $delivery_info->delivery_name }} ৳ <span id="{{ $delivery_info->delivery_charge }}">{{ $delivery_info->delivery_charge }}</span></label>
                            </div>
                          @endforeach

                          {{-- <div class="sc-item">
                            <input type="radio" name="sc" id="two">
                            <label for="two" id='delivery_two' style="cursor:pointer">Standard delivery<span> ৳ 50</span></label>
                          </div>
                          <div class="sc-item">
                            <input type="radio" name="sc" id="three" style="margin-left: -21px;">
                            <label for="three"  id='delivery_three' style="cursor:pointer;"> Personal Pickup<span> Free</span></label>
                          </div> --}}
                        </div>
                      </div>
                    </div>

								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span>৳ {{ $sub_total }}</span></p>
                      <p><span>Discount:</span> <span>- ৳ {{ $coupon_discount_amount * $sub_total /100}}</span></p>
											<p style="border-bottom:1px solid orange"><span>Delivery:</span><span style="color:white;">৳ </span><span id='delivery_charge'>0.00</span></p>
                      @php
                        $grand_total = $sub_total - ($sub_total*($coupon_discount_amount / 100));
                      @endphp
                      <input type="hidden" name="" id="grand_total" value="{{ $grand_total }}">
                      <p><span><div style="margin-top: -32px;font-weight: bold;font-size: 20px;color: #020202;">Total:</div>
                      </span><span style="color:white">৳ </span><span id='total_amount' style="color:white"> {{ $grand_total }}</span></p>
										</div>
										<div class="grand-total">
                      <form  action="{{ url('cart/checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="grand_total" id="grand_total_amount"  value="{{ $grand_total }}">
                        <button type="submit" class="btn btn-warning">Proceed to checkout</button>
                      </form>
										</div>
									</div>
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

  @section('footer_js')
    <script type="text/javascript">
      $(document).ready(function(){
        $('#coupon_btn').click(function(){
          var coupon_code = $('#coupon_value').val();
          window.location.href = "{{ url('cart/shoping') }}"+"/"+coupon_code;
        });

        <?php
          foreach ($delivery_infos as $delivery_info) {
            ?>

            $('#{{ $delivery_info->id }}').click(function(){
              var d_charge = $('#{{ $delivery_info->delivery_charge }}').html();
              var dalivery_charge = parseFloat(d_charge);
              $('#delivery_charge').html(dalivery_charge);
              var grand_total = parseFloat($('#grand_total').val());
              var final_grand_total = grand_total + dalivery_charge;
              $('#total_amount').html(parseFloat(final_grand_total).toFixed(2));
              $('#grand_total_amount').val(parseFloat(final_grand_total).toFixed(2));
            });

            <?php
          }
        ?>

      })
    </script>
  @endsection
@endsection
