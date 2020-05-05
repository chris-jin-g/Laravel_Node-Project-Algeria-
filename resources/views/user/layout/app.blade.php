<!DOCTYPE html>
<html lang="pr-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('constants.site_title','Thinkin Cab') }}</title>

        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}"/>

        <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnificpopup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.mb.YTPlayer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/img/icon/favicon.ico')}}">
    </head>
    <body>
        <div id="wrapper">
             <div class="overlay" id="overlayer" data-toggle="offcanvas"></div> 

             <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav">
                    <li>
                    </li>
                    <li class="full-white">
                        <a href="{{ url('/register') }}">SIGN UP TO RIDE</a>
                    </li>
                    <li class="white-border">
                        <a href="{{ url('/provider/register') }}">BECOME A DRIVER</a>
                    </li>
                    <li>
                        <a href="{{ url('/ride') }}">Ride</a>
                    </li>
                    <li>
                        <a href="{{ url('/drive') }}">Drive</a>
                    </li>
                    <li>
                        <a href="{{ url('help') }}">Help</a>
                    </li>
                    <li>
                        <a href="{{ url('privacy') }}">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{ url('terms') }}">Terms and Conditions</a>
                    </li>
                    <li>
                        <a href="{{ Setting::get('store_link_ios','#') }}"><img src="{{ asset('/asset/img/appstore-white.png') }}"></a>
                    </li>
                    <li>
                        <a href="{{ Setting::get('store_link_android','#') }}"><img src="{{ asset('/asset/img/playstore-white.png') }}"></a>
                    </li>
                </ul>
            </nav> 

            <div id="page-content-wrapper">
                <header>
                    <nav class="navbar navbar-fixed-top">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <!-- <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                                    <span class="hamb-top"></span>
                                    <span class="hamb-middle"></span>
                                    <span class="hamb-bottom"></span>
                                </button> -->

                                <a class="navbar-brand" href="{{url('/')}}"><img src="{{ config('constants.site_logo', asset('logo-black.png')) }}"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li @if(Request::url() == url('/ride')) class="active" @endif>
                                         <a href="{{url('/ride')}}">Ride</a>
                                    </li>
                                    <li @if(Request::url() == url('/drive')) class="active" @endif>
                                         <a href="{{url('/drive')}}">Drive</a>
                                    </li>
                                    <li><a href="{{ url('help') }}">Help</a></li>

                                </ul>
                                <ul class="nav navbar-nav navbar-right">

                                    <li><a class="btn-outline" href="{{url('/register')}}">Signup to Ride</a></li>
                                    <li><a class="menu-btn" href="{{url('/provider/register')}}">Signup to Drive</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>

                @yield('content')
                <div class="container-fluid call-us gray-section content-block pad-60">
                    <div class="container">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1 support">

                                <img src="{{ asset('asset/img/support.png') }}">
                            </div>
                            <div class="col-xs-12 col-sm-12  col-md-6 sup-txt"><h2>For Support?     Call Us</h2>
                                <div class="call-num">
                                    <h3 class=""><a href="mailto:{{ config('constants.contact_email', 'Support@dragon.com')  }}">
                                    <span class="phone-icon"><i class="fa fa-3x fa-envelope"></i></span>
                                    {{ config('constants.contact_email', 'test@dragon.com')}}</a> </h3>
                                </div>
                            </div>
                            <div class="hidden-xs hidden-sm col-md-2 support">

                                <img src="{{ asset('asset/img/question.png') }}">
                            </div>
                              <div class="col-md-12">
                                <div class="call-num">
                <h3 class=""><a href="tel:{{ Setting::get('contact_number', '')  }}"><span class="phone-icon"><i class="fa fa-3x fa-phone"></i></span> {{ Setting::get('contact_number', '+9197911 01817
                ')  }}</a> </h3>
                                </div>
                            
                         </div>

                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="footer row no-margin">
                        <div class="container-fluid">
                            <div class="row app-dwon pad-60">
                                <div class="container pad-60">
                                    <div class="row center">
                                        <h2>Get the app</h2>
                                        <p class="white">Get passenger and driver apps for Android and iOS for free</p><br>
                                        <div class="">

                                            <div class="col-md-6">
                                                <div class="">
                                                    @if(config('constants.store_link_ios_user') != "")
                                                    <div class="col-md-6">
                                                        <a target="_blank" href="{{config('constants.store_link_ios_user','#')}}">
                                                            <img src="{{asset('asset/img/user-appstore.png')}}">
                                                        </a>
                                                    </div>
                                                    @endif
                                                    
                                                    @if(config('constants.store_link_android_user') != "")
                                                    <div class="col-md-6">
                                                        <a target="_blank" href="{{config('constants.store_link_android_user','#')}}">
                                                            <img src="{{asset('asset/img/user-playstore.png')}}">
                                                        </a>
                                                    </div>
                                                    @endif
                                                </div>  

                                            </div>
                                            <div class="col-md-6">
                                                <div class="">
                                                    @if(config('constants.store_link_ios_provider') != "")
                                                    <div class="col-md-6">
                                                        <a target="_blank" href="{{config('constants.store_link_ios_provider','#')}}">
                                                            <img src="{{asset('asset/img/provider-appstore.png')}}">
                                                        </a>
                                                    </div>
                                                    @endif
                                                    
                                                    @if(config('constants.store_link_android_provider') != "")
                                                    <div class="col-md-6">
                                                        <a target="_blank" href="{{config('constants.store_link_android_provider','#')}}">
                                                            <img src="{{asset('asset/img/provider-playstore.png')}}">
                                                        </a>
                                                    </div>
                                                    @endif
                                                </div>  

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container footer-social content-block pad-60">
                                <div class="row center">
                                    <h2>Siga-nos nas redes sociais</h2>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="socil-media">
                                            <ul>
                                                @if(config('constants.store_facebook_link') != "")
                                                    <li><a target="_blank" href="{{config('constants.store_facebook_link','#')}}"><i class="fa fa-3x fa-facebook"></i></a></li>
                                                @endif
                                                @if(config('constants.store_instagram_link') != "")
                                                    <li><a target="_blank" href="{{config('constants.store_instagram_link','#')}}"><i class="fa fa-3x fa-instagram"></i></a></li>
                                                @endif
                                                @if(config('constants.store_twitter_link') != "")
                                                    <li><a target="_blank" href="{{config('constants.store_twitter_link','#')}}"><i class="fa fa-3x fa-twitter"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="footer-logo row no-margin">
                                <div class="logo-img">
                                    <img src="{{Setting::get('site_logo',asset('asset/img/logo-white.png'))}}">
                                </div>
                            </div>
                            <div class="row no-margin">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                        <li><a href="#">Ride</a></li>
                                        <li><a href="#">Drive</a></li>
                                        <li><a href="#">Cities</a></li>
                                        <li><a href="#">Fare Estimate</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <ul>
                                        <li><a href="{{url('ride')}}">Signup to Ride</a></li>
                                        <li><a href="{{url('drive')}}">Become a Driver</a></li>
                                        <li><a href="{{url('ride')}}">Ride Now</a></li>                            
                                    </ul>
                                </div>
    
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <h5>Get App on</h5>
                                    <ul class="app">
                                        <li>
                                            <a href="{{Setting::get('store_link_ios','#')}}">
                                                <img src="{{asset('asset/img/appstore.png')}}">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{Setting::get('store_link_android','#')}}">
                                                <img src="{{asset('asset/img/playstore.png')}}">
                                            </a>
                                        </li>                                                        
                                    </ul>                        
                                </div>
    
                                <div class="col-md-3 col-sm-3 col-xs-12">                        
                                    <h5>Connect us</h5>
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div> -->

                            <div class="row no-margin">
                                <div class="col-md-12 copy">
                                    <p>{{ config('constants.site_copyright', '&copy; '.date('Y').' Thinkin Cab') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Bem-vindo!</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ config('constants.site_title','Thinkin Cab') }} está disponível na sua cidade</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <script src="{{asset('asset/js/jquery.min.js')}}"></script>
        <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('asset/js/scripts.js')}}"></script>

        <script src="{{asset('assets/js/jquery-3.2.0.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/js/counterup.js')}}"></script>
        <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
        <script src="{{asset('assets/js/theme.js')}}"></script>

        @if(Setting::get('demo_mode', 0) == 1)
        {{--Chat support here--}}
        @endif

        <script>
            var map;

            function initMap() {
                var uluru = {lat: 40.730610, lng: -73.935242};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: {lat: 40.730610, lng: -73.935242}
                });
                var contentString = '<div id="content">' +
                        '<div id="siteNotice">' +
                        '</div>' +
                        '<h4 id="firstHeading" class="firstHeading">Contact Us</h4>' +
                        '<div id="bodyContent">' +
                        '<p>Tamarai Tech Park, 12,16,' +
                        'Jawaharlal Nehru Road,' +
                        'Guindy,' +
                        'Chennai,' +
                        'Tamil Nadu 600032</p>' +
                        '</div>' +
                        '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    title: 'YOUR_TITLE'
                });
                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });
            }
        </script>

        <script type="text/javascript" src="{{ asset('asset/js/map.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7ysJAljkupBFv313yr-zktMOTu4KPtGs&libraries=places&callback=initMap" async defer></script>

        <script type="text/javascript">
            var current_latitude = 40.730610;
            var current_longitude = -73.935242;
        </script>

        <script type="text/javascript">
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, fail);
            } else {
                console.log('Sorry, your browser does not support geolocation services');
                initMap();
            }

            function success(position)
            {
                document.getElementById('long').value = position.coords.longitude;
                document.getElementById('lat').value = position.coords.latitude

                if (position.coords.longitude != "" && position.coords.latitude != "") {
                    current_longitude = position.coords.longitude;
                    current_latitude = position.coords.latitude;
                }
                initMap();
            }

            function fail()
            {
                // Could not obtain location
                console.log('unable to get your location');
                initMap();
            }
        </script> 
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(".hamburger.is-closed").click(function () {
                jQuery("#sidebar-wrapper").toggleClass('active');
            });
        </script>

        @yield('scripts')
    </body>
</html>
