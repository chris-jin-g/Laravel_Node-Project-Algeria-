@extends('admin.layout.base')

@section('title', 'Update Users')
@section('styles')
    <link rel="stylesheet" href="{{asset('asset/css/intlTelInput.css')}}">
@endsection
@section('content')

    <!-- edit page -->
    <div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title pull-left">Profile Page</h4>
                    <a href="{{ URL::previous() }}" class="btn pull-right"><i
                        class="fa fa-angle-left"></i> @lang('admin.back')</a>
                </div>
                <div class="card-body">
                <form class="form-horizontal" action="{{route('admin.user.update', $user->id )}}" method="POST"
                      enctype="multipart/form-data" role="form">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name" class="bmd-label-floating">@lang('admin.users.first_name')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ $user->first_name }}" name="first_name"
                                   required id="first_name" placehold="@lang('admin.users.first_name')">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name" class="bmd-label-floating">@lang('admin.users.last_name')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ $user->last_name }}" name="last_name"
                                   required id="last_name" placehold="@lang('admin.users.last_name')">
                        </div>
                    </div>
                </div>
                    </div>

                    <div class="iinput-group row">

                        <label for="picture" class="bmd-label-floating">@lang('admin.picture')</label>
                        <div class="col">
                            @if(isset($user->picture))
                                <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{img($user->picture)}}">
                            @endif
                            <input type="file" accept="image/*" name="picture" class="dropify form-control-file"
                                   id="picture" aria-describedby="fileHelp">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country_code"
                               class="bmd-label-floating">@lang('admin.country_code')</label>
                        <div class="col-xs-10">
                            <input type="text" name="country_code" style="padding-bottom:5px;" class="country-name"
                                   id="country_code" value="{{ $user->country_code }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="bmd-label-floating">@lang('admin.mobile')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="number" value="{{ $user->mobile }}" name="mobile" required
                                   id="mobile" placehold="@lang('admin.mobile')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="bmd-label-floating">@lang('admin.password')</label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="bmd-label-floating">@lang('admin.password_confirmation')</label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" name="password_confirm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="zipcode" class="bmd-label-floating"></label>
                        <div class="col-xs-10">
                            <button type="submit" class="btn btn-primary">@lang('admin.users.update_user')</button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('asset/js/intlTelInput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/intlTelInput-jquery.min.js') }}"></script>
    <script type="text/javascript">
        // var states = $('#states');
        // var userCity = "{{ $user->city_id }}";

        // states.change(function () {
        //     var idEstado = $(this).val();
        //     $.get('/admin/cities/' + idEstado, function (cidades) {
        //         $('#cities').empty();
        //         $.each(cidades, function (key, value) {
        //             $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
        //         });
        //     });
        // });

        // if (states.val() != null) {
        //     $.get('/admin/cities/' + states.val(), function (cidades) {
        //         $('#cities').empty();
        //         $.each(cidades, function (key, value) {
        //             if (value.id == userCity) {
        //                 $('#cities').append('<option value=' + value.id + ' selected>' + value.title + '</option>');
        //             } else {
        //                 $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
        //             }
        //         });
        //     });
        // }

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
