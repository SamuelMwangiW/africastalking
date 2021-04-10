<?php

return [
    'api_key' => env('AFRICASTALKING_API_KEY'),
    'username' => env('AFRICASTALKING_USERNAME'),
    'from' => env('AFRICASTALKING_FROM'),
    'payment_product' => env('AFRICASTALKING_PAYMENT_PRODUCT', 'Sample'),
    'currency_code' => env('AFRICASTALKING_CURRENCY_CODE', 'KES'),
];
