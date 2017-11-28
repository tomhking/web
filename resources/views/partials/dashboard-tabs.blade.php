<div class="dashboard-navigation">
    <ul class="nav nav-tabs">
        @if(config('ico.started'))
            <li class="{{ current_route_class('address') }}"><a href="{{ route('address') }}">Crowdsale</a></li>
        @endif
        <li class="{{ current_route_class('participate') }}"><a href="{{ route('participate') }}"><i class="fa fa-question-circle" aria-hidden="true"></i> How to participate</a></li>
        <li class="{{ current_route_class('affiliate') }}"><a href="{{ route('affiliate') }}"><i class="fa fa-star" aria-hidden="true"></i> Earn more </a></li>
        @if(auth()->user()->isAirdropParticipant())
            <li class="{{ current_route_class('user') }}"><a href="{{ route('user') }}"><img class="token" src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token"> My Airdrops</a></li>
        @endif
    </ul>
</div>