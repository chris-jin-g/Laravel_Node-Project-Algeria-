@extends('fleet.layout.base')

@section('title', 'Histórico de Solicitações ')

@section('content')

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">Histórico de Solicitaçõe</h5>
            @if(count($requests) != 0)
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th>@lang('admin.request.Booking_ID')</th>
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
                        <td>{{ $request->booking_id }}</td>
                        <td>{{ $request->user->first_name }} {{ $request->user->last_name }}</td>
                        <td>
                            @if($request->provider)
                                {{ $request->provider->first_name }} {{ $request->provider->last_name }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{$request->created_at->diffForHumans()}}</td>
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
                                    <a href="{{ route('fleet.requests.show', $request->id) }}" class="dropdown-item">
                                        <i class="fa fa-search"></i> Mais detalhes
                                    </a>
                                    @if( Setting::get('demo_mode', 0) == 0)
                                        <form action="{{ route('fleet.requests.destroy', $request->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="dropdown-item">
                                                <i class="fa fa-trash"></i> Excluir
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('admin.request.Booking_ID')</th>
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
            @else
            <h6 class="no-result">No results found</h6>
            @endif 
        </div>
    </div>
</div>
@endsection