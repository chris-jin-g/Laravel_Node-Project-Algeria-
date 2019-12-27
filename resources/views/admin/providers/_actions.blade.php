<div class="input-group-btn">
    @can('provider-status')
        @if($provider->status == 'approved')
            <a class="btn btn-danger btn-block" href="{{ route('admin.provider.disapprove', $provider->id ) }}">Desativar</a>
        @else
            <a class="btn btn-success btn-block"
               href="{{ route('admin.provider.approve', $provider->id ) }}">Aprovar</a>
        @endcan
    @endif
    @if($user->hasAnyPermission(['provider-history', 'provider-statements', 'provider-edit','provider-delete']))
        <button type="button"
                class="btn btn-info btn-block dropdown-toggle"
                data-toggle="dropdown">@lang('admin.action')
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            @can('provider-history')
                <li>
                    <a href="{{ route('admin.provider.request', $provider->id) }}" class="btn btn-default"><i
                                class="fa fa-search"></i> @lang('admin.History')</a>
                </li>
            @endcan
            @can('provider-statements')
                <li>
                    <a href="{{ route('admin.provider.statement', $provider->id) }}" class="btn btn-default"><i
                                class="fa fa-account"></i> @lang('admin.Statements')</a>
                </li>
            @endcan
            @can('provider-edit')
                <li>
                    <a href="{{ route('admin.provider.edit', $provider->id) }}" class="btn btn-default"><i
                                class="fa fa-pencil"></i> @lang('admin.edit')</a>
                </li>
            @endcan
            @can('provider-delete')
                <li>
                    <form action="{{ route('admin.provider.destroy', $provider->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </li>
            @endcan
        </ul>
    @endif
</div>
