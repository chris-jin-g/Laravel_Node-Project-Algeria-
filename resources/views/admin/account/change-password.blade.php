@extends('admin.layout.base')

@section('title', 'Change Password')

@section('content')


    <div class="container-fluid">
        <div class="row">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">@lang('admin.account.change_password')</h4>
                </div>
        <div class="card-body">
            <form action="{{route('admin.password.update')}}" method="POST" role="form">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">@lang('admin.account.old_password')</label>
                        <input class="form-control" type="password" name="old_password" id="old_password">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">@lang('admin.account.password')</label>
                        <input class="form-control" type="password" name="password" id="password">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">@lang('admin.account.password_confirmation')</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                      </div>
                    </div>
                  </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary pull-right">@lang('admin.account.change_password')</button>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </form>
        </div>
    </div>
        </div></div>
@endsection