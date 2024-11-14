<?php

return [
    'home' => '/',
    'waiting_route' => '/waiting-admin-approve', //add prefix if define
    'middleware' => ['web', 'auth'],
    'routes' => [
        'enabled' => true,
        'prefix' => '',
        'middleware' => ['web', 'auth']
    ],
    'views' => [
        'waiting' => 'waiting-admin-approval'
    ]
];
