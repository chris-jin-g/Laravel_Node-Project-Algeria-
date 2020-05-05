@extends('admin.layout.base')

@section('title', 'Novo Motivo de Cancelamento ')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title">@lang('admin.reason.add_reason')</h5>
              <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{route('admin.reason.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="type" class="bmd-label-floating">@lang('admin.reason.type')</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="type" id="type">
                            <option value="">select</option>
                            <option value="USER">User</option>
                            <option value="PROVIDER">Driver</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="reason" class="bmd-label-floating">@lang('admin.reason.reason')</label>
                    <div class="col-xs-10">
                        <input class="form-control" autocomplete="off"  type="text" value="{{ old('reason') }}" name="reason" required id="reason" placehold="@lang('admin.reason.reason')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="max_amount" class="bmd-label-floating">@lang('admin.reason.status')</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="status" id="status">
                            <option value="">select</option>
                            <option value="1">Active</option>
                            <option value="0">inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.reason.add_reason')</button>
                        <a href="{{route('admin.reason.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

