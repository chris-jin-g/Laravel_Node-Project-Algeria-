@extends('admin.layout.base')

@section('title', 'Tipos de Serviço ')

@section('content')
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                @if(Setting::get('demo_mode', 0) == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : @lang('admin.demomode')
                    </div>
                @endif
                <h5 class="mb-1">Tipos de Serviço</h5>
                @can('service-types-create')
                    <a href="{{ route('admin.service.create') }}" style="margin-left: 1em;"
                       class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Adicionar Novo</a>
                @endcan
                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Serviço</th>
                        <!-- <th>Provider Name</th> -->
                        <th>Capacidade</th>
                        <th>Tarifa Mínima</th>
                        <th>Preço Base</th>
                        <th>Distância Base</th>
                        <th>Preço Distância</th>
                        <th>Preço Tempo</th>
                        <th>Preço Hora</th>
                        <th>Cáuculo de Preço</th>
                        <th>Imagem</th>
                        <th>Marker Mapa</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fleets as $fleet)
                        <tr>
                            <td colspan="12"><b>{{ $fleet->name }}</b></td>
                        </tr>
                        @foreach($fleet->services as $index => $service)
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
                                    <td>Não</td>
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
                                                    <i class="fa fa-pencil"></i> Editar
                                                </a>
                                            @endcan
                                            @can('service-types-delete')
                                                <button class="btn btn-danger btn-block" onclick="return confirm('Você tem certeza?')">
                                                    <i class="fa fa-trash"></i> Excluir
                                                </button>
                                            @endcan
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Serviço</th>
                        <!-- <th>Provider Name</th> -->
                        <th>Capacidade</th>
                        <th>Tarifa Mínima</th>
                        <th>Preço Base</th>
                        <th>Distância Base</th>
                        <th>Preço Distância</th>
                        <th>Preço Tempo</th>
                        <th>Preço Hora</th>
                        <th>Cáuculo de Preço</th>
                        <th>Imagem</th>
                        <th>Marker Mapa</th>
                        <th>Ação</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
