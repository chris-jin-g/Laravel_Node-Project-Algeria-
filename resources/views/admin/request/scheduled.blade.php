@extends('admin.layout.base')

@section('title', 'Scheduled Trips')

@section('content')


        <div class="container-fluid">
            
            <div class="card">
                <div class="card-header card-header-primary">
                    <h5 class="card-title ">Scheduled Trips</h5>
                  </div>
                  <div class="card-body">
                @if(count($requests) != 0)
                <div class="table-responsive">
                <table class="table">
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
                                    Paid
                                @else
                                    Não Paid
                                @endif
                            </td>
                            <td>
                                <div class="input-group-btn">
                                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.requests.show', $request->id) }}" class="btn btn-default"><i class="fa fa-search"></i> More details</a>
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
                </div>
                @else
                    <h6 class="no-result">no results found</h6>
                @endif 
            </div>
            
        </div>
    </div>
@endsection