@extends('admin.layout.base')

@section('title', __('admin.roles.update_role'))

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <h5 class="card-title">@lang('admin.roles.update_role')</h5>
            <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{route('admin.role.update', $role->id )}}" method="POST" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">@lang('admin.name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $role->name }}" name="name" required id="name" placehold="@lang('admin.name')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="permission" class="bmd-label-floating">@lang('admin.permissions')</label>
                    <div class="col-xs-10">
                        @php $val = ""; @endphp
                        @foreach($permissions as $value)
                        @if($value->group_name != $val) 
                        @php $val = $value->group_name; @endphp
                        
                        <h5>{{$value->group_name}}</h5>
                        @endif
                        <label style="margin-right: 20px; margin-bottom: 20px;"><input type="checkbox" @php if(in_array($value->id, $rolePermissions)) { echo 'checked'; } @endphp value="{{ $value->id }}" name="permission[]" id="permission" />
                        {{ $value->display_name }}</label>

                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary">@lang('admin.roles.update_role')</button>
                        <a href="{{route('admin.role.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script type="text/javascript">
        
        $(document).ready(function() {
            $('.checkbox_group').each(function() {
                $(this).on('change', function() {
                        $(this).closest('.row').find(':checkbox:not(.checkbox_group)').prop('checked', $(this).is(':checked'));
                    });
                });
            });
            
    </script>
@endsection