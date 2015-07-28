<?php

return array(

    /*
     |--------------------------------------------------------------------------
     | Provider
     |--------------------------------------------------------------------------
     | Sendmail use application send_mail config
     */

    'provider' => [
        'sms' => 'send_sms',
        'email' => 'send_mail',
    ],
    /*
     |--------------------------------------------------------------------------
     | Providers configuration
     |--------------------------------------------------------------------------
     */

    'providers' => [
        'mailgun' => include(__DIR__ . '/laravel-mailer-providers/mailgun.php'),
    ],

    /*
     |--------------------------------------------------------------------------
     | Autoloaded Service Providers
     |--------------------------------------------------------------------------
     */
    'service_providers' => [
        'Bogardo\Mailgun\MailgunServiceProvider'
    ]

);
