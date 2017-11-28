<?php

$startTime = \Carbon\Carbon::createFromTimestamp(env('ICO_STARTS_AT', 0));
$endTime = \Carbon\Carbon::createFromTimestamp(env('ICO_ENDS_AT', 0));

return [
    'active' => (bool) env('ICO_INFO_AVAILABLE', false),
    'address' => env('ICO_ADDRESS'),
    'start' => $startTime,
    'end' => $endTime,
    'started' => $startTime->isPast(),
    'ended' => $endTime->isPast(),
    'rate' => 10000,
    'bonuses' => [
        [
            'name' => 'Week 1 Bonus',
            'from' => $startTime->copy(),
            'to' => $startTime->copy()->addWeeks(1)->subSecond(),
            'bonus' => 1.15,
        ],
        [
            'name' => 'Week 2 Bonus',
            'from' => $startTime->copy()->addWeek(1),
            'to' => $startTime->copy()->addWeeks(2)->subSecond(),
            'bonus' => 1.10,
        ],
        [
            'name' => 'Week 3 Bonus',
            'from' => $startTime->copy()->addWeeks(2),
            'to' => $startTime->copy()->addWeeks(3)->subSecond(),
            'bonus' => 1.05,
        ]
    ],
    'call_data' => env('ICO_CALL_DATA', '0x'),
];