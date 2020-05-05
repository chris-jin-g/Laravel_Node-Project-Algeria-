@extends('admin.layout.base')

@section('title', 'Update Account Manager ')

@section('content')

<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title pull-left">@lang('admin.account-manager.update_account_manager')</h5>
                <a href="{{ URL::previous() }}" class="btn pull-right"><i
                    class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('admin.account-manager.update', $account->id )}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.account-manager.full_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $account->name }}" name="name" required id="name" placehold="@lang('admin.account-manager.full_name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $account->email }}" name="email" required id="email" placehold="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="bmd-label-floating">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ $account->mobile }}" name="mobile" required id="mobile" placehold="@lang('admin.mobile')">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating">@lang('admin.password')</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password" placehold="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating">@lang('admin.account-manager.password_confirmation')</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password_confirm" placehold="@lang('admin.account-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.account-manager.update_account_manager')</button>
                        <a href="{{route('admin.account-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection
