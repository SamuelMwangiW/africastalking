<?php

namespace MShule\AfricasTalking;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\ServiceProvider;
use MShule\AfricasTalking\AfricasTalkingChannel;
use MShule\AfricasTalking\Exceptions\CouldNotSendNotification;

class AfricasTalkingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(AfricasTalkingChannel::class)
            ->needs(AfricasTalking::class)
            ->give(function () {
                $config = config('services.africastalking');
                if(!$config['api_key']) {
                    throw CouldNotSendNotification::missingApiKey();
                }
                if(!$config['username']) {
                    throw CouldNotSendNotification::missingUsername();
                }
                return new AfricasTalking(
                    $config['username'],
                    $config['api_key']
                );
            });
    }
}
