<?php

return [
    'debug' => false,
    'log' => true,
    'verbosity' => 1,
    'database' => [
        'scraps_table' => env('SCAVENGER_SCRAPS_TABLE', 'scavenger_scraps'),
    ],
    'daemon' => [ 
        'model' => 'App\\User',
        'id_prop' => 'email',
        'id' => 'daemon@scavenger.reliqarts.com',
        'info' => [
            'name' => 'Scavenger Daemon',
            'password' => 'pass'
        ]
    ],
    'hash_algorithm' => 'sha512',
    'storage' => [
        'dir' => env('SCAVENGER_STORAGE_DIR', 'scavenger'),
    ],

    'targets' => [
        // Google SERP:
        'google' => [
            'example' => false,
            'serp' => true,
            'model' => 'App\\GoogleResult',
            'source' => 'https://www.google.com',
            'search' => [
                'keywords' => ['dog'],
                'form' => [
                    'selector' => 'form[name="f"]',
                    'keyword_input_name' => 'q',
                ]
            ],
            'pages' => 2,
            'pager' => [
                'selector' => '#foot > table > tr > td.b:last-child',
                'text' => 'Next',
            ],
            'markup' => [
                '__result' => 'div.g',
                'title' => 'h3 > a',
                'description' => '.st',
                'link' => '__link',
                'position' => '__position',
            ],
        ],
    ],
];