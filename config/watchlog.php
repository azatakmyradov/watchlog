<?php

/*
|--------------------------------------------------------------------------
| Watchlog Service Configuration
|--------------------------------------------------------------------------
|
| Here you may configure the connection details for the Watchlog service.
| This includes the base URL, project ID, and a secret key required to
| authenticate requests. You can also specify the queue driver that
| should be used for logging data to the Watchlog API.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Watchlog Base URL
    |--------------------------------------------------------------------------
    |
    | This value is the base URL for the Watchlog API. It should be set in
    | your environment file as WATCHLOG_BASE_URL. The service will use
    | this URL to connect and send data for logging purposes.
    |
    */
    'base_url' => env('WATCHLOG_BASE_URL'),

    /*
    |--------------------------------------------------------------------------
    | Watchlog Project ID
    |--------------------------------------------------------------------------
    |
    | This is the unique identifier for your project within the Watchlog
    | service. Set this in your .env file as WATCHLOG_PROJECT_ID. This ID
    | will help the service to log data to the correct project space.
    |
    */
    'project_id' => env('WATCHLOG_PROJECT_ID'),

    /*
    |--------------------------------------------------------------------------
    | Watchlog Secret Key
    |--------------------------------------------------------------------------
    |
    | The secret key is used to authenticate your application’s requests
    | with the Watchlog API. Set it as WATCHLOG_SECRET in your environment
    | file. Ensure that this value is kept secure and never shared.
    |
    */
    'secret' => env('WATCHLOG_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Queue Driver for Watchlog
    |--------------------------------------------------------------------------
    |
    | Here you may specify which queue connection should be used when
    | dispatching logging jobs to Watchlog. By default, the "sync" driver
    | will be used. You can override this in your .env file using
    | WATCHLOG_DRIVER.
    |
    | Supported drivers: "sync", "queue"
    |
    */
    'driver' => env('WATCHLOG_DRIVER', 'sync'),

];
