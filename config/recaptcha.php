<?php
/**
 * Copyright (c) 2017 - present
 * LaravelGoogleRecaptcha - recaptcha.php
 * author: Roberto Belotti - roby.belotti@gmail.com
 * web : robertobelotti.com, github.com/biscolab
 * Initial version created on: 12/9/2018
 * MIT license: https://github.com/biscolab/laravel-recaptcha/blob/master/LICENSE
 */

/**
 * To configure correctly please visit https://developers.google.com/recaptcha/docs/start
 */
return [

    /**
     *
     * The site key
     * get site key @ www.google.com/recaptcha/admin
     *
     */
    'api_site_key'      => env('RECAPTCHA_SITE_KEY', ''),

    /**
     *
     * The secret key
     * get secret key @ www.google.com/recaptcha/admin
     *
     */
    'api_secret_key'    => env('RECAPTCHA_SECRET_KEY', ''),

    /**
     *
     * ReCATCHA version
     * Supported: "v2", "invisible",
     *
     * get more info @ https://developers.google.com/recaptcha/docs/versions
     *
     */
    'version'           => env('RECAPTCHA_VERSION', 'v2'), // supported: v3|v2|invisible 

    'curl_timeout'      => env('RECAPTCHA_CURL_TIMEOUT', 10),

    /**
     *
     * IP addresses for which validation will be skipped
     *
     */
    'skip_ip'        => [],

    // @since v3.2.0
    'default_validation_route' => env('RECAPTCHA_DEFAULT_VALIDATION_ROUTE', 'biscolab-recaptcha/validate'),

    // @since v3.2.0
    'default_token_parameter_name' => env('RECAPTCHA_DEFAULT_TOKEN_PARAMETER_NAME', 'token')
];