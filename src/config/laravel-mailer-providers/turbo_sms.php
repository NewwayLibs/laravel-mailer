<?php

return array (

    /*
    |--------------------------------------------------------------------------
    | URL
    |--------------------------------------------------------------------------
    |
    | URL for the SOAP API
    |
    */

    'url' => 'http://turbosms.in.ua/api/wsdl.html',

    /*
    |--------------------------------------------------------------------------
    | Credentials for auth
    |--------------------------------------------------------------------------
    */

    'auth' => array (

        'login'    => env('TURBO_SMS_LOGIN'),
        'password' => env('TURBO_SMS_PASSWORD'),
    ),

    /*
    |--------------------------------------------------------------------------
    | Sender name
    |--------------------------------------------------------------------------
    */

    'sender' => env('TURBO_SMS_SENDER'),

);
