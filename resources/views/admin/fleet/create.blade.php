@extends('admin.layout.base')

@section('title', 'Novo Gerente de Franquia ')

@section('content')

    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i
                            class="fa fa-angle-left"></i> @lang('admin.back')</a>

                <h5 style="margin-bottom: 2em;">@lang('admin.fleet.add_fleet_owner')</h5>

                <form class="form-horizontal" action="{{route('admin.fleet.store')}}" method="POST"
                      enctype="multipart/form-data" role="form">
                    {{csrf_field()}}

                    <div class="form-group row">
                        <label for="name" class="col-xs-12 col-form-label">Estado</label>
                        <div class="col-xs-5">
                            <select name="" class="form-control" id="states" required>
                                <option value="">Selecione o Estado</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-xs-12 col-form-label">Cidade</label>
                        <div class="col-xs-5">
                            <select name="city_id" class="form-control" id="cities" required>
                                <option value="">Selecione a cidade</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name"
                               class="col-xs-12 col-form-label">Nome da Franquia</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ old('name') }}" name="name" required
                                   id="name" placeholder="Nome da Franquia">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company" class="col-xs-12 col-form-label">@lang('admin.fleet.company_name')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="{{ old('company') }}" name="company" required
                                   id="company" placeholder="Nome da Empresa">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-xs-12 col-form-label">@lang('admin.email')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="email" required name="email" value="{{old('email')}}"
                                   id="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-xs-12 col-form-label">@lang('admin.password')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="password" name="password" id="password"
                                   placeholder="Senha">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation"
                               class="col-xs-12 col-form-label">@lang('admin.account-manager.password_confirmation')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="password" name="password_confirmation"
                                   id="password_confirmation" placeholder="Confirme a senha">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-xs-12 col-form-label">@lang('admin.fleet.company_logo')</label>
                        <div class="col-xs-10">
                            <input type="file" accept="image/*" name="logo" class="dropify form-control-file" id="logo"
                                   aria-describedby="fileHelp">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-xs-12 col-form-label">@lang('admin.mobile')</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required
                                   id="mobile" placeholder="Telefone">
                        </div>
                    </div>

<!--                    <div class="form-group row">
                        <label for="commission"
                               class="col-xs-12 col-form-label">@lang('admin.fleet.fleet_commission')</label>
                        <div class="col-xs-5">
                            <input class="form-control" type="number" value="{{ old('commission') }}" name="commission"
                                   id="commission" placeholder="Comissão">
                        </div>
                        <div class="col-xs-5">
                            <span style="color:red">(A comissão da franquia funcionará se a comissão do administrador estiver 0%) </span>
                        </div>
                    </div>-->

                    <div class="form-group row">
                        <label for="zipcode" class="col-xs-12 col-form-label"></label>
                        <div class="col-xs-10">
                            <button type="submit" class="btn btn-primary">@lang('admin.auth.sign_in')</button>
                            <a href="{{route('admin.fleet.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#states').change(function () {
            var idEstado = $(this).val();
            $.get('/admin/cities/' + idEstado, function (cidades) {
                $('#cities').empty();
                $.each(cidades, function (key, value) {
                    $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                });
            });
        });
    </script>
@endsection
