@extends('account.layout.base')

@section('title', 'Update Profile ')

@section('content')

    <div class="container-fluid">
		<div class="card">
			<div class="card-header card-header-primary">
			  <h5 class="card-title">@lang('admin.account.update_profile')</h5>
			</div>
			<div class="card-body">
            <form class="form-horizontal" action="{{route('account.profile.update')}}" method="POST" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}

				<div class="form-group">
					<label for="name" class="bmd-label-floating">@lang('admin.name')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Auth::guard('account')->user()->name }}" name="name" required id="name" placehold=" @lang('admin.name')">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="bmd-label-floating">@lang('admin.email')</label>
					<div class="col-xs-10">
						<input class="form-control" type="email" required name="email" value="{{ isset(Auth::guard('account')->user()->email) ? Auth::guard('account')->user()->email : '' }}" id="email" placehold="@lang('admin.email')">
					</div>
				</div>

				<div class="form-group">
					<label for="mobile" class="bmd-label-floating">@lang('admin.mobile')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" required name="mobile" value="{{ isset(Auth::guard('account')->user()->mobile) ? Auth::guard('account')->user()->mobile : '' }}" id="mobile" placehold="@lang('admin.mobile')">
					</div>
				</div>
				<div class="form-group">
                    <label class="bmd-label-floating">@lang('user.profile.language')</label>
                    <div class="col-xs-10">
	                    @php($language=get_all_language())
	                    <select class="form-control" name="language" id="language">
	                        @foreach($language as $lkey=>$lang)
	                        	<option value="{{$lkey}}" @if(Auth::user()->language==$lkey) selected @endif>{{$lang}}</option>
	                        @endforeach
	                    </select>
	                </div>    
                </div>
				<div class="form-group">
					<label for="zipcode" class="bmd-label-floating"></label>
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary">@lang('admin.account.update_profile')</button>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>

@endsection
