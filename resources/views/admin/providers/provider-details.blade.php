@extends('admin.layout.base')

@section('title', 'Detalhes do Motorista ')

@section('content')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title">@lang('admin.provides.Provider_Details')</h4>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bg-white user-1">
                        <?php $background = asset('admin/assets/img/photos-1/4.jpg'); ?>
                        <div class="u-img img-cover" style="background-image: url({{$background}});"></div>
                        <div class="u-content">
                            <div class="avatar box-64">
                                <img class="b-a-radius-circle shadow-white" src="{{img($provider->picture)}}" alt="">
                                <i class="status bg-success bottom right"></i>
                            </div>
                            <p class="text-muted">
                                @if($provider->is_approved == 1)
                                <span class="tag tag-success">@lang('admin.provides.Approved')</span>
                                @else
                                <span class="tag tag-success">@lang('admin.provides.Not_Approved')</span>
                                @endif
                            </p>
                            <h5><a class="text-black" href="#">{{$provider->first_name}} {{$provider->last_name}}</a></h5>
                            <p class="text-muted">@lang('admin.email') : {{$provider->email}}</p>
                            <p class="text-muted">@lang('admin.mobile') : {{$provider->mobile}}</p>
                            <p class="text-muted">@lang('admin.gender') : {{$provider->gender}}</p>
                            <p class="text-muted">@lang('admin.address') : {{$provider->address}}</p>
                            <p class="text-muted">
                                @if($provider->is_activated == 1)
                                <span class="tag tag-warning">">@lang('admin.provides.Activated')</span>
                                @else
                                <span class="tag tag-warning">">@lang('admin.provides.Not_Activated')</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
