@extends('admin.layout.base')

@section('title', 'Adicionar Documento ')

@section('content')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <h5 class="card-title">@lang('admin.document.add_Document')</h5>
              <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('admin.document.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.document.document_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name" required id="name" placehold="Nome do @lang('admin.document.document_name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.document.document_type')</label>
                    <div class="col-xs-10">
                        <select name="type">
                            <option value="DRIVER">@lang('admin.document.driver_review')</option>
                            <option value="VEHICLE">@lang('admin.document.vehicle_review')</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.document.add_Document')</button>
                        <a href="{{route('admin.document.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
