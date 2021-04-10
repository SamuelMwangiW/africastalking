<?php

namespace MShule\AfricasTalking;

use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingGateway
{
    private static AfricasTalking $client;

    public static function getInstance(): AfricasTalking
    {
        self::$client = new AfricasTalking(config('africastalking.username'),config('africastalking.api_key'));

        return self::$client;
    }
}
