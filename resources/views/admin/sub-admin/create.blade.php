@extends('admin.layout.base')

@section('title', 'Add Admin ')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <h5 class="card-title">@lang('admin.admins.add_user')</h5>
            <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{route('admin.sub-admins.store')}}" method="POST" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name" required id="name" placehold="@lang('admin.name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ old('email') }}" name="email" required id="name" placehold="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.password')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" value="" name="password" required id="password" placehold="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.password_confirmation')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" value="" name="password_confirmation" required id="password_confirmation" placehold="@lang('admin.password_confirmation')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="permission" class="bmd-label-floating">@lang('admin.role')</label>
                    <div class="col-xs-10">
                        @foreach($roles as $value)
                            @if($value->id>5)
                                <label><input type="checkbox" value="{{ $value->id }}" name="roles[]" id="role" />{{ $value->name }}</label>
                            @endif    
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.admins.add_user')</button>
                        <a href="{{route('admin.sub-admins.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
