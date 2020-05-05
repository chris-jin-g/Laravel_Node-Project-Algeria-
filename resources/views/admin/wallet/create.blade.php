@extends('admin.layout.base')

@section('title', 'Criar Transferência ')

@section('content')

<?php
if ($type == 1) {
    $title = Lang::get('admin.prd_settle');
    $back_route = "admin.providertransfer";
}
?>
<style>
    .input-group{
        width: none;
    }
    .input-group .fa-search{
        display: table-cell;
    }
</style>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title">{{$title}}</h5>
              <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{route('admin.transferstore')}}" method="POST" enctype="multipart/form-data" role="form" autocomplete="off">
                {{csrf_field()}}
                <div class="form-group">
                    @if($type==1)
                    <label for="namesearch" class="bmd-label-floating">@lang('admin.service.Provider_Name')</label>
                    @endif
                    <div class="col-xs-5">
                        <div class="input-group">
                            <input class="form-control" type="text" value="{{ old('name') }}" name="name" required id="namesearch" placehold="Procurar por Nome" required="" aria-describedby="basic-addon2">
                            <span class="input-group-addon fa fa-search"  id="basic-addon2"></span>
                        </div>
                        <input type="hidden" name="stype" value="{{$type}}">
                        <input type="hidden" name="from_id" id="from_id" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="amount" class="bmd-label-floating">@lang('admin.amount')</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" value="{{ old('amount') }}" name="amount" id="amount" placehold="Informe o valor" required="" min="1">
                    </div>
                    <div class="col-xs-5">

                        <span class="showcal">
                            <i><b>Saldo da Carteira:
                                    <span id="wallet_balance">-</span>
                                </b></i>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="type" class="bmd-label-floating">@lang('admin.type')</label>
                    <div class="col-xs-5">
                        <select class="form-control" name="type">
                            <option value="C">Crédito</option>
                            <option value="D">Débito</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="send_by" class="bmd-label-floating">@lang('admin.by')</label>
                    <div class="col-xs-5">
                        <select class="form-control" name="send_by">
                            <option value="online">Online</option>
                            <option value="online">Offline</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary">@lang('admin.settle')</button>
                        <a href="{{route($back_route)}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="{{ asset('asset/css/jquery-ui.css') }}" rel="stylesheet">

@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('asset/js/jquery-ui.js') }}"></script>
<script src="{{asset('main/vendor/maskmoney/jquery.maskMoney.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
var sflag = '{{$type}}';
$('#namesearch').autocomplete({
    source: function (request, response) {
        $.ajax
                ({
                    type: "GET",
                    url: '{{ route("admin.transfersearch") }}',
                    data: {stext: request.term, sflag: sflag},
                    dataType: "json",
                    success: function (responsedata, status, xhr)
                    {
                        if (!responsedata.data.length) {
                            var data = [];
                            data.push({
                                id: 0,
                                label: "Sem registros"
                            });
                            response(data);
                        } else {
                            response($.map(responsedata.data, function (item) {
                                if (sflag == 1)
                                    var name_alias = item.first_name + " " +item.last_name + " - " + item.id;
                                else
                                    var name_alias = item.name + " - " + item.id;

                                return {
                                    value: name_alias,
                                    id: item.id,
                                    bal: item.wallet_balance
                                }
                            }));
                        }
                    }
                });
    },
    minLength: 2,
    change: function (event, ui)
    {
        if (ui.item == null) {
            $("#namesearch").val('');
            $("#namesearch").focus();
            $("#wallet_balance").text("-");
        } else {
            if (ui.item.id == 0) {
                $("#namesearch").val('');
                $("#namesearch").focus();
                $("#wallet_balance").text("-");
            }
        }
    },
    select: function (event, ui) {
        $("#from_id").val(ui.item.id);
        $("#wallet_balance").text(ui.item.bal);
    }
});

$('#amount').maskMoney()

</script>
@endsection
