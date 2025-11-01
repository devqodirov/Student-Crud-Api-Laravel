<?php
 // config/cors.php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'], // vaqtincha * qo'yamiz
    'allowed_headers' => ['*'],
    'supports_credentials' => false,
];
