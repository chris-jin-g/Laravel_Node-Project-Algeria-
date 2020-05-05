@extends('admin.layout.base')

@section('title', 'Atualizar Motivo de Cancelamento ')

@section('content')

    <div class="container-fluid">
    	<div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title">@lang('admin.reason.update_reason')</h5>
              <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('admin.reason.update', $reason->id )}}" method="POST" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}
            	<input type="hidden" name="_method" value="PATCH">
				<div class="form-group">
					<label for="type" class="bmd-label-floating">@lang('admin.reason.type')</label>
					<div class="col-xs-10">
						<select class="form-control" name="type" id="type">
							<option value="USER" @if($reason->type=='USER')selected @endif>User</option>
							<option value="PROVIDER" @if($reason->type=='PROVIDER')selected @endif>Driver</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="reason" class="bmd-label-floating">@lang('admin.reason.reason')</label>
					<div class="col-xs-10">
						<input class="form-control" autocomplete="off"  type="text" value="{{ $reason->reason }}" name="reason" required id="reason" placehold="@lang('admin.reason.reason')">
					</div>
				</div>
				
				<div class="form-group">
					<label for="max_amount" class="bmd-label-floating">@lang('admin.reason.status')</label>
					<div class="col-xs-10">
						<select class="form-control" name="status" id="status">
							<option value="1" @if($reason->status==1)selected @endif>Ativo</option>
							<option value="0" @if($reason->status==0)selected @endif>Inativo</option>
						</select>
					</div>
				</div>


				
				<div class="form-group">
					<label for="" class="bmd-label-floating"></label>
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary">@lang('admin.reason.update_reason')</button>
						<a href="{{route('admin.reason.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>

@endsection


