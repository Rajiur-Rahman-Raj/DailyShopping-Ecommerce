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
				   					<h1>Checkout</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="cart.html">Shopping Cart</a></span> <span>Checkout</span></h2>
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
							<div class="process text-center active">
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
				<div class="row">
					<div class="col-md-7">
						<form method="post" class="require-validation colorlib-form" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" action="{{ url('shipping/info/insert') }}">
              @csrf
							<h2>Billing Details</h2>
		          <div class="row">
			          <div class="form-group">
									{{-- <div class="col-md-6">
										<label for="fname">Full Name <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="fname" value="{{ $auth->name }}" class="form-control" placeholder="Your firstname" name="first_name" required>
									</div> --}}
									<div class="col-md-12">
										<label for="lname">Full Name <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="fname" value="{{ $auth->name }}" class="form-control" placeholder="Write your full name" name="first_name" required>
									</div>
								</div>
			          <div class="col-md-12">
									<div class="form-group">
										<label for="fname">Address <span style="font-size:14px" class="text-danger">*</span></label>
			                 <input type="text" id="address" class="form-control" placeholder="Enter Your Address" name="address" required>
			             </div>

			          </div>
                <div class="col-md-12">
			            <div class="form-group">
                  	<label for="country">Select Country <span style="font-size:14px" class="text-danger">*</span></label>
                     <div class="form-field">
                     	<i class="icon icon-arrow-down3"></i>
                        <select name="country_id" id="country" class="form-control" required>
	                      	<option value="#">Select country</option>
                          @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                          @endforeach
                        </select>
                     </div>
			            </div>
			          </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="country">Selete State <span style="font-size:14px" class="text-danger">*</span></label>
                    <div class="form-field">
                      <i class="icon icon-arrow-down3"></i>
                        <select name="state_id" id="state" class="form-control" required>


                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="country">Selete City <span style="font-size:14px" class="text-danger">*</span></label>
                     <div class="form-field">
                      <i class="icon icon-arrow-down3"></i>
                        <select name="city_id" id="city" class="form-control" required>


                        </select>
                     </div>
                  </div>
                </div>
                <div class="col-md-12">
                 <div class="form-group">
                     <label for="lname">Zip/Postal Code <span style="font-size:14px" class="text-danger">[optional]</span></label>
                     <input type="text" id="zippostalcode" class="form-control" placeholder="Zip / Postal" name="zip_code">
                  </div>
                </div>
							  <div class="form-group">
									<div class="col-md-6">
										<label for="email">E-mail Address <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="email" value="{{ $auth->email }}"class="form-control" placeholder="State Province" name="email" required>
									</div>
									<div class="col-md-6">
										<label for="Phone">Phone Number <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="zippostalcode" class="form-control" placeholder="" name="phone" required>
									</div>

							  </div>
		         </div>
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Cart Total</h2>

							<ul>

								<li><span>Total Order</span>  <span> ${{ $grand_total }}</span></li>
							</ul>
						</div>
            <input type="hidden" name="grand_total" value="{{ $grand_total }}">
						<div class="cart-detail">
							<h2>Payment Method <span style="font-size:14px" class="text-danger">*</span></h2>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="payment_type"  name="cash_on_delivary" value="1" >Cash on delivary</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
                  <div class="radio" id="click_stripe">
									   <label ><input type="radio" name="payment_type"  value="2" required>Stripe</label>
									</div>
                    <div id="stripe_slide" style="display:none">
                            <div class="panel panel-default credit-card-box" style="    background:#252222;color: white;font-size: 14px">
                                <div class="panel-heading display-table" >
                                    <div class="row display-tr" style="BACKGROUND: #1adde6;color: white;padding: 10px 15px;display: inline-block;" >
                                        <h3 class="panel-title display-td"  style="font-size: 24px;">Payment Details</h3>
                                        <div class="display-td" >
                                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                        </div>
                                    </div>
                                </div>

                            <div class="panel-body">

                                  <div class='form-row row'>
                                      <div class='col-xs-12 form-group required'>
                                          <label class='control-label'>Name on Card</label> <input
                                              class='form-control fourty' size='4' type='text'>
                                      </div>
                                  </div>

                                  <div class='form-row row'>
                                      <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input
                                           autocomplete='off' class='form-control card-number fourty' size='20' type='text'>
                                      </div>
                                  </div>

                                 <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                      <label class='control-label'>CVC</label> <input autocomplete='off'class='form-control card-cvc fourty' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                      <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month fourty' placeholder='MM' size='2' type='text'>
                                    </div>
                                      <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year fourty' placeholder='YYYY' size='4' type='text'>
                                      </div>
                                  </div>

                                 <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-xs-12">
                                      <a class="btn btn-info btn-sm btn-block">Total Amount(${{ $grand_total }})</a>
                                  </div>
                               </div>
                            </div>
                        </div>
                    </div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">

								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
									   <label><input type="checkbox" value="" required>I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type='submit' class="btn btn-primary btn-sm">Place an order</a>
							</div>
						</div>
            </form>
					</div>
				</div>
			</div>
		</div>


@endsection
@section('footer_js')
  <script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-state-list')}}/"+countryID,
           success:function(res){
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select State</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                });

            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-city-list')}}/"+stateID,
           success:function(res){
            if(res){
                $("#city").empty();
                $("#city").append('<option>Select City</option>');
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                });

            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }

   });
   </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#click_stripe').click(function(){
      $('#stripe_slide').slideDown('slow');

      var $form         = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
      var $form         = $(".require-validation"),
          inputSelector = ['input[type=email]', 'input[type=password]',
                           'input[type=text]', 'input[type=file]',
                           'textarea'].join(', '),
          $inputs       = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid         = true;
          $errorMessage.addClass('hide');

          $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
          $errorMessage.removeClass('hide');
          e.preventDefault();
        }
      });

      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }

    });

    function stripeResponseHandler(status, response) {
          if (response.error) {
              $('.error')
                  .removeClass('hide')
                  .find('.alert')
                  .text(response.error.message);
          } else {
              // token contains id, last4, and card type
              var token = response['id'];
              // insert the token into the form so it gets submitted to the server
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
              $form.get(0).submit();
          }
      }

    });
  });
</script>

  @endsection
