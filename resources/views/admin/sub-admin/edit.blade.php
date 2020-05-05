@extends('admin.layout.base')

@section('title', 'Update User ')

@section('content')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <h5 class="card-title">@lang('admin.admins.update_user')</h5>
            <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{route('admin.sub-admins.update', $user->id )}}" method="POST" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $user->name }}" name="name" required id="name" placehold="First Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $user->email }}" name="email" required id="email" placehold="First Name">
                    </div>
                </div>


                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $user->first_name }}" name="first_name" id="name" placehold="First Name">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $user->last_name }}" name="last_name" id="password_confirmation" placehold="First Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="permission" class="bmd-label-floating">@lang('admin.role')</label>
                    <div class="col-xs-10">
                        @foreach($roles as $role)
                        <label><input type="checkbox" @php if(in_array($role->id, $userRole)) { echo 'checked'; } @endphp value="{{ $role->id }}" name="roles[]" id="roles" />
                        {{ $role->name }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.admins.update_user')</button>
                        <a href="{{route('admin.sub-admins.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
