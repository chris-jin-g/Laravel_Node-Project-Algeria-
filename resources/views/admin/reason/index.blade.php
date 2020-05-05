@extends('admin.layout.base')

@section('title', 'Motivos de Cancelamento ')

@section('content')

        <div class="container-fluid">
            
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Simple Table</h4>
                @if(Setting::get('demo_mode', 0) == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : @lang('admin.demomode')
                    </div>
                @endif
                <h5 class="card-title">@lang('admin.reason.title')</h5>
                @can('cancel-reasons-create')
                <a href="{{ route('admin.reason.create') }}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> @lang('admin.reason.add_reason')</a>
                @endcan
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.reason.type') </th>
                            <th>@lang('admin.reason.reason') </th>
                            <th>@lang('admin.reason.status') </th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reasons as $index => $reason)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$reason->type == "PROVIDER" ? "Driver" : "User"}}</td>
                            <td>{{$reason->reason}}</td>
                            <td>
                                @if($reason->status==1)
                                    <span class="tag tag-success">Active</span>
                                @else
                                    <span class="tag tag-danger">In active</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.reason.destroy', $reason->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    @if( Setting::get('demo_mode', 0) == 0)
                                    @can('cancel-reasons-edit')
                                    <a href="{{ route('admin.reason.edit', $reason->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                    @endcan
                                    @can('cancel-reasons-delete')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                                    @endcan
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.reason.type') </th>
                            <th>@lang('admin.reason.reason') </th>
                            <th>@lang('admin.reason.status') </th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection