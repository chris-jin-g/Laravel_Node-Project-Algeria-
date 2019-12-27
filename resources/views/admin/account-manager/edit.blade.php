@extends('admin.layout.base')

@section('title', 'Update Account Manager ')

@section('content')

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>

            <h5 style="margin-bottom: 2em;">@lang('admin.account-manager.update_account_manager')</h5>

            <form class="form-horizontal" action="{{route('admin.account-manager.update', $account->id )}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label">@lang('admin.account-manager.full_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $account->name }}" name="name" required id="name" placeholder="@lang('admin.account-manager.full_name')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-xs-2 col-form-label">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $account->email }}" name="email" required id="email" placeholder="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-xs-2 col-form-label">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ $account->mobile }}" name="mobile" required id="mobile" placeholder="@lang('admin.mobile')">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">@lang('admin.password')</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password" placeholder="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">@lang('admin.account-manager.password_confirmation')</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password_confirm" placeholder="@lang('admin.account-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.account-manager.update_account_manager')</button>
                        <a href="{{route('admin.account-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
