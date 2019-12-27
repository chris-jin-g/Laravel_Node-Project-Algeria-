<!--//TODO ALLAN - Alterações débito na máquina e voucher-->
@extends('admin.layout.base')

@section('title', 'Histórico de Viagens ')

@section('content')

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            @if(Setting::get('demo_mode', 0) == 1)
        <div class="col-md-12" style="height:50px;color:red;">
                    ** Demo Mode : @lang('admin.demomode')
                </div>
                @endif
            <h5 class="mb-1">Histórico de Viagens</h5>
            @if(count($requests) != 0)
            <table class="table table-striped table-bordered dataTable" id="table-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.request.Booking_ID')</th>
                        <th>@lang('admin.request.os_id')</th>
                        <th>@lang('admin.request.User_Name')</th>
                        <th>@lang('admin.request.Provider_Name')</th>
                        <th>@lang('admin.request.Date_Time')</th>
                        <th>@lang('admin.status')</th>
                        <th>@lang('admin.amount')</th>
                        <th>@lang('admin.request.Payment_Mode')</th>
                        <th>@lang('admin.request.Payment_Status')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($requests as $index => $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->booking_id }}</td>
                        <td>{{ $request->os_id? $request->os_id:'N/A' }}</td>
                        <td>
                            @if($request->provider)
                                {{ $request->user?$request->user->first_name:'' }} {{ $request->user?$request->user->last_name:'' }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($request->provider)
                                {{ $request->provider?$request->provider->first_name:'' }} {{ $request->provider?$request->provider->last_name:'' }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($request->created_at)
                                <span class="text-muted">{{$request->created_at->diffForHumans()}}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($request->status == "COMPLETED")
                                <span class="tag tag-success">CONCLUÍDA</span>
                            @elseif($request->status == "CANCELLED")
                                <span class="tag tag-danger">CANCELADA</span>
                            @elseif($request->status == "ARRIVED")
                                <span class="tag tag-info">EM ANDAMENTO</span>
                            @elseif($request->status == "SEARCHING")
                                <span class="tag tag-info">PESQUISANDO</span>
                            @elseif($request->status == "ACCEPTED")
                                <span class="tag tag-info">MOTORISTA A CAMINHO</span>
                            @elseif($request->status == "STARTED")
                                <span class="tag tag-info">VIAGEM INICIADA</span>
                            @elseif($request->status == "DROPPED")
                                <span class="tag tag-info">NO DESTINO</span>
                            @elseif($request->status == "PICKEDUP")
                                <span class="tag tag-info">INICIANDO</span>
                            @elseif($request->status == "SCHEDULED")
                                <span class="tag tag-info">AGENDADA</span>
                            @endif
                        </td>
                        <td>
                            @if($request->payment != "")
                                {{ currency($request->payment->total) }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($request->payment_mode == "CASH")
                                DINHEIRO
                            @elseif($request->payment_mode == "DEBIT_MACHINE")
                                DÉBITO MÁQUINA
                            @elseif($request->payment_mode == "VOUCHER")
                                VOUCHER
                            @elseif($request->payment_mode == "CARD")
                                CARTÃO
                            @else
                                $request->payment_mode
                            @endif
                        </td>
                        <td>
                            @if($request->paid)
                                Pago
                            @else
                                Não Pago
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Ação
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.requests.show', $request->id) }}" class="dropdown-item">
                                        <i class="fa fa-search"></i> Mais detalhes
                                    </a>
                                    <form action="{{ route('admin.requests.destroy', $request->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        @if( Setting::get('demo_mode', 0) == 0)
                                        {{ method_field('DELETE') }}
                                        @can('ride-delete')
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-trash"></i> Excluir
                                        </button>
                                        @endcan
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.request.Booking_ID')</th>
                        <th>@lang('admin.request.os_id')</th>
                        <th>@lang('admin.request.User_Name')</th>
                        <th>@lang('admin.request.Provider_Name')</th>
                        <th>@lang('admin.request.Date_Time')</th>
                        <th>@lang('admin.status')</th>
                        <th>@lang('admin.amount')</th>
                        <th>@lang('admin.request.Payment_Mode')</th>
                        <th>@lang('admin.request.Payment_Status')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </tfoot>
            </table>
            @include('common.pagination')
            @else
            <h6 class="no-result">Nenhum resultado encontrado</h6>
            @endif 
        </div>
    </div>
</div>
@endsection