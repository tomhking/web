@extends('layouts.landing')

@section('content')
    @include('partials.landing.what-we-are')
    @include('partials.landing.trust')
    @include('partials.landing.starting-point')
    @include('partials.landing.why-us')
    @include('partials.landing.stats-moocs')
    @include('partials.landing.how-it-works-mvp')
    @include('partials.landing.stats-demand')
    @include('partials.landing.how-it-works')
    @include('partials.landing.team')
    @include('partials.landing.partners')
    @include('partials.landing.subscribe')
    @include('partials.landing.roadmap')
    @include('partials.landing.subscribe-alt')
@endsection

@section('footer')
    @include('partials.chat')
    <script type="text/javascript">
        $(function () {
            $('#sidebar').on('activate.bs.scrollspy', function (event) {
                var hash = $("a", event.target).attr('href');

                if(history) {
                    history.replaceState({}, $('title').text(), hash)
                } else {
                    window.location.hash = hash;
                }
            });
        });
    </script>
@endsection