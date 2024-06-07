<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | You may adjust the settings below to configure the CORS behavior for
    | your application. These settings determine the headers that are set
    | on responses to cross-origin requests. You can find more information
    | about these settings at: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | This option defines the paths that will be accessible via cross-origin
    | requests. You may specify the paths using asterisks to match multiple
    | routes or specify individual routes.
    |
    */

    'paths' => ['api/*', 'access', '*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | This option determines which HTTP methods are allowed when accessing
    | resources via cross-origin requests. By default, all methods are allowed.
    | You may specify individual methods if needed.
    |
    */

    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | This option defines the origins that are allowed to access resources via
    | cross-origin requests. You may specify individual origins or use an
    | asterisk (*) to allow any origin.
    |
    */

    'allowed_origins' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | This option defines patterns that can be used to match origins. This is
    | useful if you need to allow access from a dynamic set of origins.
    |
    */

    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | This option defines the headers that are allowed to be sent with a
    | cross-origin request. By default, all headers are allowed.
    |
    */

    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | This option defines the headers that are allowed to be exposed to the
    | browser when a cross-origin request is made.
    |
    */

    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | This option defines the maximum age (in seconds) that the results of a
    | preflight request can be cached by the client.
    |
    */

    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | This option determines whether credentials (such as cookies or HTTP
    | authentication) are allowed to be included with cross-origin requests.
    |
    */

    'supports_credentials' => false,

];
