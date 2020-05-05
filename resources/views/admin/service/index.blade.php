@extends('admin.layout.base')

@section('title', 'Service Types')

@section('content')
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                @if(Setting::get('demo_mode', 0) == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : @lang('admin.demomode')
                    </div>
                @endif
                <h5 class="card-title">Service Types</h5>
                @can('service-types-create')
                    <a href="{{ route('admin.service.create') }}" style="margin-left: 1em;"
                       class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Service</a>
                @endcan
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Service Name </th>
                        <!-- <th> Provider Name </th> -->
                        <th> Capacity </th>
                        <th> Minimum Rate </th>
                        <th> Base Price </th>
                        <th> Base Distance </th>
                        <th> Price Distance </th>
                        <th> Price Time </th>
                        <th> Price Hour </th>
                        <th> Price Calculation </th>
                        <th> Image </th>
                        <th> Marker Map </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $service->name }}</td>
                            <!-- <td>{{ $service->provider_name }}</td> -->
                                <td>{{ $service->capacity }}</td>
                                <td>{{ currency($service->min_price) }}</td>
                                <td>{{ currency($service->fixed) }}</td>
                                <td>{{ distance($service->distance) }}</td>
                                <td>{{ currency($service->price) }}</td>
                                <td>{{ currency($service->minute) }}</td>
                                @if($service->calculator == 'DISTANCEHOUR' || $service->calculator == 'HOUR')
                                    <td>{{ currency($service->hour) }}</td>
                                @else
                                    <td>N/A</td>
                                @endif
                                <td>@lang('servicetypes.'.$service->calculator)</td>
                                <td>
                                    @if($service->image)
                                        <img src="{{$service->image}}" style="height: 50px" >
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($service->marker)
                                        <img src="{{$service->marker}}" style="height: 50px" >
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        @if( Setting::get('demo_mode', 0) == 0)
                                            @can('service-types-edit')
                                                <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-info btn-block">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            @endcan
                                            @can('service-types-delete')
                                                <button class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            @endcan
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th> ID </th>
                        <th> Service Name </th>
                        <!-- <th> Provider Name </th> -->
                        <th> Capacity </th>
                        <th> Minimum Rate </th>
                        <th> Base Price </th>
                        <th> Base Distance </th>
                        <th> Price Distance </th>
                        <th> Price Time </th>
                        <th> Price Hour </th>
                        <th> Price Calculation </th>
                        <th> Image </th>
                        <th> Marker Map </th>
                        <th> Action </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
