<?php

/**
 * AMQP Connection Config
 */

return [
    'host' => env('AMQP_HOST'),
    'port' => env('AMQP_PORT'),
    'user' => env('AMQP_USER'),
    'password' => env('AMQP_PASSWORD'),
    'vhost' => env('AMQP_VHOST', '/'),
    'exchange' => env('AMQP_EXCHANGE', ''),
];