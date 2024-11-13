<?php

return [
    'home' => '/',
    'waiting_route' => '/waiting-admin-approve',
    'middleware' => ['web', 'auth'],
    'routes' => [
        'enabled' => true,
        'prefix' => 'admin',
        'middleware' => ['web', 'auth']
    ],
    'views' => [
        'layout' => 'layouts.app'
    ]
];
