
<!-- Header -->

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">@yield('title')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placehold="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="nav navbar-nav">
                <li class="nav-item hidden-sm-down">
                    <a class="nav-link toggle-fullscreen" href="#">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav float-md-right">
                <li class="nav-item dropdown hidden-sm-down">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                      </a>
                    <div class="dropdown-menu dropdown-menu-right animated fadeInUp">
                        @can('account-settings')
                        <a class="dropdown-item" href="{{route('admin.profile')}}">
                            <i class="ti-user mr-0-5"></i> @lang('admin.include.profile')
                        </a>
                        @endcan
                        @can('change-password')		
                        <a class="dropdown-item" href="{{route('admin.password')}}">
                            <i class="ti-settings mr-0-5"></i> @lang('admin.account.change_password')
                        </a>
                        @endcan
                        <div class="dropdown-divider"></div>
                        {{-- @can('help')
                        <a class="dropdown-item" href="{{route('admin.help')}}"><i class="ti-help mr-0-5"></i>
                            @lang('admin.help')</a>
                        @endcan  --}}
                        <a class="dropdown-item" href="{{ url('/admin/logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="ti-power-off mr-0-5"></i> @lang('admin.include.sign_out')</a>
                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
          </div>
        </div>
      </nav>

{{-- <div class="site-header">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a class="navbar-brand" href="{{url('admin/dashboard')}}">
                <div class="logo" style="background: url({{ config('constants.site_logo', asset('logo-black.png')) }}) no-repeat;"></div>
            </a>
            <div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
                <span class="hamburger"></span>
            </div>
            <div class="toggle-button-second dark float-xs-right hidden-md-up">
                <i class="ti-arrow-left"></i>
            </div>
            <div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
                <span class="more"></span>
            </div>
        </div>
        <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
            <div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
                <span class="hamburger"></span>
            </div>

           <ul class="nav navbar-nav">
                <li class="nav-item hidden-sm-down">
                    <a class="nav-link toggle-fullscreen" href="#">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav float-md-right">
                <li class="nav-item dropdown hidden-sm-down">
                    <a href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="avatar box-32">
                            <img src="{{img(Auth::guard('admin')->user()->picture)}}" alt="">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated fadeInUp">
                        @can('account-settings')
                        <a class="dropdown-item" href="{{route('admin.profile')}}">
                            <i class="ti-user mr-0-5"></i> @lang('admin.include.profile')
                        </a>
                        @endcan
                        @can('change-password')		
                        <a class="dropdown-item" href="{{route('admin.password')}}">
                            <i class="ti-settings mr-0-5"></i> @lang('admin.account.change_password')
                        </a>
                        @endcan
                        <div class="dropdown-divider"></div>
                        @can('help')
                        <a class="dropdown-item" href="{{route('admin.help')}}"><i class="ti-help mr-0-5"></i>
                            @lang('admin.help')</a>
                        @endcan 
                        <a class="dropdown-item" href="{{ url('/admin/logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="ti-power-off mr-0-5"></i> @lang('admin.include.sign_out')</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</div> --}}