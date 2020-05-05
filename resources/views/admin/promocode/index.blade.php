@extends('admin.layout.base')

@section('title', 'Cupons Promocionais ')

@section('content')


        <div class="container-fluid">
            
            <div class="card">
                <div class="card-header card-header-primary">
                @if(Setting::get('demo_mode', 0) == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : @lang('admin.demomode')
                    </div>
                @endif
                <h5 class="card-title">@lang('admin.promocode.promocodes')</h5>
                @can('promocodes-create')
                <a href="{{ route('admin.promocode.create') }}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> @lang('admin.promocode.add_promocode')</a>
                @endcan
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.promocode.promocode') </th>
                            <th>@lang('admin.promocode.percentage') </th>
                            <th>@lang('admin.promocode.max_amount') </th>
                            <th>@lang('admin.promocode.expiration')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.promocode.used_count')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($promocodes as $index => $promo)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$promo->promo_code}}</td>
                            <td>{{$promo->percentage}}</td>
                            <td>{{$promo->max_amount}}</td>
                            <td>
                                {{$promo->expiration}}
                            </td>
                            <td>
                                @if(date("Y-m-d H:i") <= $promo->expiration)
                                    <span class="tag tag-success">Válido</span>
                                @else
                                    <span class="tag tag-danger">Expirado</span>
                                @endif
                            </td>
                            <td>
                                {{promo_used_count($promo->id)}}
                            </td>
                            <td>
                                <form action="{{ route('admin.promocode.destroy', $promo->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    @if( Setting::get('demo_mode', 0) == 0)
                                    @can('promocodes-edit')
                                    <a href="{{ route('admin.promocode.edit', $promo->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                    @endcan
                                    @can('promocodes-delete')
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
                            <th>@lang('admin.promocode.promocode') </th>
                            <th>@lang('admin.promocode.percentage') </th>
                            <th>@lang('admin.promocode.max_amount') </th>
                            <th>@lang('admin.promocode.expiration')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.promocode.used_count')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection