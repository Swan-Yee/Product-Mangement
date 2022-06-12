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

    'facebook' => [
        'client_id' => '1049237815969823',
        'client_secret' => 'a23ddd57316d718753dabbe4435c1a24',
        'redirect' => 'http://localhost:8000/facebook/callback',
    ],

    'google' => [
        'client_id' => '1050732819684-31dp8f1tev9i2f1aiog8bmb0q6pbbarf.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/google/callback',
    ],
];
