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
				   					<h1>Contact</h1>
				   					<h2 class="bread"><span><a href="{{ url('/') }}">Home</a></span> <span>Contact</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h3>Contact Information</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location"></i></span> মৌচাক অফিসঃ মাহেরা কটেজ (UCC গলি), ৮০ সিদ্ধেশ্বরী রোড, ঢাকা-১২১৭। (রস মিষ্টান্ন ভান্ডার এর পাশের গলি)</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 01868752464, +01318948051</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@wti.com</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="https://www.webtraininginstitute.com" target="_blank" style="color:blue; text-decoration:underline">webtraininginstitute.com</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap" style="background:#242526 !important">
							<h3>Get In Touch</h3>
              @if(session('message'))
                 <div class="alert alert-info">
                   <strong>Good! </strong> {{ session('message') }}
                 </div>
              @endif
							<form action="{{ url('contact/message/insert') }}" method="post" enctype="multipart/form-data">
                @csrf
								<div class="row form-group">
									<div class="col-md-6 padding-bottom">
										<label for="fname">First Name <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="fname" name="fname" class="form-control @error('fname') is-invalid @enderror" placeholder="Your firstname" value="{{ old('fname') }}">
                    @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
									</div>
									<div class="col-md-6">
										<label for="lname">Last Name <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="lname" name="lname" class="form-control @error('lname') is-invalid @enderror" placeholder="Your lastname" value="{{ old('lname') }}">
                    @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your email address" value="{{ old('Email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
									</div>
								</div>

                <div class="row form-group">
									<div class="col-md-12">
										<label for="email">Phone <span style="font-size:14px" class="text-danger">*</span></label>
										<input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Your phone number" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="subject">Subject <span style="font-size:14px" class="text-danger">[Optional]</span></label>
										<input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="message">Message <span style="font-size:14px" class="text-danger">[Optional]</span></label>
										<textarea name="message" id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror" placeholder="Say something about us" value="{{ old('message') }}"></textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
									</div>
								</div>
								<div class="form-group text-center">
									<input type="submit" value="Send Message" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- <div id="map" class="colorlib-map"></div> --}}
@endsection
