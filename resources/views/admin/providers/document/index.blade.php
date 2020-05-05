@extends('admin.layout.base')

@section('title', 'Documentos do Motorista ')

@section('content')
<!-- Alterado por Allan -->

    <div class="container-fluid">
        @can('provider-services')
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">@lang('admin.provides.type_allocation')</h4>
                <h5>Driver: <b>{{ $Provider->first_name }} {{ $Provider->last_name }}</b> </h5>
                @can('provider-status')
                @if($Provider->status == 'approved')
                <a style="margin-left: 1em;margin-top: -30px" class="btn btn-danger pull-right"
                    href="{{ route('admin.provider.disapprove', $Provider->id ) }}"><i class="fa fa-power-off"></i>
                    Disable Driver</a>
                @else
                <a style="margin-left: 1em;margin-top: -30px" class="btn btn-success pull-right"
                    href="{{ route('admin.provider.approve', $Provider->id ) }}"><i class="fa fa-check"></i> Approve
                    Driver</a>
                @endcan
                @endif
                <a href="{{$backurl}}" style="margin-left: 1em;margin-top: -30px" class="btn btn-primary pull-right"><i
                        class="fa fa-arrow-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
                
                    @if($ProviderService->count() > 0)
                    <h6>Attributed Services: </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>@lang('admin.provides.service_name')</th>
                                    <th>@lang('admin.provides.service_number')</th>
                                    <th>@lang('admin.provides.service_model')</th>
                                    <th>@lang('admin.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ProviderService as $service)
                                <tr>
                                    <td>{{ $service->service_type->name }}
                                    </td>
                                    <td>{{ $service->service_number }}</td>
                                    <td>{{ $service->service_model }}</td>
                                    <td>
                                        @if( Setting::get('demo_mode', 0) == 0)
                                        <form
                                            action="{{ route('admin.provider.document.service', [$Provider->id, $service->id]) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @can('provider-service-delete')
                                            <button
                                                class="btn btn-danger btn-large btn-block">@lang('admin.delete')</a>@endcan
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>@lang('admin.provides.service_name')</th>
                                    <th>@lang('admin.provides.service_number')</th>
                                    <th>@lang('admin.provides.service_model')</th>
                                    <th>@lang('admin.action')</th>
                                </tr>
                            </tfoot>
                        </table>
                        @endif
                    </div>


                @if($ProviderService->count() >= 1)
                
                    <h3 class="card-title">Update Service</h3>
                
                <form action="{{ route('admin.provider.document.store', $Provider->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" required name="method" value="update">
                    <div class="row">
                        <div class="col-md-3">
                        <div class="from-group">
                            <label for="service_type" class="bmd-label-floating">Service Type</label>
                            <select class="form-control" name="service_type" required>
                                @forelse($ServiceTypes as $Type)
                                <option value="{{ $Type->id }}"> {{ $Type->name }}</option>
                                @empty
                                <option>- @lang('admin.service_select') -</option>
                                @endforelse
                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label for="service_number" class="bmd-label-floating">Vehicle Number</label>
                                <input class="form-control" type="text" value="" name="service_number" required id="service_number">
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label for="service_model" class="bmd-label-floating">Vehicle Model</label>
                                <input class="form-control" type="text" value="" name="service_model" required id="service_model">
                            </div>
                        </div>
                        @if( Setting::get('demo_mode', 0) == 0)
                        <div class="col-md-3">
                        <div class="form-group">
                            @can('provider-service-update')<button class="btn btn-primary btn-block"
                                type="submit">Update</button>@endcan
                        </div>
                        </div>
                    </div>
                    @endif
                </form>
                @endif

                
                    <h3 class="card-title">Add Service</h3>
                
                    <form action="{{ route('admin.provider.document.store', $Provider->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" required name="method" value="create">
                        <div class="row">
                            <div class="col-md-3">
                            <div class="from-group">
                                <label for="service_type" class="bmd-label-floating">Service Type</label>
                                <select class="form-control" name="service_type" required>
                                    @forelse($ServiceTypes as $Type)
                                    <option value="{{ $Type->id }}"> {{ $Type->name }}</option>
                                    @empty
                                    <option>- @lang('admin.service_select') -</option>
                                    @endforelse
                                </select>
                            </div>
                            </div>
                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="service_number" class="bmd-label-floating">Vehicle Number</label>
                                    <input class="form-control" type="text" value="" name="service_number" required id="service_number">
                                </div>
                            </div>
                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="service_model" class="bmd-label-floating">Vehicle Model</label>
                                    <input class="form-control" type="text" value="" name="service_model" required id="service_model">
                                </div>
                            </div>
                            @if( Setting::get('demo_mode', 0) == 0)
                            <div class="col-md-3">
                            <div class="form-group">
                                @can('provider-service-update')<button class="btn btn-success"
                                    type="submit">Add</button>@endcan
                            </div>
                            </div>
                        </div>
                        @endif
                    </form>

            </div>
        </div>
        @endcan


        
        @can('provider-documents')
        <div class="card">
            <div class="card-header card-header-primary">
                <h5 class="card-title">
                    @lang('admin.provides.provider_documents')<br>
                    @can('provider-status')
                    @if($Provider->status != 'approved')
                    @if($Provider->documents()->count())
                    @if($Provider->documents->last()->status == "ACTIVE")
                    <a class="btn btn-success btn-block"
                        href="{{ route('admin.provider.approve', $Provider->id ) }}">Approve</a>
                    @endif
                    @endif
                    @endcan
                    @endif
                </h5>
            </div>
            @if( Setting::get('demo_mode', 0) == 0)
            @if(count($Provider->documents)>0)
            <a href="{{route('admin.download', $Provider->id)}}" style="margin-left: 1em;"
                class="btn btn-primary pull-right"><i class="fa fa-download"></i> @lang('admin.provides.download')</a>
            @endif
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.provides.document_type')</th>
                                <th>@lang('admin.status')</th>
                                <th>@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Provider->documents as $Index => $Document)
                            <tr>
                                <td>{{ $Index + 1 }}</td>
                                <td>@if($Document->document){{ $Document->document->name }}@endif</td>
                                <td>@if($Document->status == "ACTIVE"){{ "APPROVED" }}@else {{ " PENDING ASSESSMENT" }}
                                    @endif</td>
                                <td>
                                    <div class="input-group-btn">
                                        @if( Setting::get('demo_mode', 0) == 0)
                                        @can('provider-document-edit')
                                        <a
                                            href="{{ route('admin.provider.document.edit', [$Provider->id, $Document->id]) }}"><span
                                                class="btn btn-success btn-large">@lang('admin.view')</span></a>
                                        @endcan
                                        @can('provider-document-delete')
                                        <button class="btn btn-danger btn-large doc-delete"
                                            id="{{$Document->id}}">@lang('admin.delete')</button>
                                        <form
                                            action="{{ route('admin.provider.document.destroy', [$Provider->id, $Document->id]) }}"
                                            method="POST" id="form_delete_{{$Document->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        @endcan
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.provides.document_type')</th>
                                <th>@lang('admin.status')</th>
                                <th>@lang('admin.action')</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @endcan
            </div>
        </div>
        @endsection

        @section('scripts')
        <script type="text/javascript">
            $(".doc-delete").on('click', function () {
                var doc_id = $(this).attr('id');
                $("#form_delete_" + doc_id).submit();
            });
        </script>
        @endsection