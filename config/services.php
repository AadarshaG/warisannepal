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
        'client_id' => env('FACEBOOK_CLIENT_ID', '601839417448009'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', 'c735f6871e2d892d48735c82d892ee84'),
        'redirect' => env('FACEBOOK_REDIRECT', 'http://localhost:8000/callback/facebook'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID', '151885908656-1d1r3csdes80m8vd2e63a326fhqhtcjs.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', 'Bid2uPKLJ22m1PJDL5_0OKQA'),
        'redirect' => env('GOOGLE_REDIRECT', 'http://localhost:8000/callback/google'),
    ],

];
