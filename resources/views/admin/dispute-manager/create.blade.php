@extends('admin.layout.base')

@section('title', 'Novo Gerente de Disputa ')

@section('content')

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>

            <h5 style="margin-bottom: 2em;">@lang('admin.dispute-manager.add_dispute_manager')</h5>

            <form class="form-horizontal" action="{{route('admin.dispute-manager.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label">@lang('admin.account-manager.full_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name" required id="name" placeholder="@lang('admin.account-manager.full_name')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-xs-12 col-form-label">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" placeholder="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-xs-12 col-form-label">@lang('admin.password')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password" id="password" placeholder="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-xs-12 col-form-label">@lang('admin.account-manager.password_confirmation')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('admin.dispute-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-xs-12 col-form-label">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" placeholder="@lang('admin.mobile')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-xs-12 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.dispute-manager.add_dispute_manager')</button>
                        <a href="{{route('admin.dispute-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
