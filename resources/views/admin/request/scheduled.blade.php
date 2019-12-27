@extends('admin.layout.base')

@section('title', 'Viagens Agendadas ')

@section('content')

    <div class="content-area py-1">
        <div class="container-fluid">
            
            <div class="box box-block bg-white">
                <h5 class="mb-1">Viagens Agendadas</h5>
                @if(count($requests) != 0)
                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.request.Request_Id')</th>
                            <th>@lang('admin.request.User_Name')</th>
                            <th>@lang('admin.request.Provider_Name')</th>
                            <th>@lang('admin.request.Scheduled_Date_Time')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.request.Payment_Mode')</th>
                            <th>@lang('admin.request.Payment_Status')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $index => $request)
                        <tr>
                            <td>{{$index + 1}}</td>

                            <td>{{$request->id}}</td>
                            <td>{{$request->user?$request->user->first_name:''}} {{$request->user?$request->user->last_name:''}}</td>
                            <td>
                                @if($request->provider_id)
                                    {{$request->provider?$request->provider->first_name:''}} {{$request->provider?$request->provider->last_name:''}}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$request->schedule_at}}</td>
                            <td>
                                @if($request->status == "COMPLETED")
                                <span class="tag tag-success">CONCLUÍDA</span>
                                @elseif($request->status == "CANCELLED")
                                <span class="tag tag-danger">CANCELADA</span>
                                @else
                                <span class="tag tag-info">{{$request->status}}</span>
                                @endif
                            </td>

                            <td>{{$request->payment_mode}}</td>
                            <td>
                                @if($request->paid)
                                    Pago
                                @else
                                    Não Pago
                                @endif
                            </td>
                            <td>
                                <div class="input-group-btn">
                                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Ação
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.requests.show', $request->id) }}" class="btn btn-default"><i class="fa fa-search"></i> Mais detalhes</a>
                                    </li>
                                  </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.request.Request_Id')</th>
                            <th>@lang('admin.request.User_Name')</th>
                            <th>@lang('admin.request.Provider_Name')</th>
                            <th>@lang('admin.request.Scheduled_Date_Time')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.request.Payment_Mode')</th>
                            <th>@lang('admin.request.Payment_Status')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
                @else
                    <h6 class="no-result">Nenhum resultado encontrado</h6>
                @endif 
            </div>
            
        </div>
    </div>
@endsection