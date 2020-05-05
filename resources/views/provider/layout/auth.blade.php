<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('constants.site_title', 'Thinkin Cab') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}"/>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="full-page-bg" style="background-image: url({{ asset('asset/img/login-bg.jpg') }});">
        <div class="log-overlay"></div>
            <div class="full-page-bg-inner">
                <div class="row no-margin">
                    <div class="col-md-6 log-left">
                        <span class="login-logo"><img src="{{ config('constants.site_logo', asset('logo-black.png')) }}"></span>
                        <h2>{{config('constants.site_title','Thinkin Cab')}} You need partners like you.</h2>
                        <p>Drive with the {{config('constants.site_title','Thinkin Cab')}} and earn a lot of money with independent contractor. Get paid weekly just to help our rider community take city tours. Be your own boss and get paid on fares for driving at your own time.</p>
                    </div>
                    <div class="col-md-6 log-right">
                        <div class="login-box-outer">
                            <div class="login-box row no-margin">
                                @yield('content')
                            </div>
                            <div class="log-copy"><p class="no-margin">{{ config('constants.site_copyright', '&copy; '.date('Y').' Thinkin Cab') }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/scripts.js') }}"></script>

    @yield('scripts')
    
    @if(Setting::get('demo_mode', 0) == 1)
{{--Chat support here--}}
    @endif
</body>
</html>
