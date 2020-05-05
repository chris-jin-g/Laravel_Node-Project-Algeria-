
<!-- // TODO ALLAN - Machine and voucher changes -->
@extends('admin.layout.base')

@section('title', 'Request History')

@section('content')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            @if(Setting::get('demo_mode', 0) == 1)
        <div class="col-md-12" style="height:50px;color:red;">
                    ** Demo Mode : @lang('admin.demomode')
                </div>
                @endif
            <h5 class="card-title">Request History</h5>
        </div>
        <div class="card-body">
            @if(count($requests) != 0)
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.request.Booking_ID')</th>
                        {{-- <th>@lang('admin.request.os_id')</th> --}}
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
                                <span class="tag tag-success">COMPLETED</span>
                            @elseif($request->status == "CANCELLED")
                                <span class="tag tag-danger">CANCELLED</span>
                            @elseif($request->status == "ARRIVED")
                                <span class="tag tag-info">ARRIVED</span>
                            @elseif($request->status == "SEARCHING")
                                <span class="tag tag-info">SEARCHING</span>
                            @elseif($request->status == "ACCEPTED")
                                <span class="tag tag-info">ACCEPTED</span>
                            @elseif($request->status == "STARTED")
                                <span class="tag tag-info">STARTED</span>
                            @elseif($request->status == "DROPPED")
                                <span class="tag tag-info">DROPPED</span>
                            @elseif($request->status == "PICKEDUP")
                                <span class="tag tag-info">PICKEDUP</span>
                            @elseif($request->status == "SCHEDULED")
                                <span class="tag tag-info">SCHEDULED</span>
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
                                Paid
                            @else
                                Não Paid
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.requests.show', $request->id) }}" class="dropdown-item">
                                        <i class="fa fa-search"></i> More details
                                    </a>
                                    <form action="{{ route('admin.requests.destroy', $request->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        @if( Setting::get('demo_mode', 0) == 0)
                                        {{ method_field('DELETE') }}
                                        @can('ride-delete')
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-trash"></i> Delete
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
            <h6 class="no-result">no results found</h6>
            @endif 
        </div>
    </div>
</div>
    </div>
@endsection