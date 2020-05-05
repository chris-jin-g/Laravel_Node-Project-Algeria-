@extends('admin.layout.base')

@section('title', __('admin.account.update_profile'))

@section('content')

<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title pull-left">@lang('admin.account.update_profile')</h4>
                <a href="{{ URL::previous() }}" class="btn pull-right"><i
                    class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ Auth::guard('admin')->user()->name }}" name="name" required id="name" placehold=" @lang('admin.name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="bmd-label-floating">@lang('admin.email')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="{{ isset(Auth::guard('admin')->user()->email) ? Auth::guard('admin')->user()->email : '' }}" id="email" placehold="@lang('admin.email')">
                    </div>
                </div>
                <div class="form-group">
                    <label class="bmd-label-floating">@lang('user.profile.language')</label>
                    <div class="col-xs-10">
                        @php($language=get_all_language())
                        <select class="form-control" name="language" id="language">
                            @foreach($language as $lkey=>$lang)
                            <option value="{{$lkey}}" @if(Auth::user()->language==$lkey) selected @endif>{{$lang}}</option>
                            @endforeach
                        </select>
                    </div>    
                </div>
                <div class="input-group row">
                    <label for="picture" class="bmd-label-floating">@lang('admin.picture')</label>
                    <div class="col-xs-10">
                        @if(isset(Auth::guard('admin')->user()->picture))
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{Auth::guard('admin')->user()->picture}}">
                        @endif
                        <input type="file" accept="image/*" name="picture" class=" dropify form-control-file" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.account.update_profile')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
