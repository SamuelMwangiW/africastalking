<?php

namespace MShule\AfricasTalking;

use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingGateway
{
    private static AfricasTalking $gateway;

    public function __construct(AfricasTalking $gateway)
    {
        $this->gateway = $gateway;
    }

    public function airtime(): \AfricasTalking\SDK\Airtime
    {
        return $this->gateway->airtime();
    }

    public function application(): \AfricasTalking\SDK\Application
    {
        return $this->gateway->application();
    }
    
    public function content(): \AfricasTalking\SDK\Content
    {
        return $this->gateway->content();
    }

    public function payments(): \AfricasTalking\SDK\Payments
    {
        return $this->gateway->payments();
    }

    public function sms(): \AfricasTalking\SDK\SMS
    {
        return $this->gateway->sms();
    }

    public function token(): \AfricasTalking\SDK\Token
    {
        return $this->gateway->token();
    }

    public function voice(): \AfricasTalking\SDK\Voice
    {
        return $this->gateway->voice();
    }
}

