<?php

return [
    'tenant_id' => env('AUTHSIGNAL_TENANT_ID'),
    'api_key' => env('AUTHSIGNAL_API_KEY'),
    'api_hostname' => env('AUTHSIGNAL_API_HOSTNAME', 'https://api.authsignal.com')
];
