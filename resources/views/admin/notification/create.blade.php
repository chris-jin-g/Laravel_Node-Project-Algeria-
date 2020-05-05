@extends('admin.layout.base')

@section('title', __('admin.notification.add'))

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap-datetimepicker.min.css')}}">

    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              
              <h5 class="card-title">@lang('admin.notification.add')</h5>
              <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{route('admin.notification.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}            	

                <div class="form-group">
                    <label for="notify_type" class="bmd-label-floating">@lang('admin.notification.notify_type')</label>
                    <div class="col-xs-10">
                        <select name="notify_type" class="form-control">
                            <option value="all">All</option>
                            <option value="user">Users</option>
                            <option value="provider">Drivers</option>
                        </select>
                    </div>
                </div>

                <div class="input-group row">
                    <label for="picture" class="bmd-label-floating">@lang('admin.notification.notify_image')</label>
                    <div class="col-xs-10">
                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="notify_desc" class="bmd-label-floating">@lang('admin.notification.notify_desc')</label>
                    <div class="col-xs-10">
                        <input class="form-control" autocomplete="off"  type="text" value="{{ old('description') }}" name="description" required id="description" placehold="@lang('admin.notification.notify_desc')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="expiry_date" class="bmd-label-floating">@lang('admin.notification.notify_expiry')</label>
                    <div class="col-xs-10">
                        <input class="form-control datetimepicker" autocomplete="off"  type="text" value="{{ old('expiry_date') }}" name="expiry_date" required id="expiry_date" placehold="@lang('admin.notification.notify_expiry')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="notify_status" class="bmd-label-floating">@lang('admin.notification.notify_status')</label>
                    <div class="col-xs-10">
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">In Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.notification.add')</button>
                        <a href="{{route('admin.notification.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('asset/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/js/moment-with-locales.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    //your code here
    $(function () {
        $('.datetimepicker').datetimepicker({defaultDate: moment(), minDate: moment(), format: 'YYYY-MM-DD HH:mm'});
    });
});

</script>
@endsection