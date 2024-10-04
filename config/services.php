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
    'firebase' => [
        'apiKey' => env('AIzaSyC4-fhZ5fHDS_lDK1JmU0i0AZFj1Nus8UI', ''),
        'authDomain' => env('webstorbook.firebaseapp.com', ''),
        'databaseURL' => env('//webstorbook.firebaseio.com', ''),
        'projectId' => env('webstorbook', ''),
        'storageBucket' => env('webstorbook.appspot.com', ''),
        'messagingSenderId' => env('1:716743241056:web:5daf6ef5a6d8bcdf190205', ''),
        'appId' => env('G-Y95VCJCYYC', ''),
    ],
 
];
