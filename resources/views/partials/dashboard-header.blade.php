<div class="dashboard-top">

<div class="header container-fluid">
    <div class="row-fluid">
        <div class="col-md-3">
            <div class="dashboard-logo">
                <a href="{{ route('home') }}" class="login-logo">
                    <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                </a>
            </div>
        </div>
        <div class="col-md-4 col-md-push-5 text-right">
            <div class="user-menu">
                <ul>
                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Change pasword</a></li>
                    <li>
                        <form method="post" action="{{ route('logout') }}">
                            <button type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</button>
                            {!! csrf_field() !!}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('partials.dashboard-tabs')
</div>
