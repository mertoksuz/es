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

    'email_search' => [
        'api_key' => env('EMAIL_SEARCH_API_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyIiwiaWF0IjoxNzA2NjMwNDI5LCJleHAiOjE3MDY3MTY4Mjl9.4-FHdjtDteDRYEL0nisZe_xqPkSIHTMLd-v-duppOAM'),
        'providers' => [
            [
                'name' => 'Provider1',
                'url' => 'http://interview-api.stage1.beecoded.ro/mock/provider1/email', // Replace with the actual URL
            ],
            [
                'name' => 'Provider2',
                'url' => 'http://interview-api.stage1.beecoded.ro/mock/provider2/email', // Replace with the actual URL
            ],
            [
                'name' => 'Provider3',
                'url' => 'http://interview-api.stage1.beecoded.ro/mock/provider3/email', // Replace with the actual URL
            ],
        ],
    ],
];
