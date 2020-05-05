@extends('admin.layout.base')

@section('title', 'Update Dispute')

@section('content')

    <div class="container-fluid">
    	<div class="card">
            <div class="card-header card-header-primary">
                <h5 class="card-title" style="margin-bottom: 2em;">@lang('admin.dispute.update_dispute')</h5>
              
              <a href="{{ URL::previous() }}" class="card-category btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            
            </div>
            <div class="card-body">
            

            <form class="form-horizontal" action="{{route('admin.dispute.update', $dispute->id )}}" method="POST" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}
            	<input type="hidden" name="_method" value="PATCH">				
				
				<div class="form-group">
					<label for="dispute_type" class="bmd-label-floating">@lang('admin.dispute.dispute_type')</label>
					<div class="col-xs-10">
						<select name="dispute_type" class="form-control">
						<option value="user" @if($dispute->dispute_type=='user')selected @endif>{{__('admin.user')}}</option>
							<option value="provider" @if($dispute->dispute_type=='provider')selected @endif>{{__('admin.provider')}}</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="dispute_name" class="bmd-label-floating">@lang('admin.dispute.dispute_name')</label>
					<div class="col-xs-10">
						<input class="form-control" autocomplete="off"  type="text" value="{{ $dispute->dispute_name }}" name="dispute_name" required id="dispute_name" placehold="@lang('admin.dispute.dispute_name')">
					</div>
				</div>

				<div class="form-group">
					<label for="dispute_status" class="bmd-label-floating">@lang('admin.dispute.dispute_status')</label>
					<div class="col-xs-10">
						<select name="dispute_status" class="form-control">
							<option value="active" @if($dispute->status=='active')selected @endif>@lang('admin.active')</option>
							<option value="inactive" @if($dispute->status=='inactive')selected @endif>@lang('admin.inactive')</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="bmd-label-floating"></label>
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary">@lang('admin.dispute.update_dispute')</button>
						<a href="{{route('admin.dispute.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>

@endsection
