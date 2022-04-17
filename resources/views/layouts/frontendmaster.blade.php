<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Ecommerce OSS(360 Degree Online Shopping Store)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="author" content=""/>

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/magnific-popup.css') }}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/flexslider.css') }}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.theme.default.min.css') }}">

	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap-datepicker.css') }}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/fonts/flaticon/font/flaticon.css') }}">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	{{-- font awsome --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">
	{{-- data table css --}}
	<link href="{{ asset('backend_assets') }}/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('dashboard_assets') }}/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>


	<!-- Modernizr JS -->
	<script src="{{ asset('frontend_assets/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
	/*  */
	.panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }
	/*  */
		.log_reg_btn a{
			color:red !important;
			transition: all .3s ease !important;
			font-size:17px !important;
		}
		#colorlib-subscribe {
		    background: #E2642A;
		}

		.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
		.qbstp-header-subscribe button {
		    padding: 9px 15px 8px 15px;
		}
		#colorlib-hero .flexslider .slider-text {
		    margin-top: 50px;
		}
		.article-entry .desc .meta {
		    background: #E26329;
		}
		.log_reg_btn a:hover{
			color:blue !important;
		}
		.total-wrap .total p span {
	    width: 30%;
	    display: inline-block;
	}
	.contact-wrap {
		    background: #4c4c4c;
		    color: white;
		}
	.colorlib-social-icons li a {
		    color: #adaaa2;
		}
		h1, h2, h3, h4, h5, h6, figure {
		    color: #E26329;
		}
			.total-wrap .total .sub {
		    border-bottom:0px !important;
		    margin-bottom: 10px;
		}
		.btn-primary {
			    background: #E26329;
			    border: 1px solid #612409;
			}
			.colorlib-heading h2 {
		    margin-bottom: 20px;
		}
			#colorlib-contact{
				padding-bottom: 2em;
			}
		.gototop a {
	    background: #E26329;
	    border-radius: 50px;
		}
		.product-name .one-forth span, .product-name .one-eight span {
		    color: #fff;
		}
		.product-name {
		    background: #504e4e;
		}
		.total-wrap .form-control {
		    border: 1px solid #ff8c08 !important;
		}
		.colorlib-nav .top-menu {
		    padding:35px 0px 15px 0px;
		    background: #fff;
		    /* border-bottom: 10px solid white; */
		    /* position: fixed; */
		    z-index: 10;
		    width: 100%;
		}
		.shipping_info{
			margin-bottom: 5em;
			background: #676666;
			color: white;
			text-align: center;
			padding: 15px;
		}
		.tab-content {
		    margin-bottom: 50px;
		}
		.nav-tabs li.active a {
		    background: #E26329;
		}
		.shipping_info h4{
			color: #e04600;
	    background: #ddd;
	    padding: 10px 20px;
	    font-weight: bold;
		}
		.colorlib-form {
		    background: #504E4E;
		}
		.colorlib-form label {
		    color: white;
		}
		.cart-detail {
		    background: #696969;
		    COLOR: WHITE;
		}
		.shipping_info p{
			text-align: left;
	    font-size: 20px;
	    color: #1deaff;
		}
		.shipping_info label{
			display: inline-block;
	    max-width: 100%;
	    margin-bottom: 5px;
	    font-size: 18px;
			font-weight:normal;
			margin-left: 10px;
			margin-right: 58%;
		}
		.total-wrap .total {
		    padding: 1em;
		    background: #009690;
		    width: 100%;
		    height: 327px !important;
		}
		.total-wrap .total p span {
		    width: 51%;
		    display: inline-block;
		    margin-bottom: 4px;
				color:white;
		}
		.btn-warning {
		    background: #E2642A;
		    color: #fff;
		    border: 2px solid #772e0c;
		}
		#colorlib-featured-product{
			background: #e8e8e8;
		}
		.colorlib-heading {
		  margin-bottom: 1em;
		}
		.colorlib-shop{
			padding-bottom: 0em;
		}
		#colorlib-testimony {
    padding-top: 3em;
    margin-bottom: -2em;
}

.panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
				.cart-detail {
			    padding: 1em 0.5em !important;
			}
			input[type="text"] {
			    height: 40px;
			}
			.colorlib-nav ul li.active > a {
			    color: #E2642A!important;
			}
			.colorlib-nav ul li a {
				color: #000000;
				font-size: 16px;
				font-family: fantasy;
			}
			.colorlib-nav ul li a:hover {
			    color: #E2642A;
			}
			.log_reg_btn a {
			    color: #E26329!important;
			}
			.log_reg_btn a:hover {
			    color: #009E3F!important;
			}
			#colorlib-hero .flexslider {
				padding: 0px 0px 0px 0px;
				border-radius: 0px;
				box-shadow: 6px 7px 8px #121312;
				overflow: hidden;
				border: 6px solid #DE6129;
				border-top: 0px;
			}
			#colorlib-footer h4 {
		    color: white;
			}
			#colorlib-footer .colorlib-footer-links li a {
	    color: rgba(0, 0, 0, 0.6);
	    text-decoration: underline;
			color: #949090;
		}

		.search_area{
			position: relative;
		}
		#suggest_porduct{
			position: absolute;
			top: 100%;
			left: 0;
			width: 100%;
			background:#ddd;

			z-index:999;
			border-radius: 4px;
			margin-top: 2px;
		}

		.nav-bg{
			background:#e6e6e6;
			position: fixed;
			top: 0;
			z-index: 999999;
			width:100%;
			transition: all 1s easy important;
			padding: 10px 0px;
		}
		.mynav_bar{
			transition: 1s easy important;
		}
	</style>
	</head>
	<body>

	{{-- <div class="colorlib-loader"></div> --}}
	<div class="container-fluid">
		<a class="card-platform-campaign-banner-link" target="_blank" href="https://www.webtraininginstitute.com/">
					<img class="image" src="{{ asset('frontend_assets/images/raj.gif') }}" alt="new" data-spm-anchor-id="a2a0e.home.0.i0.36be12f7tk9Nrn">
				</a>
	</div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<ul style="position: absolute;right: 34px;top: 0;text-decoration: underline;" class="log_reg_btn">
					<li><a href="{{ url('login') }}">Login</a></li>
					<li><a href="{{ url('register') }}">Register</a></li>
				</ul>
				{{-- <div class="mystickyful_nav sticky_top" style="width:100%;"> --}}
				<div class="container-fluid mynav_bar sticky-top">
					<div class="container">
						<div class="row">

							<div class="col-xs-2">

								<div id="colorlib-logo"><a href="{{ url('/') }}"><img src="{{ asset('frontend_assets/images/ds_2.png') }}" alt="" style="width: 180px;height: 50px;"> </a></div>
							</div>


							<div class="col-xs-6 text-right menu-1" style="float:right">
								<ul>
									<li class="active"><a href="{{ url('/') }}">Home</a></li>
									<li class="has-dropdown">
										<a href="{{  url('category/wise/shop')  }}">Shop</a>
									</li>
									<li><a href="{{ url('our/blog') }}">Blog</a></li>
									{{-- <li><a href="{{ url('about/us') }}">About</a></li> --}}
									<li><a href="{{ url('contact/us') }}">Contact</a></li>
									<li><a href="{{ url('cart/shoping') }}"><img class="image" src="{{asset('frontend_assets/images/storytelling_assets_2_new_thumbnail.gif')}}" alt="new" style="width: 60px;height: 50px;"><i class="icon-shopping-cart"></i> [{{ App\Cart::where('customer_ip', $_SERVER['REMOTE_ADDR'])->count() }}]</a></li>
								</ul>

							</div>
						</div>
					</div>
				</div>

				{{-- </div> --}}

				<div class="container">
					<div class="row">
						<div class="col-md-9 m-auto search_area" style="margin-top:8px;">
							<div class="input-group">
								<div class="form-outline">
									<form class="form-inline" action="{{ route('search.product') }}" method="GET">
										@csrf
								  <div class="form-group mx-sm-3 mb-2">
								    <input type="text" class="form-control" onfocus="showSearchResult()" onblur="showHideResult()" name="search" id="search" placeholder="Search Here For Any Products..." style="border: 1px solid #dedede !important;height: 40px; border-radius: 5px; width: 780px;">
								  </div>
								  <button type="submit" class="btn btn-success" style="    background: #2860ff;border-radius: 0px 0px 0px 0px;padding: 5px 20px;border: 2px solid #2461d0;color: white;margin-top: 5px;"><i class="fa fa-search"></i></button>
								</form>
								</div>
							</div>

							<div class="" id="suggest_porduct">

							</div>
						</div>

						<div class="col-xs-3" style="text-align:center;">
							<img class="image" src="{{asset('frontend_assets/images/offer.jpg')}}" alt="new" style="width: 225px;height: 45px; margin-top:4px;">
						</div>
					</div>
				</div>
			</div>
		</nav>
		{{-- Header Section End --}}

		@yield('frontend_content')

		<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
{{--
    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "110653333673500");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script> --}}
		{{-- footer section start  --}}

		<footer id="colorlib-footer" role="contentinfo" style="background: #232222;
    color: #949090; padding:0px 0px !important">
			{{-- <div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About Store</h4>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-2">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col-md-3">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div> --}}
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>

							<span class="block">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://www.webtraininginstitute.com" target="_blank" style="color:#E26329">Web Training Institute</a>
							</span>

					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('frontend_assets/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('frontend_assets/js/jquery.waypoints.min.js') }}"></script>
	{{-- fontawsome --}}
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js">

	</script>
	<!-- Flexslider -->
	<script src="{{ asset('frontend_assets/js/jquery.flexslider-min.js') }}"></script>
	<!-- Owl carousel -->
	<script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend_assets/js/magnific-popup-options.js') }}"></script>
	<!-- Date Picker -->
	<script src="{{ asset('frontend_assets/js/bootstrap-datepicker.js') }}"></script>
	<!-- Stellar Parallax -->
	<script src="{{ asset('frontend_assets/js/jquery.stellar.min.js') }}"></script>
	{{-- autocomplete js --}}
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- Main -->
	<script src="{{ asset('frontend_assets/js/main.js') }}"></script>
	<script src="{{ asset('backend_assets') }}/assets/plugins/datatables/js/jquery.datatables.min.js"></script>
	<script src="{{ asset('backend_assets') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="{{ asset('backend_assets') }}/assets/js/pages/table-data.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

	{{-- autocomplete search products code --}}



	<script type="text/javascript">
			$(document).ready(function(){

				$(window).scroll(function(){
					var scrolling = $(this).scrollTop();
					var sticky = $('.sticky-top');

					if(scrolling >= 100){
						sticky.addClass('nav-bg');
					}else{
							sticky.removeClass('nav-bg');
					}
				});
			});
	</script>

	<script type="text/javascript">
		$("body").on("keyup", "#search", function(){
			var searchdata = $("#search").val();

			if (searchdata.length > 0) {
				$.ajax({
					type:'POST',
					url: "{{ url('/find-products') }}",
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data:{search:searchdata},
					success:function(result){
						$('#suggest_porduct').html(result)
					}
				});
			}

			if (searchdata.length <1) {
				$('#suggest_porduct').html("");
			}

		});
	</script>

	<script type="text/javascript">
			function showSearchResult(){
				$('#suggest_porduct').slideDown();
			}
			function showHideResult(){
				$('#suggest_porduct').slideUp();
			}
	</script>


	@yield('footer_js')

	</body>
</html>
