@extends('admin.layout.base')

@section('title', 'Atualizar Passageiro ')
@section('styles')
    <link rel="stylesheet" href="{{asset('asset/css/intlTelInput.css')}}">
@endsection
@section('content')

    <!-- edit page -->
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i
                            class="fa fa-angle-left"></i> @lang('admin.back')</a>

                <h5 style="margin-bottom: 2em;">Update User</h5>

                <form class="form-horizontal" action="{{route('admin.user.update', $user->id )}}" method="POST"
                      enctype="multipart/form-data" role="form">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group row">
                        <label for="name" class="col-xs-2 col-form-label">Estado</label>
                        <div class="col-xs-10">
                            <select name="" class="form-control" id="states" required>
                                <option value="">Selecione o Estado</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}"{{ !is_null($stateId) && $state->id == $stateId->id?' selected':'' }}>{{ $state->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-xs-2 col-form-label">Cidade</label>
                        <div class="col-xs-10">
                            <select name="city_id" class="form-control" id="cities" required>
                                <option value="">Selecione a cidade</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_name" class="col-xs-2 col-form-label">@lang('admin.users.first_name')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ $user->first_name }}" name="first_name"
                                   required id="first_name" placeholder="@lang('admin.users.first_name')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-xs-2 col-form-label">@lang('admin.users.last_name')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ $user->last_name }}" name="last_name"
                                   required id="last_name" placeholder="@lang('admin.users.last_name')">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="last_name" class="col-xs-2 col-form-label">CPF</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ $user->cpf }}" name="cpf" required id="cpf" placeholder="CPF">
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="picture" class="col-xs-2 col-form-label">@lang('admin.users.picture')</label>
                        <div class="col-xs-10">
                            @if(isset($user->picture))
                                <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{img($user->picture)}}">
                            @endif
                            <input type="file" accept="image/*" name="picture" class="dropify form-control-file"
                                   id="picture" aria-describedby="fileHelp">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country_code"
                               class="col-xs-2 col-form-label">@lang('admin.users.country_code')</label>
                        <div class="col-xs-10">
                            <input type="text" name="country_code" style="padding-bottom:5px;" class="country-name"
                                   id="country_code" value="{{ $user->country_code }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-xs-2 col-form-label">@lang('admin.users.mobile')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="number" value="{{ $user->mobile }}" name="mobile" required
                                   id="mobile" placeholder="@lang('admin.users.mobile')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Senha:</label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Repetir Senha:</label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" name="password_confirm">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                        <div class="col-xs-10">
                            <button type="submit" class="btn btn-primary">@lang('admin.users.update_user')</button>
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
        var states = $('#states');
        var userCity = "{{ $user->city_id }}";

        states.change(function () {
            var idEstado = $(this).val();
            $.get('/admin/cities/' + idEstado, function (cidades) {
                $('#cities').empty();
                $.each(cidades, function (key, value) {
                    $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                });
            });
        });

        if (states.val() != null) {
            $.get('/admin/cities/' + states.val(), function (cidades) {
                $('#cities').empty();
                $.each(cidades, function (key, value) {
                    if (value.id == userCity) {
                        $('#cities').append('<option value=' + value.id + ' selected>' + value.title + '</option>');
                    } else {
                        $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                    }
                });
            });
        }

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
