@extends('admin.layout.base')

@section('title', 'Admin Transactions')

@section('content')

        <div class="container-fluid">
            
            <div class="card">
            <div class="card-header card-header-primary">
                <h5 class="card-title">Total Transactions (@lang('provider.current_balance') : {{currency($wallet_balance)}})</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('admin.sno')</th>
                            <th>@lang('admin.transaction_ref')</th>
                            <th>@lang('admin.datetime')</th>
                            <th>@lang('admin.transaction_desc')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.amount')</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php($page = ($pagination->currentPage-1)*$pagination->perPage)
                       @foreach($wallet_transation as $index=>$wallet)
                       @php($page++)
                            <tr>
                                <td>{{$page}}</td>
                                <td>{{$wallet->transaction_alias}}</td>
                                <td>{{$wallet->created_at->diffForHumans()}}</td>
                                <td>{{$wallet->transaction_desc}}</td>
                                <td>{{$wallet->type == 'C' ? 'Credit' : 'Debit'}}</td>
                                <td>{{currency($wallet->amount)}}
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('common.pagination')
                <p style="color:red;">{{config('constants.booking_prefix', '') }} - Ride Transactions, PSET - Driver Transaction, URC - Passenger Refills</p>
            </div>
            </div>
        </div>
    </div>
@endsection



