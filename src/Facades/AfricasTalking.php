<?php
namespace MShule\AfricasTalking\Facades;

use \Illuminate\Support\Facades\Facade;
use MShule\AfricasTalking\AfricasTalkingGateway;

class AfricasTalking extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AfricasTalkingGateway::class;
    }
}
