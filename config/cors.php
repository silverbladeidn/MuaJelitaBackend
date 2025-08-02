<?php

return [
    'allowed_origins' => [
        'https://muabyjelita.aribiya.com', // Frontend React domain
        'https://aribiya.com', // Jika perlu akses dari domain utama
    ],

    'allowed_methods' => ['*'],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
