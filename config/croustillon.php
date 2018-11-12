<?php

return [
    'policy' => \Elhebert\Croustillon\Policies\Basic::class,

    'policy_cookie' => env('CROUSTILLON_COOKIE_POLICY', 'cookie_policy'),

    'path' => '/croustillon',
    'enable_routes' => env('CROUSTILLON_ENABLE_ROUTES', true),

    'middleware' => ['web'],

    'types' => [
        \Elhebert\Croustillon\Categories\Mandatory::class,
        \Elhebert\Croustillon\Categories\Preferences::class,
        \Elhebert\Croustillon\Categories\Analytics::class,
        \Elhebert\Croustillon\Categories\Social::class,
        \Elhebert\Croustillon\Categories\Retargetting::class,
    ],
];
