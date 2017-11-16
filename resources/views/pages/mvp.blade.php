@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])
@section('content')

    <div id="bitdegrees-list" class="main bitdegrees-list white-bkg">

        <div class="container top mvp-available">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-content">
                        <div class="col-xs-12 col-sm-12 col-md-12  mvp-wrapper">
                            <div class="content front-content" id="content">
                                    <div class="container-fluid communicate">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-10 col-md-push-1 text-center">
                                                <h6>MVP AVAILABLE:</h6>
                                                <h1>Solidity Smart Contract Development</h1>
                                                <p class="subtitle"><b>Solidity</b> is a programming language for writing smart contracts which run on Ethereum Virtual Machine on Blockchain. It is a contract-oriented, high-level language whose syntax is similar to that of JavaScript. It's designed to target the Ethereum Virtual Machine. Master this course to become a Smart Contract Developer.</p>
                                            </div>
                                            <div class="mvp-cta text-center">
                                                <a href="https://solidity.bitdegree.org/" class="cta-btn">START LEARNING</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2">
                    <div class="title-container">
                        <h2 class="title text-center">@lang('courses.title')</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p class="subtitle">@lang('courses.subtitle')</p>
                </div>
            </div>

            @foreach($courses as $i => $course)
                @if($i % 3 == 0)
                    <div class="row cards">
                        @endif
                        <div class="col-xs-12 col-sm-4">
                            <div class="card left">
                                <a href="{{ $course['url'] }}">
                                        @if($course['isFree'] ?? false)
                                            <div class="badge"><span>{{ trans('courses.free') }}</span></div>
                                        @endif
                                        @if($course['isMvp'] ?? false)
                                                <div class="badge-mvp"><span>{{ trans('courses.mvp') }}</span></div>
                                        @endif
                                        @if($course['isNew'] ?? false)
                                            <div class="badge"><span>{{ trans('courses.new') }}</span></div>
                                        @endif
                                        @if($course['isBeta'] ?? false)
                                            <div class="badge-mvp"><span>{{ trans('courses.beta') }}</span></div>
                                        @endif
                                        @if($course['isSoon'] ?? false)
                                            <div class="badge"><span>{{ trans('courses.soon') }}</span></div>
                                        @endif
                                        <div class="degree-header">
                                        <div class="degree-overlay {{ $course['overlay'] }}"></div>
                                        <img class="degree-img" src="{{ $course['image']}}" alt="">
                                    </div>
                                    <div class="info">
                                        <h3>{{ $course['title'] }}</h3>
                                        <p>{{ $course['description'] or trans('courses.coming_soon') }}</p>

                                        @if($course['sponsor'] ?? false )
                                         <div class="by-sponsor">by</div>
                                        <img class="sponsor-img" src="{{ $course['sponsor']}}" alt="">
                                        @endif
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