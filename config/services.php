<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    
    /* Social Media */
    'facebook' => [
        'client_id'     => env("FB_ID",'778538529153194'),
        'client_secret' => env("FB_SECRET",'8677c7a4f2d6f600b622a23a6c2ab790'),
        'redirect'      => env("FB_URL",'https://ifcoding-16.000webhostapp.com/auth/facebook/callback'),
    ],
    'google' => [
        'client_id'     => env("GOOGLE_ID",'321838084719-6t7k2lu18bo0vlh2nh1vonr50pfhqnmq.apps.googleusercontent.com'),
        'client_secret' => env("GOOGLE_SECRET",'h4ABX89iffL6UgJsX_yEWbwg'),
        'redirect'      => env("GOOGLE_URL",'https://ifcoding-16.000webhostapp.com/auth/google/callback'),
    ],
];
