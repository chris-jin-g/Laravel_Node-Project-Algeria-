@extends('dispatcher.layout.base')

@section('title', 'Change Password ')

@section('content')

    <div class="container-fluid">
		<div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title">@lang('admin.account.change_password')</h5>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('dispatcher.password.update')}}" method="POST" role="form">
            	{{csrf_field()}}

            	<div class="form-group">
					<label for="old_password" class="bmd-label-floating">@lang('admin.account.old_password')</label>
					<div class="col-xs-10">
						<input class="form-control" type="password" name="old_password" id="old_password" placehold="@lang('admin.account.old_password')">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="bmd-label-floating">@lang('admin.account.password')</label>
					<div class="col-xs-10">
						<input class="form-control" type="password" name="password" id="password" placehold="@lang('admin.account.new_password')">
					</div>
				</div>

				<div class="form-group">
					<label for="password_confirmation" class="bmd-label-floating">@lang('admin.account.password_confirmation')</label>
					<div class="col-xs-10">
						<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placehold="@lang('admin.account.retype_password')">
					</div>
				</div>

				<div class="form-group">
					<label for="zipcode" class="bmd-label-floating"></label>
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary">@lang('admin.account.change_password')</button>
					</div>
				</div>

			</form>
		</div>
    </div>
</div>

@endsection
