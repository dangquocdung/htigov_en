<?php
return [
    'admin_auth' => env('LARAPOLL_ADMIN_AUTH_MIDDLEWARE', 'managerlevel'),
    'admin_guard' => env('LARAPOLL_ADMIN_AUTH_GUARD', 'auth'),
    'pagination' => env('LARAPOLL_PAGINATION', 15),
    'prefix' => env('LARAPOLL_PREFIX', 'tham-do-y-kien'),
    'results' => '',
    'radio' => '',
    'checkbox' => '',
];
