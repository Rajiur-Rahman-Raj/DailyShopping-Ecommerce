@extends('layouts.frontendmaster')

@section('frontend_content')

  <aside id="colorlib-hero">
    <div class="our_container" style="width:100%">
      {{-- <div class="container"> --}}
        <div class="flexslider" style="box-shadow:none !important; border:1.5px solid #fff !important; height:430px">
          <ul class="slides">
            @foreach ($banners as $banner)
              <li style="background-image: url({{ asset('uploads/banner_img') }}/{{ $banner->banner_img }} );">
              <div class="overlay"></div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                    <div class="slider-text-inner">
                      <div class="desc">
                        {{-- <h1 class="head-1">{{ $banner->product_category }}</h1> --}}
                        <p><a href="{{ url('category/wise/shop') }}" class="btn btn-primary">Shop Collection</a></p>
                        {{-- <p class="category"><span>{{ $banner->description }}</span></p> --}}

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            @endforeach
            </ul>
          </div>
      {{-- </div> --}}
    </div>

  </aside>
  <div id="colorlib-featured-product" style="background: none !important">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="{{ url('category/wise/shop')}}" class="f-product-1" style="background-image: url({{ asset('frontend_assets/images/item-1.jpg') }} );">
            <div class="desc">
              <h2>Fahion <br>for <br>men</h2>
            </div>
          </a>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <a href="{{ url('category/wise/shop')}}" class="f-product-2" style="background-image: url({{ asset('frontend_assets/images/item-2.jpg') }} );">
                <div class="desc">
                  <h2>Fahion <br>for <br>women</h2>
                </div>
              </a>
            </div>
            <div class="col-md-6">
              <a href="{{ url('category/wise/shop')}}" class="f-product-2" style="background-image: url({{ asset('frontend_assets/images/Electronic.jpg') }} );">
                <div class="desc">
                  <h2>Electronics <br>Collection</h2>
                </div>
              </a>
            </div>Electronic.jpg
            <div class="col-md-12">
              <a href="{{ url('category/wise/shop')}}" class="f-product-2" style="background-image: url({{ asset('frontend_assets/images/toys.jpg') }} );">
                <div class="desc">
                  <h2>Fahion <br>for <br>Child</h2>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="colorlib-shop">
    <div class="container" style="background: none !important; margin-bottom:7em">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
          <h2><span>New Uploaded Products</span></h2>
        </div>
      </div>
      <div class="row">
        @foreach ($arival_products as  $product)
          <div class="col-md-3 text-center">
            <div class="product-entry">
              <div class="product-img" style="background-image: url({{ asset('uploads/product_img') }}/{{ $product->product_image }} ); cursor:pointer">
                <a href="{{ url('product/details') }}/{{ $product->id }}"><p class="tag"><span class="new">Details</span></p></a>
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
        @endforeach

      </div>
    </div>
  </div>
  {{-- <div id="colorlib-intro" class="colorlib-intro" style="background-image: url({{ asset('frontend_assets/images/cover-img-1.jpg') }} );">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="intro-desc">
            <div class="text-salebox">
              <div class="text-lefts">
                <div class="sale-box">
                  <div class="sale-box-top">
                    <h2 class="number">45</h2>
                    <span class="sup-1">%</span>
                    <span class="sup-2">Off</span>
                  </div>
                  <h2 class="text-sale">Sale</h2>
                </div>
              </div>
              <div class="text-rights">
                <h3 class="title">Just hurry up limited offer!</h3>
                <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="shop.html" class="btn btn-primary">Shop Now</a> <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="colorlib-shop">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
          <h2><span>Our Available Products</span></h2>
        </div>
      </div>
      <div class="row">
        @forelse($our_products as $key => $product)
          <div class="col-md-4 text-center">
          <div class="product-entry">
            <div class="product-img" style="background-image: url({{ asset('uploads/product_img') }}/{{ $product->product_image }} );">
              <a href="{{ url('product/details') }}/{{ $product->id }}"><p class="tag"><span class="new">Details</span></p></a>
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
            <h4 style="color:red; font-weight:bold;"> No Products are Available</h4>
        @endforelse
        {{ $our_products->links() }}
      </div>

    </div>
  </div>

  <div id="colorlib-testimony" class="colorlib-light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
          <h2><span>Our Satisfied Customer says</span></h2>
          <h3 style="color:#ff8d00">Total ({{ $all_customer_reviews->count() }} Reviews) </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2" style="background: #eaeaea;color: #000; font-weight:bold;border-radius: 10px;padding: 10px;box-shadow: 2px 2px 5px #bac1ba;">

          <div class="owl-carousel2">
            @foreach ($all_customer_reviews as $all_customer_review)
              <div class="item">

                <div class="testimony text-center">
                  @if (App\Userprofile::where('user_id', $all_customer_review->user_id)->exists())
                    @php
                    $customer_images =  App\Userprofile::where('user_id', $all_customer_review->user_id)->get();
                    @endphp
                    @foreach ($customer_images as $customer_image)
                        <span class="img-user" style="background-image: url({{ asset('uploads/user_profile_img') }}/{{ $customer_image->profile_image }} );"></span>
                    @endforeach
                  @else
                    <span class="img-user" style="background-image: url({{ asset('uploads/user_profile_img/avata.png') }} );"></span>
                  @endif
                  <span class="user">{{ App\User::find($all_customer_review->user_id)->name }}</span>
                  @php
                      $user_addresses = App\Shipping::where('user_id', $all_customer_review->user_id)->get();
                  @endphp
                  @foreach ($user_addresses as $user_address)
                    <!-- <small style="color:white;"> {{ $user_address->address }}</small> -->
                  @endforeach

                  <blockquote>
                    <p style="color: #E16329;font-weight: bold;">{{ $all_customer_review->customer_comments }}</p>
                  </blockquote>
                </div>
              </div>
            @endforeach

             <!-- <div class="item">
              <div class="testimony text-center">
                <span class="img-user" style="background-image: url({{ asset('frontend_assets/images/person2.jpg') }} );"></span>
                <span class="user">James Fisher</span>
                <small>New York, USA</small>
                <blockquote>
                  <p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                </blockquote>
              </div>
            </div>  -->

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="colorlib-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
        <h2 style="text-transform:capitalize !important; margin-top:40px">Our Recent Campaign</h2>

        </div>
      </div>
      <div class="row">
        @foreach ($all_events as $all_event)
        <div class="col-md-4">
          <article class="article-entry" style="border: 2px solid #ddd;">
            <a href="{{ url('event/details') }}/{{ $all_event->id }}" class="blog-img"  style="background-image: url({{ asset('uploads/event_img') }}/{{ $all_event->event_image }});"></a>
            <div class="desc" style="padding-left:10px !important">
              <p class="meta"><span class="day" style="font-size:15px">{{ $all_event->event_date }}</span></p>
              <p class="admin"><span>Posted by:</span> <span style="color:orange">{{ $all_event->author }}</span></p>
              <h2 style="font-size: 16px;font-weight: bold;font-style: italic;border-left: 2px solid #b5b5b5;padding-left: 6px;"><a href="blog.html">{{ $all_event->event_title  }}</a></h2>
              <p style="height: 100px;overflow: hidden;padding: 0px 5px;">{{ $all_event->event_description }}</p>
              <a href="{{ url('event/details') }}/{{ $all_event->id }}" style="border-radius: 7px;padding: 4px 10px;" type="button" class="btn btn-sm btn-success">Event Details</a>
            </div>
          </article>
        </div>
        @endforeach
      </div>
    </div>
  </div>



@endsection
