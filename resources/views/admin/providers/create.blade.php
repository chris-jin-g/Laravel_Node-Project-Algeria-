@extends('admin.layout.base')

@section('title', 'Novo Motorista ')
@section('styles')
<link rel="stylesheet" href="{{asset('asset/css/intlTelInput.css')}}">
@endsection
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h5 class="card-title">@lang('admin.provides.add_provider')</h5>
                <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('admin.provider.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                
                <div class="form-group">
                    <label for="first_name" class="bmd-label-floating">@lang('admin.first_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('first_name') }}" name="first_name" required id="first_name" placehold="@lang('admin.first_name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="last_name" class="bmd-label-floating">@lang('admin.last_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('last_name') }}" name="last_name" required id="last_name" placehold="@lang('admin.last_name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" placehold="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="bmd-label-floating">@lang('admin.password')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password" id="password" placehold="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="bmd-label-floating">@lang('admin.provides.password_confirmation')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placehold="@lang('admin.provides.password_confirmation')">
                    </div>
                </div>

                <div class="input-group row">
                    <label for="picture" class="bmd-label-floating">@lang('admin.picture')</label>
                    <div class="col-xs-10">
                        <input type="file" accept="image/*" name="avatar" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="country_code" class="bmd-label-floating">Código do País</label>
                    <div class="col-xs-10">
                        <input type="text" name="country_code" value="+55" style ="padding-bottom:5px;" class="country-name" id="country_code" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobile" class="bmd-label-floating">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" placehold="@lang('admin.mobile')">
                    </div>
                </div>


                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.provides.add_provider')</button>
                        <a href="{{route('admin.provider.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
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
       var input = document.querySelector("#country_code");

    //    var states = $('#states');

    //    states.change(function () {
    //        var idEstado = $(this).val();
    //        $.get('/admin/cities/' + idEstado, function (cidades) {
    //            $('#cities').empty();
    //            $.each(cidades, function (key, value) {
    //                $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
    //            });
    //        });
    //    });

    //    if(states.val() != null){
    //        $.get('/admin/cities/' + states.val(), function (cidades) {
    //            $('#cities').empty();
    //            $.each(cidades, function (key, value) {
    //                $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
    //            });
    //        });
    //    }

       window.intlTelInput(input,({
           // separateDialCode:true,
       }));
       $(".country-name").click(function(){
           var myVar = $(this).closest('.country').find(".dial-code").text();
           $('#country_code').val(myVar);
        });
		</script>
@endsection