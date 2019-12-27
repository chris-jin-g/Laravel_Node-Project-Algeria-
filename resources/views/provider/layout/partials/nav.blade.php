<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li>
            <a href="{{ route('provider.index') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('provider.earnings') }}">@lang('provider.profile.partner_earnings')</a>
        </li>
        <li>
            <a href="{{ route('provider.transfer') }}">@lang('provider.profile.transfer')</a>
        </li>
        <li>
            <a href="{{ route('provider.wallet.transation') }}">@lang('provider.profile.wallet_transaction')</a>
        </li>
        <li>
            <a href="{{ route('provider.cards') }}">@lang('provider.card.list')</a>
        </li>
        <li>
            <a href="{{ route('provider.upcoming') }}">@lang('provider.partner.upcoming')</a>
        </li>
        <li>
            <a href="{{ route('provider.profile.index') }}">@lang('provider.profile.profile')</a>
        </li>
        <li>
            <a href="{{ route('provider.documents.index') }}">@lang('provider.profile.manage_documents')</a>
        </li>
        <li>
            <a href="{{ route('provider.location.index') }}">@lang('provider.profile.update_location')</a>
        </li>
        <li>
            <a href="{{ route('provider.change.password')}}">@lang('provider.profile.change_password')</a>
        </li>
        <!-- <li>
            <a href="{{Setting::get('stripe_oauth_url')}}">Connect to Stripe</a>
        </li> -->
        <li>
            <a href="{{ url('/provider/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                @lang('provider.profile.logout')
            </a>
            <form id="logout-form" action="{{ url('/provider/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</nav>