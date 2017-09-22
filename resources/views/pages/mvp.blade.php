@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    <div id="bitdegrees-list" class="main bitdegrees-list white-bkg">
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
                        <div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-duration="0.2s">
                            <div class="card left">
                                <a href="{{ $course['url'] }}">
                                    <div class="badge"><span>{{ $course['isFree'] ?? false ? trans('courses.free') : trans('courses.new') }}</span></div>
                                    <div class="degree-header">
                                        <div class="degree-overlay {{ $course['overlay'] }}"></div>
                                        <img class="degree-img" src="{{ $course['image']}}" alt="">
                                    </div>
                                    <div class="info">
                                        <h3>{{ $course['title'] }}</h3>
                                        <p>{{ $course['description'] or trans('courses.coming_soon') }}</p>
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