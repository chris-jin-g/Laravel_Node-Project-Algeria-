@extends('admin.layout.base')

@section('title', 'Atualizar Documento ')

@section('content')


    <div class="container-fluid">
    	<div class="card">
			<div class="card-header card-header-primary">
			  <h5 class="card-title">@lang('admin.document.update_document')</h5>
			  <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
			</div>
			<div class="card-body">

            <form class="form-horizontal" action="{{route('admin.document.update', $document->id )}}" method="POST" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}
            	<input type="hidden" name="_method" value="PATCH">
				<div class="form-group">
					<label for="name" class="bmd-label-floating">@lang('admin.document.document_name')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ $document->name }}" name="name" required id="name" placehold="Nome do @lang('admin.document.document_name')">
					</div>
				</div>

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.document.document_type')</label>
                    <div class="col-xs-10">
                        <select name="type">
                            <option value="DRIVER" @if($document->type == 'DRIVER') selected @endif>@lang('admin.document.driver_review')</option>
                            <option value="VEHICLE" @if($document->type == 'VEHICLE') selected @endif>@lang('admin.document.vehicle_review')</option>
                        </select>
                    </div>
                </div>

				<div class="form-group">
					<label for="zipcode" class="bmd-label-floating"></label>
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary">@lang('admin.document.update_document')</button>
						<a href="{{route('admin.document.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>

@endsection
