@extends('fleet.layout.base')

@section('title', 'Dashboard ')

@section('styles')
	<link rel="stylesheet" href="{{asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}">
@endsection

@section('content')

<div class="content-area py-1">
<div class="container-fluid">
    <div class="row row-md">
		<div class="col-lg-3 col-md-6 col-xs-12">
			<div class="box box-block bg-white tile tile-1 mb-2"  style="border-top-color: #f44236 !important;">
                            <div class="t-icon right"><span class="bg-danger" style="background-color: #f44236 !important;"></span><i class="ti-rocket"></i></div>
				<div class="t-content">
					<h6 class="text-uppercase text-primary mb-1">@lang('admin.dashboard.Rides')</h6>
					<h1 class="mb-1">{{$total_rides}}</h1>
<!--					<span class="tag tag-danger mr-0-5">@if($cancel_rides == 0) 0.00 @else {{round($cancel_rides/$rides->count(),2)}}% @endif</span>
					<span class="text-muted font-90">% para baixo do pedido cancelado</span>-->
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-xs-12">
			<div class="box box-block bg-white tile tile-1 mb-2" style="border-top-color: #4bcb73 !important;">
				<div class="t-icon right"><span class="bg-success" style="background-color: #4bcb73 !important;"></span><i class="ti-bar-chart"></i></div>
				<div class="t-content">
					<h6 class="text-uppercase text-primary mb-1">@lang('admin.dashboard.Revenue')</h6>
					<h1 class="mb-1">{{currency($revenue)}}</h1>
					<!--<i class="fa fa-caret-up text-success mr-0-5"></i><span>de {{$rides->count()}} Corridas</span>-->
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-xs-12">
			<div class="box box-block bg-white tile tile-1 mb-2" style="border-top-color: #3e70c9 !important;">
				<div class="t-icon right"><span class="bg-primary" style="background-color: #3e70c9 !important;"></span><i class="ti-money"></i></div>
				<div class="t-content">
					<h6 class="text-uppercase text-primary mb-1">@lang('admin.include.wallet')</h6>
					<h1 class="mb-1">{{currency($wallet)}}</h1>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-xs-12">
			<div class="box box-block bg-white tile tile-1 mb-2" style="border-top-color: #f59345 !important;">
				<div class="t-icon right"><span class="bg-warning" style="background-color: #f59345 !important;"></span><i class="ti-archive"></i></div>
				<div class="t-content">
					<h6 class="text-uppercase text-primary mb-1">@lang('admin.dashboard.cancel_rides')</h6>
					<h1 class="mb-1">{{$cancel_rides}}</h1>
					<!--<i class="fa fa-caret-down text-danger mr-0-5"></i><span>para @if($cancel_rides == 0) 0.00 @else {{round($cancel_rides/$rides->count(),2)}}% @endif Corridas</span>-->
				</div>
			</div>
		</div>
	</div>
	<div class="row row-md">
		<div class="col-lg-3 col-md-6 col-xs-12">
			<div class="box box-block bg-white tile tile-1 mb-2" style="border-top-color: #3e70c9 !important;">
				<div class="t-icon right"><span class="bg-danger" style="background-color: #3e70c9 !important;"></span><i class="ti-user"></i></div>
				<div class="t-content">
					<h6 class="text-uppercase text-primary mb-1">@lang('admin.dashboard.providers')</h6>
					<h1 class="mb-1">{{$providers}}</h1>
					<span class="text-muted font-90">Total</span>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-xs-12">
			<div class="box box-block bg-white tile tile-1 mb-2" style="border-top-color: #3e70c9 !important;">
				<div class="t-icon right"><span class="bg-danger" style="background-color: #3e70c9 !important;"></span><i class="ti-user"></i></div>
				<div class="t-content">
					<h6 class="text-uppercase text-primary mb-1">@lang('admin.dashboard.passengers')</h6>
					<h1 class="mb-1">{{ $passengers }}</h1>
					<span class="text-muted font-90">Total</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row row-md mb-2">
		<div class="col-md-12">
				<div class="box bg-white">
					<div class="box-block clearfix">
						<h5 class="float-xs-left">@lang('admin.dashboard.Recent_Rides')</h5>
						<div class="float-xs-right">
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
						</div>
					</div>
					<table class="table mb-md-0">
						<tbody>
						<?php $diff = ['-success','-info','-warning','-danger']; ?>
						@foreach($rides as $index => $ride)
							<tr>
								<th scope="row">{{$index + 1}}</th>
								<td>{{$ride->user->first_name}} {{$ride->user->last_name}}</td>
								<td>
									<a class="text-primary" href="{{route('fleet.requests.show',$ride->id)}}"><span class="underline">@lang('admin.dashboard.View_Ride_Details')</span></a>
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
										<span class="tag tag-info">VIAGEM INICIADA</span>
									@elseif($ride->status == "DROPPED")
										<span class="tag tag-info">NO DESTINO</span>
									@elseif($ride->status == "PICKEDUP")
										<span class="tag tag-info">INICIANDO</span>
									@elseif($ride->status == "SCHEDULED")
										<span class="tag tag-info">AGENDADA</span>
									@endif
								</td>
							</tr>
							<?php if($index==10) break; ?>
						@endforeach

						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/vendor/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function(){

		        /* Vector Map */
		    $('#world').vectorMap({
		        zoomOnScroll: false,
		        map: 'world_mill',
		        markers: [
		        @foreach($rides as $ride)
		        	@if($ride->status != "CANCELLED")
		            {latLng: [{{$ride->s_latitude}}, {{$ride->s_longitude}}], name: '{{$ride->user->first_name}}'},
		            @endif
		        @endforeach

		        ],
		        normalizeFunction: 'polynomial',
		        backgroundColor: 'transparent',
		        regionsSelectable: true,
		        markersSelectable: true,
		        regionStyle: {
		            initial: {
		                fill: 'rgba(0,0,0,0.15)'
		            },
		            hover: {
		                fill: 'rgba(0,0,0,0.15)',
		            stroke: '#fff'
		            },
		        },
		        markerStyle: {
		            initial: {
		                fill: '#43b968',
		                stroke: '#fff'
		            },
		            hover: {
		                fill: '#3e70c9',
		                stroke: '#fff'
		            }
		        },
		        series: {
		            markers: [{
		                attribute: 'fill',
		                scale: ['#43b968','#a567e2', '#f44236'],
		                values: [200, 300, 600, 1000, 150, 250, 450, 500, 800, 900, 750, 650]
		            },{
		                attribute: 'r',
		                scale: [5, 15],
		                values: [200, 300, 600, 1000, 150, 250, 450, 500, 800, 900, 750, 650]
		            }]
		        }
		    });
		});
	</script>

@endsection
