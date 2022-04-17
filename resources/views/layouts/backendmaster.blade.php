
@if (Auth::user()->role == 1)
  <!DOCTYPE html>
  <html lang="en">
  <head>

    <!-- Title -->
    <title>Meteor | Responsive User Template</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="stacks" />

    <!-- Styles -->

    <link href="{{ asset('backend_assets/assets/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend_assets/assets/plugins/uniform/css/default.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend_assets/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('backend_assets/assets/css/all.min.css') }}">
    <script type="text/javascript" src="{{ asset('backend_assets/assets/js/all.min.js') }}">

    </script>
    {{-- <link href="{{ asset('backend_assets/assets/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/> --}}
    <link href="{{ asset('backend_assets/assets/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('backend_assets/assets/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/weather-icons-master/css/weather-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Theme Styles -->
    <link href="{{ asset('backend_assets/assets/css/meteor.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/css/layers/dark-layer.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>

    <script src="{{ asset('backend_assets/assets/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
      input[type=range] {
        -webkit-appearance: none;
        width: 100%;
        margin: 13.8px 0;
      }
      .same_star{
        color:orange;
      }
      input[type=range]:focus {
        outline: none;
      }
      input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        background: #0071a9;
        border-radius: 1.3px;
        border: 0.2px solid #010101;
      }
      input[type=range]::-webkit-slider-thumb {
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        border: 1px solid #000000;
        height: 36px;
        width: 16px;
        border-radius: 3px;
        background: #ffffff;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -14px;
      }
      input[type=range]:focus::-webkit-slider-runnable-track {
        background: #0082c3;
      }
      input[type=range]::-moz-range-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        background: #0071a9;
        border-radius: 1.3px;
        border: 0.2px solid #010101;
      }
      input[type=range]::-moz-range-thumb {
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        border: 1px solid #000000;
        height: 36px;
        width: 16px;
        border-radius: 3px;
        background: #ffffff;
        cursor: pointer;
      }
      input[type=range]::-ms-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        background: transparent;
        border-color: transparent;
        color: transparent;
      }
      input[type=range]::-ms-fill-lower {
        background: #006090;
        border: 0.2px solid #010101;
        border-radius: 2.6px;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      }
      input[type=range]::-ms-fill-upper {
        background: #0071a9;
        border: 0.2px solid #010101;
        border-radius: 2.6px;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      }
      input[type=range]::-ms-thumb {
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        border: 1px solid #000000;
        height: 36px;
        width: 16px;
        border-radius: 3px;
        background: #ffffff;
        cursor: pointer;
        height: 8.4px;
      }
      input[type=range]:focus::-ms-fill-lower {
        background: #0071a9;
      }
      input[type=range]:focus::-ms-fill-upper {
        background: #0082c3;
      }


    .user_left{
      padding-top: 12px;
      padding-bottom:20px;
      border-bottom:1px solid #ddd;
      box-shadow: 1px 0px 4px 5px #7d847d;
    }
      .user_left h2{
        margin-right: 20px;
        color: #1bd4cd;
        float: left;
        margin-top: 80px;
        border: 1px solid #18b1b1;
        padding: 5px 5px 5px 5px;
        border-left:none;
      }
      .user_left img {
        border-radius: 50%;
        height: 200px;
        width: 200px;
        border: 2px solid #a09696;
        box-shadow: 0px 2px 10px 0px #2e312e;
        cursor: pointer;
    }

    .user_right{
      box-shadow: 1px 1px 6px 5px #6e6f6e;
    }
    .user_icon ul li a{
      width: 30px;
      height: 30px;
      background: #10a5e0;
      display: inline-block;
      border-radius: 50%;
      color: white;
      font-size: 18px;
      margin-bottom: 7px;

    }
    .user_icon{
      padding: 8px 1px 0px 0px;
    }
    .same_user_icon{
      margin-top:6px;
    }
    .user_right h2{
      color: #0ddadc;
      display: inline-block;
      border-bottom: 1px solid #0992a9;
      margin-left: 221px;
    }
    #facebook{
      background:#2A5297;
  }
    #instagram{
      background:#F64646;
    }
    #twitter{
      background:#00ACED;
    }
    #linkedin{
      background:#4875B4;
    }
    #youtube{
      background:#D02321;
    }
    .update_image_form{
      display: inline-block;
      margin-left: -37px;
      width: 150px
    }
    </style>
  </head>
  <body class="compact-menu">

    <form class="search-form" action="#" method="GET">
      <div class="input-group">
        <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
        <span class="input-group-btn">
          <button class="btn btn-default close-search" type="button"><i class="icon-close"></i></button>
        </span>
      </div><!-- Input Group -->
    </form><!-- Search Form -->
    <main class="page-content content-wrap">
      <div class="navbar">
        <div class="navbar-inner">

          <div class="logo-box">
            <a href="#" style="width:10px;height:10px; background: #05f1ff; border-radius:50%;display: inline-block;margin-top: 20px;margin-left: 10px;"></a>
            <a href="index.html" class="logo-text" style="padding:0px 0px"><span>{{ Auth::user()->name }}</span></a>
          </div><!-- Logo Box -->
          <div class="search-button">
            <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
          </div>
          <div class="topmenu-outer">
            <div class="top-menu">
              <ul class="nav navbar-nav navbar-left">
                <li>
                  <a href="javascript:void(0);" class="sidebar-toggle"><i class="icon-arrow-left"></i></a>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">

                  @if (App\Userprofile::where('user_id', Auth::id())->exists())
                    @php
                      $user_profile_pic = App\Userprofile::where('user_id', Auth::id())->first()->profile_image;
                    @endphp
                    <img src="{{ asset('uploads/user_profile_img') }}/{{ $user_profile_pic }}" alt="" style="width: 40px;height: 40px;border-radius: 50%;margin-top: 5px;margin-left: 21px;">
                  @else
                    <img src="{{ asset('uploads/user_profile_img/avata.png') }}" alt="" style="width:40px;height:40px;border-radius:50%;margin-top: 5px;margin-left:21px;">
                  @endif
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="float:right">
                    <span class="user-name">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></span>
                    {{-- <img class="img-circle avatar" src="assets/images/avatar1.png" width="40" height="40" alt=""> --}}
                  </a>
                  <ul class="dropdown-menu dropdown-list" role="menu">
                    <li role="presentation"><a href="{{ url('view/user/profile') }}"><i class="icon-user"></i>Your Profile</a></li>
                    <li role="presentation"><a href="{{ url('add/user/profile') }}"><i class="icon-calendar"></i>Edit Your Profile</a></li>

                    <li role="presentation"><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><i class="icon-key m-r-xs"></i>Log out</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul><!-- Nav -->
              </div><!-- Top Menu -->
            </div>
          </div>
        </div><!-- Navbar -->
        <div class="page-sidebar sidebar">
          <div class="page-sidebar-inner slimscroll">
            <ul class="menu accordion-menu">
              <li class="@yield('dashboard-active')"><a href="{{ url('/') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Visit Website</p><span class="active-page"></span></a></li>

              <li class="@yield('dashboard-active')"><a href="{{ url('user/dashboard') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Your Dashboard</p><span class="active-page"></span></a></li>

              <li class="droplink @yield('all_product_active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-envelope-open"></span><p>Profile</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                  <li><a href="{{ url('add/user/profile') }}">Add/Update Your Profile</a></li>
                  <li><a href="{{ url('view/user/profile') }}">View Profile</a></li>
                </ul>
              </li>

              <li class="droplink @yield('all_product_active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-envelope-open"></span><p>Your Order</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                  <li><a href="{{ url('user/dashboard') }}">Total Order</a></li>
                  <li><a href="{{ url('customer/total/order/list') }}">Order list</a></li>
                </ul>
              </li>

              <li class="@yield('dashboard-active')"><a href="{{ url('user/password/change') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Forget Password</p><span class="active-page"></span></a></li>

              <li class="droplink"><a  class="waves-effect waves-button"><span class="menu-icon icon-power"></span><p>Important</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                  <li><a href="{{ url('password/reset') }}"></a></li>
                </ul>
              </li>
            </ul>
          </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->


        <div class="page-inner">
          <div id="main-wrapper">
            <div class="row">
              @yield('backend_content')
            </div><!-- Row -->
          </div><!-- Main Wrapper -->
          <div class="page-footer">
            <p class="no-s">Made with <i class="fa fa-heart"></i> by stacks</p>
          </div>
        </div><!-- Page Inner -->

      </main><!-- Page Content -->
      <nav class="cd-nav-container" id="cd-nav">
        <header>
          <h3>DEMOS</h3>
        </header>
        <div class="col-md-6 demo-block demo-selected demo-active">
          <p>Dark<br>Design</p>
        </div>
        <div class="col-md-6 demo-block">
          <a href="../admin2/index.html"><p>Light<br>Design</p></a>
        </div>
        <div class="col-md-6 demo-block">
          <a href="../admin3/index.html"><p>Material<br>Design</p></a>
        </div>
        <div class="col-md-6 demo-block demo-coming-soon">
          <p>Horizontal<br>(Coming)</p>
        </div>
        <div class="col-md-6 demo-block demo-coming-soon">
          <p>Coming<br>Soon</p>
        </div>
        <div class="col-md-6 demo-block demo-coming-soon">
          <p>Coming<br>Soon</p>
        </div>
      </nav>
      <div class="cd-overlay"></div>


      <!-- Javascripts -->
      <script src="{{ asset('backend_assets/assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/pace-master/pace.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/switchery/switchery.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/offcanvasmenueffects/js/classie.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/waves/waves.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/3d-bold-navigation/js/main.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
      {{-- <script src="{{ asset('backend_assets/assets/plugins/toastr/toastr.min.js') }}"></script> --}}
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/curvedlines/curvedLines.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/chartjs/Chart.bundle.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/js/meteor.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/js/pages/dashboard.js') }}"></script>

    </body>
    </html>
