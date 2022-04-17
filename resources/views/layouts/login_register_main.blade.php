
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Meteor | Login - Sign up</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="stacks" />

        <!-- Styles -->
        <link href="{{ url('backend_assets') }}/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{ url('backend_assets') }}/assets/css/meteor.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/css/layers/dark-layer.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{ url('backend_assets') }}/assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <script src="{{ url('backend_assets') }}/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="{{ url('backend_assets') }}/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
          .error-msg{
            color:red;
          }
        </style>
    </head>

      @yield('log_reg_content')

      <!-- Javascripts -->
      <script src="{{ url('backend_assets') }}/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/pace-master/pace.min.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/switchery/switchery.min.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/offcanvasmenueffects/js/classie.js"></script>
      <script src="{{ url('backend_assets') }}/assets/plugins/waves/waves.min.js"></script>
      <script src="{{ url('backend_assets') }}/assets/js/meteor.min.js"></script>

  </body>
 </html>
