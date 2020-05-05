@extends('admin.layout.base')

@section('title', 'Add User')
@section('styles')
<link rel="stylesheet" href="{{asset('asset/css/intlTelInput.css')}}">
@endsection

@section('content')

<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title pull-left">@lang('admin.users.add_user')</h4>
                <a href="{{ URL::previous() }}" class="btn pull-right"><i
                    class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">

            <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="first_name" class="bmd-label-floating">@lang('admin.first_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('first_name') }}" name="first_name" required id="first_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="last_name" class="bmd-label-floating">@lang('admin.last_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('last_name') }}" name="last_name" required id="last_name" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="bmd-label-floating">@lang('admin.password')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password" id="password" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="bmd-label-floating">@lang('admin.account.password_confirmation')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" >
                    </div>
                </div>

                <div class="input-group row">
                    <label for="picture" class="bmd-label-floating">@lang('admin.picture')</label>
                    <div class="col">
                        <input type="file" accept="image/*" name="picture" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="country_code" class="bmd-label-floating">@lang('admin.country_code')</label>
                    <div class="col-xs-10">
                        <input type="text" name="country_code" value="+91" style ="padding-bottom:5px;" class="country-name" id="country_code">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="bmd-label-floating">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.users.add_user')</button>
                        <a href="{{route('admin.user.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('asset/js/intlTelInput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/intlTelInput-jquery.min.js') }}"></script>
<script type="text/javascript">
//For mobile number with date
var input = document.querySelector("#country_code");
window.intlTelInput(input, ({
    // separateDialCode:true,
}));
$(".country-name").click(function () {
    var myVar = $(this).closest('.country').find(".dial-code").text();
    $('#country_code').val(myVar);
});
</script>
@endsection