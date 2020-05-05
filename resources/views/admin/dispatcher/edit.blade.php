@extends('admin.layout.base')

@section('title', 'Edit Dispatcher ')

@section('content')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">@lang('admin.dispatcher.update_dispatcher')</h4>
              <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            

            <form class="form-horizontal" action="{{route('admin.dispatch-manager.update', $dispatcher->id )}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.account-manager.full_name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $dispatcher->name }}" name="name" required id="name" placehold="Full Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $dispatcher->email }}" readonly="true" name="email" required id="email" placehold="Full Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="bmd-label-floating">@lang('admin.mobile')</label>
                    <div class="col-xs-10">
                        <input class="form-control numbers" type="number" value="{{ $dispatcher->mobile }}" name="mobile" required id="mobile" placehold="Mobile">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating">Repeat Password</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password_confirm">
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.dispatcher.update_dispatcher')</button>
                        <a href="{{route('admin.dispatch-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
