@extends('admin.layout.base')

@section('title', 'Dashboard ')

@section('styles')
    <link rel="stylesheet" href="{{asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}">
@endsection

@section('content')
    
    <div class="content-area py-1">
        
        <div class="col-md-12">
            <div class="box bg-white">
                <div class="box-block clearfix">
                    <h5 class="float-xs-left">Filtrar Franquia</h5>
                    <div class="float-xs-right">
                        <button class="btn btn-link btn-sm text-muted" type="button"><i
                                    class="ti-close"></i></button>
                    </div>
                </div>

                <div class="row" style="padding: 0 15px 20px 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            @if (!is_null($fleetCities))
                                <select class="form-control col-md-6" name="" id="city">
                                    <option value="">Selecione a Cidade</option>

                                        @foreach($fleetCities as $index => $cidade)
                                            <option value="{{$cidade->city_id}}"{{ Request::has('city')&&Request::get('city')==$cidade->city_id? ' selected':'' }}>{{$cidade->city_name}} - {{$cidade->estate_name}}</option>
                                        @endforeach

                                </select>
                            @else
                                <p>Nehuma franquia cadastrada</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row row-md">
                @can('dashboard-menus')
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-danger tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-danger"></span><i class="fa fa-cab"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.Rides')</h6>
                                <h1 class="mb-1">
                                    @if (!is_null($totalRides))
                                        {{$totalRides}}
                                    @endif
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-success tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-success"></span><i class="fa fa-dollar"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.Revenue')</h6>
                                <h1 class="mb-1">{{currency($revenue)}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-primary tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-primary"></span><i class="fa fa-users"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.passengers')</h6>
                                <h1 class="mb-1">{{$users}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-success tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-success"></span><i class="fa fa-calendar"></i>
                            </div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.scheduled')</h6>
                                <h1 class="mb-1">{{$scheduled_rides}}</h1>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
            <div class="row row-md">
                @can('dashboard-menus')
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-primary tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-primary"></span><i class="fa fa-times"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.cancel_count')</h6>
                                <h1 class="mb-1">{{$user_cancelled}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-danger tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-danger"></span><i class="fa fa-times"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.provider_cancel_count')</h6>
                                <h1 class="mb-1">{{$provider_cancelled}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-success tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-success"></span><i class="fa fa-user"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.providers')</h6>
                                <h1 class="mb-1">{{$provider}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-warning tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-warning"></span><i class="fa fa-users"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">@lang('admin.dashboard.fleets')</h6>
                                <h1 class="mb-1">{{$fleet}}</h1>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>

            <div class="row row-md mb-2">
                @can('wallet-summary')
                    <div class="col-md-4">
                        <div class="box bg-white">
                            <div class="box-block clearfix">
                                <h5 class="float-xs-left">@lang('admin.dashboard.wallet_summary')</h5>
                                <div class="float-xs-right">
                                </div>
                            </div>
                            <table class="table mb-md-0">
                                <tbody>
                                @php($total=$wallet['admin'])
                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_admin_credit')</th>
                                    <td class="text-success">{{currency($wallet['admin'])}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_provider_credit')</th>
                                    @if($wallet['provider_credit'])
                                        @php($total=$total-$wallet['provider_credit'][0]['total_credit'])
                                        <td class="text-success">{{currency($wallet['provider_credit'][0]['total_credit'])}}</td>
                                    @else
                                        <td class="text-success">{{currency()}}</td>
                                    @endif
                                </tr>

                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_provider_debit')</th>
                                    @if($wallet['provider_debit'])

                                        <td class="text-danger">{{currency($wallet['provider_debit'][0]['total_debit'])}}</td>
                                    @else
                                        <td class="text-danger">{{currency()}}</td>
                                    @endif
                                </tr>

                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_fleet_credit')</th>
                                    @if($wallet['fleet_credit'])
                                        @php($total=$total-($wallet['fleet_credit'][0]['total_credit']))
                                        <td class="text-success">{{currency($wallet['fleet_credit'][0]['total_credit'])}}</td>
                                    @else
                                        <td class="text-success">{{currency()}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_fleet_debit')</th>
                                    @if($wallet['fleet_debit'])
                                        <td class="text-danger">{{currency($wallet['fleet_debit'][0]['total_debit'])}}</td>
                                    @else
                                        <td class="text-danger">{{currency()}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_commission')</th>
                                    <td class="text-success">{{currency($wallet['admin_commission'])}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_peak_commission')</th>
                                    <td class="text-success">{{currency($wallet['peak_commission'])}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_waitining_commission')</th>
                                    <td class="text-success">{{currency($wallet['waiting_commission'])}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_discount')</th>
                                    <td class="text-danger">{{currency($wallet['admin_discount'])}}</td>
                                </tr>
                                <tr>
                                    @php($total=$total-($wallet['admin_tax']))
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_tax_amount')</th>
                                    <td class="text-success">{{currency($wallet['admin_tax'])}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_tips')</th>
                                    <td class="text-danger">{{currency($wallet['tips'])}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_referrals')</th>
                                    <td class="text-danger">{{currency($wallet['admin_referral'])}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">@lang('admin.dashboard.wallet_summary_disputes')</th>
                                    <td class="text-danger">{{currency($wallet['admin_dispute'])}}</td>
                                </tr>

                                <!--                             <tr>
                                <th scope="row text-right">@lang('admin.dashboard.wallet_summary_total')</th>
                                <td>{{currency($total)}}</td>
                            </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endcan
                @can('recent-rides')
                    <div class="col-md-8">
                        <div class="box bg-white">
                            <div class="box-block clearfix">
                                <h5 class="float-xs-left">@lang('admin.dashboard.Recent_Rides')</h5>
                                <div class="float-xs-right">
                                    <button class="btn btn-link btn-sm text-muted" type="button"><i
                                                class="ti-close"></i></button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table mb-md-0">
                                        <tbody>
                                        @if (is_null($rides))
                                            <tr>
                                                <th>Selecione uma cidade</th>
                                            </tr>
                                        @else
                                            @foreach($rides as $index => $ride)
                                                <tr>
                                                    <th scope="row">{{$index + 1}}</th>
                                                    <td>{{$ride->user->first_name}} {{$ride->user->last_name}}</td>
                                                    <td>
                                                        <a class="text-primary"
                                                           href="{{route('admin.requests.show',$ride->id)}}"><span
                                                                    class="underline">@lang('admin.dashboard.View_Ride_Details')</span></a>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted">{{$ride->created_at->diffForHumans()}}</span>
                                                    </td>
                                                    <td>
                                                        @if($ride->status == "COMPLETED")
                                                            <span class="tag tag-success">CONCLUÍDA</span>
                                                        @elseif($ride->status == "CANCELLED")
                                                            <span class="tag tag-danger">CANCELADA</span>
                                                        @elseif($ride->status == "ARRIVED")
                                                            <span class="tag tag-info">EM ANDAMENTO</span>
                                                        @elseif($ride->status == "SEARCHING")
                                                            <span class="tag tag-info">PESQUISANDO</span>
                                                        @elseif($ride->status == "ACCEPTED")
                                                            <span class="tag tag-info">MOTORISTA A CAMINHO</span>
                                                        @elseif($ride->status == "STARTED")
                                                            <span class="tag tag-info">VIAGEM ACEITA</span>
                                                        @elseif($ride->status == "DROPPED")
                                                            <span class="tag tag-info">NO DESTINO</span>
                                                        @elseif($ride->status == "PICKEDUP")
                                                            <span class="tag tag-info">INICIADA</span>
                                                        @elseif($ride->status == "SCHEDULED")
                                                            <span class="tag tag-info">AGENDADA</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>

        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">

        var _registration = null;
        var rota = "{{ route('admin.dashboard') }}";

        $('#city').on("change", function () {
            if($(this).val() === ""){
                window.location.href = rota;
            }else{
               window.location.href = rota + "?city="+$(this).val(); 
            }
           
        });

        function registerServiceWorker() {
            return navigator.serviceWorker.register("{{ asset('js/service-worker.js') }}")
                .then(function (registration) {
                    _registration = registration;
                    return registration;
                })
                .catch(function (err) {
                    console.error('Unable to register service worker.', err);
                });
        }

        function askPermission() {
            return new Promise(function (resolve, reject) {
                const permissionResult = Notification.requestPermission(function (result) {
                    resolve(result);
                });

                if (permissionResult) {
                    permissionResult.then(resolve, reject);
                }
            })
                .then(function (permissionResult) {
                    if (permissionResult !== 'granted') {
                        throw new Error('We weren\'t granted permission.');
                    } else {
                        subscribeUserToPush();
                    }
                });
        }

        function urlBase64ToUint8Array(base64String) {
            const padding = '='.repeat((4 - base64String.length % 4) % 4);
            const base64 = (base64String + padding)
                .replace(/\-/g, '+')
                .replace(/_/g, '/');

            const rawData = window.atob(base64);
            //const rawData = new Blob([base64], {type: 'text/plain'})
            const outputArray = new Uint8Array(rawData.length);

            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        }

        function getSWRegistration() {
            return new Promise(function (resolve, reject) {
                if (_registration != null) {
                    resolve(_registration);
                } else {
                    reject(Error("It broke"));
                }
            });
        }

        function subscribeUserToPush() {
            getSWRegistration()
                .then(function (registration) {
                    const subscribeOptions = {
                        userVisibleOnly: true,
                        applicationServerKey: urlBase64ToUint8Array('BCBsViMBVOOYATOaY4AjZOl1XCwiBqXbQtMcp4RXRmyfR927SqcCUt2SYwiF3iy3yxf3n60jVf8XF9vDE2ShVtM')
                    };
                    return registration.pushManager.subscribe(subscribeOptions);

                })
                .then(function (pushSubscription) {
                    sendSubscriptionToBackEnd(pushSubscription);
                    return pushSubscription;
                });
        }

        function sendSubscriptionToBackEnd(subscription) {
            $.ajax({
                url: "/save-subscription/{{Auth::user()->id}}/admin",
                headers: {'Content-Type': 'application/json'},
                type: 'post',
                data: JSON.stringify(subscription),
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                }
            });
        }


        registerServiceWorker();

        askPermission();

    </script>

@endsection
