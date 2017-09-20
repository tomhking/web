@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    <div id="bitdegrees-list" class="main bitdegrees-list white-bkg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2">
                    <div class="title-container">
                        <h2 class="title text-center">What problems does BitDegree solve?</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p class="subtitle">We are establishing BitDegree on a solid ground of 29 million existing user base of Hostinger and 000webhost - loyal, web passionate, learning and innovation open worldwide community.
                        Our vision at Hostinger is to enable millions of people around the globe to unlock the power
                        of Internet and give them the empowerment to learn, create and grow.</p>
                </div>
            </div>

            @foreach($courses as $i => $course)
                @if($i % 3 == 0)
                    <div class="row cards">
                        @endif
                        <div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-duration="0.2s">
                            <div class="card left">
                                <a href="{{ $course['url'] }}">
                                    <div class="badge"><span>{{ $course['isFree'] ?? false ? "FREE" : "NEW" }}</span></div>
                                    <div class="degree-header">
                                        <div class="degree-overlay {{ $course['overlay'] }}"></div>
                                        <img class="degree-img" src="{{ $course['image']}}" alt="">
                                    </div>
                                    <div class="info">
                                        <h3>{{ $course['title'] }}</h3>
                                        <p>{{ $course['description'] or 'Coming Soon' }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if($i % 3 == 2 || $loop->last)
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    @include('partials.subscribe-bottom')

@endsection