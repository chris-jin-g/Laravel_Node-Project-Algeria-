<div class="sidebar" data-color="{{config('constants.nav_skin', 'azure')}}" data-background-color="black"
    data-image="{{asset('/asets/img/sidebar-2.jpg')}}">
    <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
  
          Tip 2: you can also add an image using data-image tag
      -->
    <div class="logo" style="background: url({{ config('constants.site_logo', asset('logo-black.png')) }}) no-repeat;">
        <a href="{{url('admin/dashboard')}}" class="simple-text logo-normal">

        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @role('ADMIN|ACCOUNT')
            <li class="nav-item {{ Request::segment(2) === 'dashboard' ? 'active' : null }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fa fa-tachometer"></i>
                    <p>@lang('admin.include.dashboard')</p>
                </a>
            </li>
            @endrole

            @can('dispatcher-panel')
            <li class="nav-item {{ Request::segment(2) === 'dispatcher' ? 'active' : null }}">
                <a href="{{ route('admin.dispatcher.index') }}" class="nav-link">
                    <i class="fa fa-transgender-alt"></i>
                    <p>@lang('admin.include.dispatcher_panel')</p>
                </a>
            </li>
            @endcan
            @can('dispute-list')
            <li class="nav-item {{ Request::segment(2) === 'dispute' ? 'active' : null }}">
                <a href="{{ route('admin.dispute.index') }}" class="nav-link">
                    <i class="ti-write"></i>
                    <p>@lang('admin.include.dispute_type')</p>
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2) === 'disputeusers' ? 'active' : null }}">
                <a href="{{ route('admin.userdisputes') }}" class="nav-link">
                    <i class="ti-write"></i>
                    <p>@lang('admin.include.dispute_request')</p>
                </a>
            </li>

            @endcan
            @can('heat-map')
            <li class="nav-item {{ Request::segment(2) === 'map' ? 'active' : null }}">
                <a href="{{ route('admin.map.index') }}" class="nav-link">
                    <i class="ti-map-alt"></i>
                    <p>@lang('admin.include.map')</p>
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2) === 'heatmap' ? 'active' : null }}">
                <a href="{{ route('admin.heatmap') }}" class="nav-link">
                    <i class="ti-map"></i>
                    <p>@lang('admin.include.heat_map')</p>
                </a>
            </li>
            @endcan
            @can('god-eye')
            <li class="nav-item {{ Request::segment(2) === 'godseye' ? 'active' : null }}">
                <a href="{{ route('admin.godseye') }}" class="nav-link">
                    <i class="fa fa-eye"></i>
                    <p>@lang('admin.heatmap.godseye')</p>
                </a>
            </li>
            @endcan
            {{-- @endrole --}}
            @role('ADMIN')
            @can('role-list')
                @can('role-list')
                <li class="nav-item {{ Request::segment(2) === 'role' ? 'active' : null }}">
                    <a href="{{ route('admin.role.index') }}" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>@lang('admin.include.role_types')</p>
                    </a>
                </li>

                @endcan
                @can('sub-admin-list')
                <li class="nav-item {{ Request::segment(2) === 'sub-admins' ? 'active' : null }}">
                    <a href="{{ route('admin.sub-admins.index') }}" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>@lang('admin.include.sub_admins')</p>
                    </a>
                </li>
                @endcan

            @endcan
            @can('user-list')
            <li class="nav-item {{ Request::segment(2) === 'user' ? 'active' : null }}">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="fa fa-user"></i>
                    <p>@lang('admin.include.users')</p>
                </a>
            </li>
            @endcan
            @can('provider-list')
            <li class="nav-item {{ Request::segment(2) === 'provider' ? 'active' : null }}">
                <a href="{{ route('admin.provider.index') }}" class="nav-link">
                    <i class="fa fa-server"></i>
                    <p>@lang('admin.include.providers')</p>
                </a>
            </li>
            @endcan
            
            @can('dispatcher-list')
            <li class="nav-item {{ Request::segment(2) === 'dispatch-manager' ? 'active' : null }}">
                <a href="{{ route('admin.dispatch-manager.index') }}" class="nav-link">
                    <i class="fa fa-share-square-o"></i>
                    <p>@lang('admin.include.dispatcher')</p>
                </a>
            </li>
            @endcan
            @can('account-manager-list')
            <li class="nav-item {{ Request::segment(2) === 'account-manager' ? 'active' : null }}">
                <a href="{{ route('admin.account-manager.index') }}" class="nav-link">
                    <i class="fa fa-user-circle"></i>
                    <p>@lang('admin.include.account_manager')</p>
                </a>
            </li>
            @endcan
            @can('dispute-manager-list')
            <li class="nav-item {{ Request::segment(2) === 'dispute_manager' ? 'active' : null }}">
                <a href="{{ route('admin.account-manager.index') }}" class="nav-link">
                    <i class="fa fa-user-circle"></i>
                    <p>@lang('admin.include.dispute_manager')</p>
                </a>
            </li>
            @endcan
            @endrole
            @role('ADMIN')
            @can('statements')
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown {{ Request::segment(2) === 'statement' ? 'active' : null }} {{ Request::segment(2) === 'transactions' ? 'active' : null }}">

                    <a class="nav-link" href="#" data-toggle="dropdown">
                        <i class="fa fa-book"></i>
                        <p>@lang('admin.include.statements')</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu animated">
                        <a class="dropdown-item {{ Request::segment(2) === 'statement' ? 'active' : null }}"
                            href="{{ route('admin.ride.statement') }}">@lang('admin.include.overall_ride_statments')</a>

                        
                        <a class="dropdown-item {{ Request::segment(2) === 'statement' ? 'active' : null }}"
                            href="{{ route('admin.ride.statement.provider') }}">@lang('admin.include.provider_statement')</a>

                        
                        <a class="dropdown-item {{ Request::segment(2) === 'statement' ? 'active' : null }}"
                            href="{{ route('admin.ride.statement.user') }}">@lang('admin.include.user_statement')</a>

                        <a class="dropdown-item {{ Request::segment(2) === 'transactions' ? 'active' : null }}"
                        href="{{ route('admin.providertransfer') }}">@lang('admin.include.provider_request')</a>

                        <a class="dropdown-item {{ Request::segment(2) === 'transactions' ? 'active' : null }}"
                        href="{{ route('admin.transactions') }}">@lang('admin.include.all_transaction')</a>
                        
                        <!-- <a class="dropdown-item href="{{ route('admin.ride.statement.today') }}">@lang('admin.include.daily_statement')</a>
                            <a class="dropdown-item" href="{{ route('admin.ride.statement.monthly') }}">@lang('admin.include.monthly_statement')</a>
                            <a class="dropdown-item" href="{{ route('admin.ride.statement.yearly') }}">@lang('admin.include.yearly_statement')</a> -->
                    </div>
                </li>
            </ul>
            @endcan
            @endrole
            @role('ADMIN')
            @can('ratings')
            <li class="nav-item {{ Request::segment(3) === 'user' ? 'active' : null }}">
                <a href="{{ route('admin.user.review') }}" class="nav-link">
                    <i class="fa fa-star-o"></i>
                    <p>@lang('admin.include.user_ratings')</p>
                </a>
            </li>

            <li class="nav-item {{ Request::segment(3) === 'provider' ? 'active' : null }}">
                <a href="{{ route('admin.provider.review') }}" class="nav-link">
                    <i class="fa fa-star-o"></i>
                    <p>@lang('admin.include.provider_ratings')</p>
                </a>
            </li>
            @endcan
            @endrole
            @role('ADMIN')
            @can('ride-history')
            <li class="nav-item {{ Request::segment(2) === 'dispatcher' ? 'active' : null }}">
                <a href="{{ route('admin.requests.index') }}" class="nav-link">
                    <i class="fa fa-history"></i>
                    <p>@lang('admin.include.ride_history')</p>
                </a>
            </li>
            @endcan
            @can('schedule-rides')
                <li class="nav-item {{ Request::segment(2) === 'scheduled' ? 'active' : null }}">
                    <a href="{{ route('admin.requests.scheduled') }}" class="nav-link">
                        <i class="ti-palette"></i>
                        <p>@lang('admin.include.scheduled_rides')</p>
                    </a>
                </li>
            @endcan
            @endrole
            @role('ADMIN')
            @can('promocodes-list')
            <li class="nav-item {{ Request::segment(2) === 'promocode' ? 'active' : null }}">
                <a href="{{ route('admin.promocode.index') }}" class="nav-link">
                    <i class="fa fa-history"></i>
                    <p>@lang('admin.include.promocodes')</p>
                </a>
            </li>
            @endcan
            @endrole
            @role('ADMIN')
            @can('service-types-list')
            <li class="nav-item {{ Request::segment(2) === 'service' ? 'active' : null }}">
                <a href="{{ route('admin.service.index') }}" class="nav-link">
                    <i class="fa fa-taxi"></i>
                    <p>@lang('admin.include.service_types')</p>
                </a>
            </li>
            @endcan
            @can('peak-hour-list')
                <li class="nav-item {{ Request::segment(2) === 'peakhour' ? 'active' : null }}">
                    <a href="{{ route('admin.peakhour.index') }}" class="nav-link">
                        <i class="fa fa-clock"></i>
                        <p>@lang('admin.include.peakhour')</p>
                    </a>
                </li>
            @endcan
            @can('documents-list')
                @can('documents-list')
                <li class="nav-item {{ Request::segment(2) === 'document' ? 'active' : null }}">
                    <a href="{{ route('admin.document.index') }}" class="nav-link">
                        <i class="fa fa-file-text"></i>
                        <p>@lang('admin.include.documents')</p>
                    </a>
                </li>
                @endcan
            @endcan

                @can('notification-list')
                
                    @can('notification-list')
                    <li class="nav-item {{ Request::segment(2) === 'notification' ? 'active' : null }}">
                        <a href="{{ route('admin.notification.index') }}" class="nav-link">
                            <i class="fa fa-user"></i>
                            <p>@lang('admin.include.notify')</p>
                        </a>
                    </li>
                    @endcan
                
                @endcan
                    @can('cancel-reasons-list')
                    
                        @can('cancel-reasons-list')
                        <li class="nav-item {{ Request::segment(2) === 'reason' ? 'active' : null }}">
                            <a href="{{ route('admin.reason.index') }}" class="nav-link">
                                <i class="fa fa-user"></i>
                                <p>@lang('admin.include.reason')</p>
                            </a>
                        </li>
                        @endcan
                    @endcan
                    @endrole
                        @role('ADMIN')
                        @can('payment-history')
                        <li class="nav-item {{ Request::segment(2) === 'payment' ? 'active' : null }}">
                            <a href="{{ route('admin.payment') }}" class="nav-link">
                                <i class="fa fa-money"></i>
                                <p>@lang('admin.include.payment_history')</p>
                            </a>
                        </li>
                        @endcan
                        @can('payment-settings')
                        <li class="nav-item {{ Request::segment(2) === 'settings' ? 'active' : null }}">
                            <a href="{{ route('admin.settings.payment') }}" class="nav-link">
                                <i class="fa fa-credit-card"></i>
                                <p>@lang('admin.include.payment_settings')</p>
                            </a>
                        </li>
                        @endcan
                        @can('site-settings')
                        <li class="nav-item {{ Request::segment(2) === 'site' ? 'active' : null }}">
                            <a href="{{ route('admin.settings') }}" class="nav-link">
                                <i class="fa fa-tools"></i>
                                <p>@lang('admin.include.site_settings')</p>
                            </a>
                        </li>
                        @endcan
                        @endrole
                        @role('ADMIN')
                        @can('cms-pages')
                        <li class="nav-item {{ Request::segment(2) === 'pages' ? 'active' : null }}">
                            <a href="{{ route('admin.cmspages') }}" class="nav-link">
                                <i class="ti-file"></i>
                                <p>@lang('admin.include.cms_pages')</p>
                            </a>
                        </li>
                        @endcan
                        @can('custom-push')
                        <li class="nav-item {{ Request::segment(2) === 'send' ? 'active' : null }}">
                            <a href="{{ route('admin.push') }}" class="nav-link">
                                <i class="fa fa-bullhorn"></i>
                                <p>@lang('admin.include.custom_push')</p>
                            </a>
                        </li>
                        @endcan
                        @can('transalations')
                            @endcan
                        @can('lost-item-list')
                        <li class="nav-item {{ Request::segment(2) === 'lostitem' ? 'active' : null }}">
                            <a href="{{ route('admin.lostitem.index') }}" class="nav-link">
                                <i class="ti-write"></i>
                                <p>@lang('admin.include.lostitem')</p>
                            </a>
                        </li>
                        @endcan
                        @endrole
                        @role('ADMIN')
                        @can('account-settings')
                        <li class="nav-item {{ Request::segment(2) === 'profile' ? 'active' : null }}">
                            <a href="{{ route('admin.profile') }}" class="nav-link">
                                <i class="fa fa-user"></i>
                                <p>@lang('admin.include.account_settings')</p>
                            </a>
                        </li>
                        @endcan
                        @can('change-password')
                        <li class="nav-item {{ Request::segment(2) === 'password' ? 'active' : null }}">
                            <a href="{{ route('admin.password') }}" class="nav-link">
                                <i class="fa fa-key"></i>
                                <p>@lang('admin.include.change_password')</p>
                            </a>
                        </li>
                        @endcan
                        @endrole
                    </ul>
    </div>
</div>