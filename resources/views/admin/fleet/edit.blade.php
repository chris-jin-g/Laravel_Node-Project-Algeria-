@extends('admin.layout.base')

@section('title', 'Editar Frota ')

@section('content')

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>

            <h5 style="margin-bottom: 2em;">@lang('admin.fleet.update_fleet')</h5>

            <form class="form-horizontal" action="{{route('admin.fleet.update', $fleet->id )}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label">Estado</label>
                    <div class="col-xs-5">
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
                    <div class="col-xs-5">
                        <select name="city_id" class="form-control" id="cities" required>
                            <option value="">Selecione a cidade</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label">Nome da Franquia</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $fleet->name }}" name="name" required id="name" placeholder="Nome da Franquia">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company" class="col-xs-2 col-form-label">@lang('admin.fleet.company_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $fleet->company }}" name="company" required id="company" placeholder="Nome da Empresa">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="mobile" class="col-xs-2 col-form-label">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ $fleet->mobile }}" name="mobile" required id="mobile" placeholder="Telefone">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-xs-2 col-form-label">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $fleet->email }}" name="email" required id="email" placeholder="E-mail">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logo" class="col-xs-2 col-form-label">@lang('admin.fleet.company_logo')</label>
                    <div class="col-xs-10">
                        @if(isset($fleet->logo))
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{img($fleet->logo)}}">
                        @endif
                        <input type="file" accept="image/*" name="logo" class="dropify form-control-file" id="logo" aria-describedby="fileHelp">
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

<!--                <div class="form-group row">
                    <label for="commission" class="col-xs-2 col-form-label">@lang('admin.fleet.fleet_commission') </label>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="{{ $fleet->commission }}" name="commission" id="commission" placeholder="Comissão Administrador">
                    </div>
                    <div class="col-xs-5">
                        <span style="color:red">(A comissão da franquia funcionará se a comissão do administrador estiver 0%) </span>
                    </div>
                </div>-->

                <div class="form-group row">
                    <label for="zipcode" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.fleet.update_fleet_owner')</button>
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
    var states = $('#states');
    var fleetCity = "{{ $fleet->city_id }}";

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
                if (value.id == fleetCity) {
                    $('#cities').append('<option value=' + value.id + ' selected>' + value.title + '</option>');
                } else {
                    $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                }
            });
        });
    }
</script>
@endsection