@else
  <!DOCTYPE html>
  <html lang="en">
  <head>

    <!-- Title -->
    <title> Admin Dashboard </title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="stacks" />

    <!-- Styles -->

    <link href="{{ asset('backend_assets/assets/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend_assets/assets/plugins/uniform/css/default.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend_assets/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('backend_assets/assets/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/weather-icons-master/css/weather-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>

    {{-- data table css --}}
    <link href="{{ asset('backend_assets') }}/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dashboard_assets') }}/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>

    <!-- Theme Styles -->
    <link href="{{ asset('backend_assets/assets/css/meteor.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/css/layers/dark-layer.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend_assets/assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>

    <script src="{{ asset('backend_assets/assets/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style media="screen">
    .user_left{
      padding-top: 12px;
      padding-bottom:20px;
      border-bottom:1px solid #ddd;
      box-shadow: 1px 0px 4px 5px #7d847d;
    }
      .user_left h2{
        margin-right: 20px;
        color: #1bd4cd;
        float: left;
        margin-top: 80px;
        border: 1px solid #18b1b1;
        padding: 5px 5px 5px 5px;
        border-left:none;
      }
      .user_left img {
        border-radius: 50%;
        height: 200px;
        width: 200px;
        border: 2px solid #a09696;
        box-shadow: 0px 2px 10px 0px #2e312e;
        cursor: pointer;
    }

    .user_right{
      box-shadow: 1px 1px 6px 5px #6e6f6e;
    }
    .user_icon ul li a{
      width: 30px;
      height: 30px;
      background: #10a5e0;
      display: inline-block;
      border-radius: 50%;
      color: white;
      font-size: 18px;
      margin-bottom: 7px;

    }
    .user_icon{
      padding: 8px 1px 0px 0px;
    }
    .same_user_icon{
      margin-top:6px;
    }
    .user_right h2{
      color: #0ddadc;
      display: inline-block;
      border-bottom: 1px solid #0992a9;
      margin-left: 221px;
    }
    #facebook{
      background:#2A5297;
  }
    #instagram{
      background:#F64646;
    }
    #twitter{
      background:#00ACED;
    }
    #linkedin{
      background:#4875B4;
    }
    #youtube{
      background:#D02321;
    }
    .update_image_form{
      display: inline-block;
      margin-left: -37px;
      width: 150px
    }
    </style>

  </head>
  <body class="compact-menu">
    <div class="overlay"></div>

    <form class="search-form" action="#" method="GET">
      <div class="input-group">
        <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
        <span class="input-group-btn">
          <button class="btn btn-default close-search" type="button"><i class="icon-close"></i></button>
        </span>
      </div><!-- Input Group -->
    </form><!-- Search Form -->
    <main class="page-content content-wrap">
      <div class="navbar">
        <div class="navbar-inner">
          <div class="logo-box">
            <a href="#" style="width:10px;height:10px; background: #05f1ff; border-radius:50%;display: inline-block;margin-top: 20px;margin-left: 10px;"></a>
            <a href="index.html" class="logo-text" style="padding:0px 0px"><span>{{ Auth::user()->name }}</span></a>
          </div><!-- Logo Box -->
          <div class="search-button">
            <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
          </div>
          <div class="topmenu-outer">
            <div class="top-menu">
              <ul class="nav navbar-nav navbar-left">
                <li>
                  <a href="javascript:void(0);" class="sidebar-toggle"><i class="icon-arrow-left"></i></a>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
                </li>
                <li class="dropdown">

                  @if (App\Userprofile::where('user_id', Auth::id())->exists())
                    @php
                      $user_profile_pic = App\Userprofile::where('user_id', Auth::id())->first()->profile_image;
                    @endphp
                    <img src="{{ asset('uploads/user_profile_img') }}/{{ $user_profile_pic }}" alt="" style="width: 40px;height: 40px;border-radius: 50%;margin-top: 5px;margin-left: 21px;">
                  @else
                    {{-- <img src="{{ asset('uploads/user_profile_img/avata.png') }}" alt="" style="width:40px;height:40px;border-radius:50%;margin-top: 5px;margin-left:21px;"> --}}
                  @endif
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="float:right">
                    <span class="user-name">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></span>
                    {{-- <img class="img-circle avatar" src="assets/images/avatar1.png" width="40" height="40" alt=""> --}}
                  </a>
                  <ul class="dropdown-menu dropdown-list" role="menu">
                    <li role="presentation"><a href="{{ url('view/admin/profile') }}"><i class="icon-user"></i>Your Profile</a></li>
                    <li role="presentation"><a href="{{ url('admin/user/profile') }}"><i class="icon-calendar"></i>Edit Your Profile</a></li>

                    <li role="presentation"><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><i class="icon-key m-r-xs"></i>Log out</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul><!-- Nav -->
              </div><!-- Top Menu -->
            </div>
          </div>
        </div><!-- Navbar -->
        <div class="page-sidebar sidebar">
          <div class="page-sidebar-inner slimscroll">
            <ul class="menu accordion-menu">

              <li class="@yield('dashboard-active')"><a href="{{ url('welcome/admin/dashboard') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Admin Dashboard</p><span class="active-page"></span></a></li>

              <li><a href="{{ url('view/admin/profile') }}" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Profile</p></a></li>

              <li class="@yield('dashboard-active')"><a href="{{ url('user/password/change') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Forget Password</p><span class="active-page"></span></a></li>

              <li><a href="{{ url('admin/register') }}" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Register Here</p></a></li>


              <li class="droplink @yield('all_product_active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-envelope-open"></span><p>Add View</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                  <li><a href="{{ url('category/add/view') }}">Add Categories</a></li>
                  <li><a href="{{ url('product/add/view') }}">Add Products</a></li>
                  <li><a href="{{ url('product/viewlist') }}">View Products</a></li>
                  <li><a href="{{ url('products/price/range') }}">Add Products Price Range</a></li>
                  <li><a href="{{ url('coupon/add/view') }}">Add Coupon</a></li>
                  <li><a href="{{ url('delivery/charge/view') }}">Add Delivery Charge</a></li>
                  <li><a href="{{ url('recent/events') }}"> Recent Campaign</a></li>
                  <li><a href="{{ url('view/events/list') }}">View Campaign List</a></li>
                  <li><a href="{{ url('banner/add/view') }}">Add banner</a></li>
                </ul>
              </li>
              <!-- <li><a href="{{ url('add/category/wise/shop') }}" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p> add category wise shop</p></a></li> -->
              <li><a href="{{ url('customer/info') }}" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Customer-Order</p></a></li>
              <li><a href="{{ url('contact/us/message') }}" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Contact-Message</p></a></li>

            </ul>
          </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->


        <div class="page-inner">
          <div id="main-wrapper">
            <div class="row">
              @yield('backend_content')
            </div><!-- Row -->
          </div><!-- Main Wrapper -->
          <div class="page-footer">
            <p class="no-s">Made with <i class="fa fa-heart"></i> by stacks</p>
          </div>
        </div><!-- Page Inner -->

      </main><!-- Page Content -->
      <nav class="cd-nav-container" id="cd-nav">
        <header>
          <h3>DEMOS</h3>
        </header>
        <div class="col-md-6 demo-block demo-selected demo-active">
          <p>Dark<br>Design</p>
        </div>
        <div class="col-md-6 demo-block">
          <a href="../admin2/index.html"><p>Light<br>Design</p></a>
        </div>
        <div class="col-md-6 demo-block">
          <a href="../admin3/index.html"><p>Material<br>Design</p></a>
        </div>
        <div class="col-md-6 demo-block demo-coming-soon">
          <p>Horizontal<br>(Coming)</p>
        </div>
        <div class="col-md-6 demo-block demo-coming-soon">
          <p>Coming<br>Soon</p>
        </div>
        <div class="col-md-6 demo-block demo-coming-soon">
          <p>Coming<br>Soon</p>
        </div>
      </nav>
      <div class="cd-overlay"></div>


      <!-- Javascripts -->
      <script src="{{ asset('backend_assets/assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/pace-master/pace.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/switchery/switchery.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/offcanvasmenueffects/js/classie.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/waves/waves.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/3d-bold-navigation/js/main.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
      {{-- <script src="{{ asset('backend_assets/assets/plugins/toastr/toastr.min.js') }}"></script> --}}
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/curvedlines/curvedLines.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/plugins/chartjs/Chart.bundle.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/js/meteor.min.js') }}"></script>
      <script src="{{ asset('backend_assets/assets/js/pages/dashboard.js') }}"></script>
      <script src="{{ asset('backend_assets') }}/assets/plugins/datatables/js/jquery.datatables.min.js"></script>
      <script src="{{ asset('backend_assets') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
      <script src="{{ asset('backend_assets') }}/assets/js/pages/table-data.js"></script>
      @yield('custom_js');
    </body>
    </html>
@endif
