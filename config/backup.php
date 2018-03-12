<?php

return [
    'default' => env('RV_BACKUP_DRIVER', 'local'),

    'disks' => [
        'local' => [
            'root' => storage_path('app/backup'),
        ],
    ],

    'backup_database' => true,
    'folder_to_backup' => storage_path('app/public'),

    'route' => [
        'prefix' => env('RV_BACKUP_ROUTE_PREFIX', 'backups'),
        'middleware' => ['web'],
        'options' => [],
    ],
    
    // assets libraries, you can remove if it's existed on your project
    'libraries' => [
        'stylesheets' => [
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
            'vendor/backup/packages/toastr/toastr.min.css',
            'vendor/backup/packages/fancybox/jquery.fancybox.min.css',
            'vendor/backup/packages/icheck/minimal/blue.css',
            'vendor/backup/packages/font-awesome/css/font-awesome.min.css',
            'vendor/backup/css/backup.css?v=' . env('RV_BACKUP_VERSION', time()),
        ],
        'javascript' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js', // Comment it if your site has it already
            'vendor/backup/packages/toastr/toastr.min.js',
            'vendor/backup/packages/fancybox/jquery.fancybox.min.js',
            'vendor/backup/packages/icheck/icheck.min.js',
            'vendor/backup/js/backup.js?v=' . env('RV_BACKUP_VERSION', time()),
        ],
    ],
];
