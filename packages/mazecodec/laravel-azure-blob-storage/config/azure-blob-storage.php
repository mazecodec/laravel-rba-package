<?php

return [
    'driver' => 'azure',
    'name' => env('AZURE_STORAGE_NAME'),
    'connection_string' => env('AZURE_STORAGE_CONNECTION_STRING'),
    'prefix' => env('AZURE_STORAGE_PREFIX'),
    'sasToken' => env('AZURE_STORAGE_SAS_TOKEN'),
    'key' => env('AZURE_STORAGE_KEY'),
    'container' => env('AZURE_STORAGE_CONTAINER'),
    'url' => env('AZURE_STORAGE_URL'),
    'endpoint' => env('AZURE_STORAGE_ENDPOINT'),
    'retry' => [
        // number of retries, default: 3
        'tries' => (int)env('AZURE_STORAGE_RETRIES', 3),
        // wait interval in ms, default: 1000ms
        'interval' => (int)env('AZURE_STORAGE_INTERVAL', 500),
        // how to increase the wait interval, options: linear, exponential, default: linear
        'increase' => env('AZURE_STORAGE_INCREASE', 'exponential')
    ]
];
