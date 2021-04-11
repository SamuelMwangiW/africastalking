<?php

namespace MShule\AfricasTalking;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\ServiceProvider;
use MShule\AfricasTalking\Exceptions\CouldNotSendNotification;

class AfricasTalkingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/africastalking.php',
            'africastalking'
        );
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/africastalking.php' => config_path('africastalking.php'),
        ]);

        $this->app->when([AfricasTalkingChannel::class,AfricasTalkingGateway::class])
            ->needs(AfricasTalking::class)
            ->give(function () {
                if(!config('africastalking.api_key')) {
                    throw CouldNotSendNotification::missingApiKey();
                }
                if(!config('africastalking.username')) {
                    throw CouldNotSendNotification::missingUsername();
                }
                return new AfricasTalking(
                    config('africastalking.username'),
                    config('africastalking.api_key')
                );
            });
    }
}
