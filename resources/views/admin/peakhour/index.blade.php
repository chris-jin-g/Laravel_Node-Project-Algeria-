@extends('admin.layout.base')

@section('title', __('admin.peakhour.title'))

@section('content')

    <div>
        <div class="container-fluid">
            
            <div class="card">
                <div class="card-header card-header-primary">
                @if(Setting::get('demo_mode', 0) == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : @lang('admin.demomode')
                    </div>
                @endif
                <h5 class="card-title">@lang('admin.peakhour.title')</h5>
                @can('promocodes-create')
                <a href="{{ route('admin.peakhour.create') }}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> @lang('admin.peakhour.add_time')</a>
                @endcan
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.peakhour.start_time') </th>
                            <th>@lang('admin.peakhour.end_time') </th>                           
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($peakhour as $index => $peak)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ date('h:i A', strtotime($peak->start_time)) }}</td>
                            <td>{{ date('h:i A', strtotime($peak->end_time)) }} </td>
                           
                            <td>
                                <form action="{{ route('admin.peakhour.destroy', $peak->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    @if( Setting::get('demo_mode', 0) == 0)
                                    @can('peak-hour-edit')
                                    <a href="{{ route('admin.peakhour.edit', $peak->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                    @endcan
                                    @can('peak-hour-delete')
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
                            <th>@lang('admin.peakhour.start_time') </th>
                            <th>@lang('admin.peakhour.end_time') </th>                           
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
@endsection