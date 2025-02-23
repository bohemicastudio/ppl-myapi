<?php

// config for BohemicaStudio/PplMyApi
return [
    'client_id' => env('PPL_MYAPI2_CLIENT_ID'),
    'client_secret' => env('PPL_MYAPI2_CLIENT_SECRET'),
    'production' => env('PPL_MYAPI2_PRODUCTION', false),
    'access_token_url' => env('PPL_MYAPI2_ACCESS_TOKEN_URL', env('PPL_MYAPI2_PRODUCTION') ? 'https://api.dhl.com/ecs/ppl/myapi2/login/getAccessToken' : 'https://api-dev.dhl.com/ecs/ppl/myapi2/login/getAccessToken'),
    'base_url' => env('PPL_MYAPI2_BASE_URL', env('PPL_MYAPI2_PRODUCTION') ? 'https://api.dhl.com/ecs/ppl/myapi2' : 'https://api-dev.dhl.com/ecs/ppl/myapi2'),
];
