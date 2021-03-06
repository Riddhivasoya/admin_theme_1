<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'linkedin' => [
        'client_id' => '86is80h5e1rj7v',
        'client_secret' => 'UnwBy1DVpb1Vuksv',
        'redirect' => 'http://localhost:8000/auth/linkedin/callback'
    ],
    'google' => [
        'client_id' => '519139270182-omg74antk57ut5h9ji64uv66v8ga69pd.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback'
    ],

];
