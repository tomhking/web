@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list', 'hideFooter' => true])

@section('content')

    <div class="container" style="margin-top:2em">
        <div class="alert alert-warning">{{ $message }}</div>
        <a href="{{ route_lang('home') }}" class="btn btn-default">Go to the home page</a>
        <a href="{{ route_lang('login') }}" class="btn btn-default">Go to log in page</a>
    </div>

@endsection