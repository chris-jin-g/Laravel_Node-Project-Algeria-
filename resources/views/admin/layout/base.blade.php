<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>@yield('title'){{ config('constants.site_title', 'Thinkin Cab') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}">

    <!-- Vendor CSS -->
    {{-- <link rel="stylesheet" href="{{asset('main/vendor/bootstrap4/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('main/vendor/themify-icons/themify-icons.css')}}">
    <script src="https://kit.fontawesome.com/6478ca1c88.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{asset('main/vendor/font-awesome/css/font-awesome.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('main/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/jscrollpane/jquery.jscrollpane.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/waves/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/switchery/dist/switchery.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/DataTables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/DataTables/Buttons/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css')}}">



    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap-datepicker.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('asset/css/bootstrap-glyphicons.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{ asset('main/vendor/dropify/dist/css/dropify.css') }}">
    {{-- @if(Config::get('app.locale')=='ar')
     <link rel="stylesheet" href="{{ asset('main/assets/css/arabic_core.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('main/assets/css/core.css') }}">
    @endif --}}
    <link rel="stylesheet" href="{{ asset('main/assets/css/style_pagination.css')}}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/style_dialog.css')}}">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('asets/css/material-dashboard.css?v=2.1.0')}}">
    <link rel="stylesheet" href="{{asset('asets/demo/demo.css')}}">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .rating-outer span,
        .rating-symbol-background {
            color: #ffe000!important;
        }
        .rating-outer span,
        .rating-symbol-foreground {
            color: #ffe000!important;
        }
    </style>
    @yield('styles')
</head>

<body class="dark-edition">
    <div class="wrapper">
        <div class="preloader"></div>
        <div class="site-overlay"></div>
        @php
        $route_name = Route::currentRouteName();
        $allRouteDialog = config('guidelines.demo_mode_dialog.admin');
        $checkRouteDialog = isset($allRouteDialog[$route_name])?"true":"false";
        $tempVar = (Session::get($route_name))?Session::get($route_name):"false";
        if($checkRouteDialog =="true"){
        $dialog = $allRouteDialog[$route_name];
        }
        @endphp

@if($checkRouteDialog =="true")
    <div id="demoModeDialog" class="demoModeDialogmodal">
        <div class="demoModeDialogmodal-content text-center">
            <span class="demoModeDialogclose">&times;</span>
            <div class="row demoModeDialogdis demoModeDialogdis1">
                <p> {!! $dialog !!} </p>
           </div>
         </div>
    </div>
    @endif

            @include('admin.include.nav')
        <div class="main-panel">
            @include('admin.include.header')

            <div class="content">
                <div class="container-fluid">
                @include('common.notify')

                @yield('content')
            
                @include('admin.include.footer')
                </div>
            </div>
        </div>

    </div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{asset('/asets/img/sidebar-1.jpg')}}" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{asset('/asets/img/sidebar-2.jpg')}}" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{asset('/asets/img/sidebar-3.jpg')}}" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{asset('/asets/img/sidebar-4.jpg')}}" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard-dark" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard-dark/docs/2.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard/tree/dark-edition" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
    <!-- Vendor JS -->
    <script type="text/javascript" src="{{asset('main/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/tether/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/detectmobilebrowser/detectmobilebrowser.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/jscrollpane/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/jscrollpane/mwheelIntent.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/jquery-fullscreen-plugin/jquery.fullscreen')}}-min.js"></script>
    <script type="text/javascript" src="{{asset('main/vendor/waves/waves.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/Responsive/js/dataTables.responsi')}}ve.min.js"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/Responsive/js/responsive.bootstra')}}p4.min.js"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/Buttons/js/dataTables.buttons')}}.min.js"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/Buttons/js/buttons.bootstrap4')}}.min.js"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/JSZip/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/pdfmake/build/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/pdfmake/build/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/DataTables/Buttons/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

    <!-- Scripts -->
   
   <script src="{{ asset('/asets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('/asets/js/core/bootstrap-material-design.min.js')}}"></script>
  {{-- <script src="https://unpkg.com/default-passive-events"></script> --}}
  <script src="https://unpkg.com/default-passive-events"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('/asets/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('/asets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/asets/js/material-dashboard.js?v=2.1.0')}}"></script>

    <script type="text/javascript" src="{{asset('main/vendor/DataTables/Buttons/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src= @if(($checkRouteDialog =="true") && (Setting::get('demo_mode', 0) == 1) && ($tempVar =="false"))
    {{Session::put($route_name,'true')}}
         <script type="text/javascript">
            var demoModeDialogmodal = document.getElementById('demoModeDialog');
            demoModeDialogmodal.style.display = "block";
            var demoModeDialogspan = document.getElementsByClassName("demoModeDialogclose")[0];
            demoModeDialogspan.onclick = function() 
            {
                demoModeDialogmodal.style.display = "none";
            }
            </script>
    @endif "{{asset('main/vendor/DataTables/Buttons/js/buttons.colVis.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('main/vendor/switchery/dist/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/dropify/dist/js/dropify.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('main/vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>    
    <script type="text/javascript" src="{{asset('main/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Neptune JS -->
    <script type="text/javascript" src="{{asset('main/assets/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/assets/js/demo.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/assets/js/forms-pickers.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/assets/js/tables-datatable.js')}}"></script>
    <script type="text/javascript" src="{{asset('main/assets/js/forms-upload.js')}}"></script>



    @yield('scripts')

    <script type="text/javascript" src="{{asset('asset/js/rating.js')}}"></script>    
    <script type="text/javascript">
        $('.rating').rating();
        
        //Mask
        $(function() {
            $('#currency_fixed').maskMoney();
            $('#currency_price').maskMoney();
            $('#currency_min_price').maskMoney();
            $('#currency_minute').maskMoney();
          });
    </script>
   
<!--    @if(Setting::get('demo_mode', 0) == 1)
         
    @endif-->

    @if(($checkRouteDialog =="true") && (Setting::get('demo_mode', 0) == 1) && ($tempVar =="false"))
    {{Session::put($route_name,'true')}}
         <script type="text/javascript">
            var demoModeDialogmodal = document.getElementById('demoModeDialog');
            demoModeDialogmodal.style.display = "block";
            var demoModeDialogspan = document.getElementsByClassName("demoModeDialogclose")[0];
            demoModeDialogspan.onclick = function() 
            {
                demoModeDialogmodal.style.display = "none";
            }
            </script>
    @endif 
</body>
</html>