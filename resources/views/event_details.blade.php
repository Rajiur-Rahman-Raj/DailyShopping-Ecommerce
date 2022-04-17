@extends('layouts.frontendmaster')

@section('frontend_content')

  <style media="screen">
      .desc{
        padding:0px !important;
      }
  </style>
  <aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ asset('frontend_assets/images/cover-img-1.jpg') }});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Our Blog</h1>
				   					<h2 class="bread"><span><a href="{{ url('/') }}">Home</a></span> <span><a href="{{ url('our/blog') }}">| All Events</a></span> <span>| Blog Details</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<article class="article-entry" style="border: 2px solid #ddd;">
							<a href="{{ url('our/blog') }}" class="blog-img"  style="background-image: url({{ asset('uploads/event_img') }}/{{ $single_events->event_image }}); height:400px"></a>
							<div class="desc" style="padding-left:10px !important">
								<p class="meta"><span class="day" style="font-size:15px">{{ $single_events->event_date }}</span></p>
								<p class="admin"><span>Posted by:</span> <span style="color:orange">{{ $single_events->author }}</span></p>
								<h2 style="font-size: 16px;font-weight: bold;font-style: italic;border-left: 2px solid #b5b5b5;padding-left: 6px;"><a href="blog.html">{{ $single_events->event_title  }}</a></h2>
								<p style="padding: 0px 5px;">{{ $single_events->event_description }}</p>
							</div>
						</article>
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
