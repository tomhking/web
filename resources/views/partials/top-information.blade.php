<div class="top-info-container">
    <div class="top-text-container">
        @if(config('ico.start')->isFuture())
            <a href="#subscribe-to-get-bonus">
                <p>@lang('home.ico_top_information')</p>
            </a>
        @else
            <a href="#top">
                <p>@lang('home.ico_top_information_2')</p>
            </a>
        @endif

    </div>
</div>