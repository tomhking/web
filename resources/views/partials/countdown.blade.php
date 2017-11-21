<div class="countdown" data-time-left="{{ $timeLeft }}">
    <div class="time-amount">
        <span class="time-left-days">{{ floor($timeLeft / 60 / 60 / 24) }}</span>
        <span class="time-value">days</span>:
    </div>
    <div class="time-amount">
        <span class="time-left-hours">{{ str_pad(floor($timeLeft / 60 / 60) % 24, 2, 0, STR_PAD_LEFT) }}</span>
        <span class="time-value">hours</span>
    </div>:<div class="time-amount">
        <span class="time-left-minutes">{{ str_pad(floor($timeLeft / 60) % 60, 2, 0, STR_PAD_LEFT) }}</span>
        <span class="time-value">minutes</span>
    </div>:<div class="time-amount">
    <span class="time-left-seconds">{{ str_pad($timeLeft % 60, 2, 0, STR_PAD_LEFT) }}</span>
        <span class="time-value">seconds</span>
    </div>
</div>

@push('body-scripts')
    <script>
        jqWait(function () {
            $('[data-time-left]').each(function () {
                var timer = this;
                var secondsLeft = parseInt($(timer).attr('data-time-left'));
                var initializedAt = Math.floor(Date.now()/1000), remainingAtInit = secondsLeft;

                if(secondsLeft === 0) {
                    return;
                }

                var interval = setInterval(function () {
                    var currentTimestamp = Math.floor(Date.now() / 1000);
                    if(Math.abs(initializedAt + remainingAtInit - currentTimestamp - secondsLeft) > 5) {
                        secondsLeft = (initializedAt + remainingAtInit) - currentTimestamp;
                    }
                    updateTimer(--secondsLeft < 0 ? 0 : secondsLeft);

                    if(secondsLeft <= 0) {
                        clearInterval(interval);
                        location.reload();
                    }
                }, 1000);

                function updateTimer(timeLeft, context) {
                    var seconds = timeLeft%60,
                        minutes = Math.floor(timeLeft/60)%60,
                        hours = Math.floor(timeLeft/60/60)%24,
                        days = Math.floor(timeLeft/60/60/24);

                    $('.time-left-seconds', context).text((seconds < 10 ? '0' : '') + seconds);
                    $('.time-left-minutes', context).text((minutes < 10 ? '0' : '') + minutes);
                    $('.time-left-hours', context).text((hours < 10 ? '0' : '') + hours);
                    $('.time-left-days', context).text(days);
                }
            });
        });
    </script>
@endpush