<?php

namespace NotificationChannels\FortysixElks;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as HttpClient;

class FortysixElksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $sender = $this->app->make('config')->get('services.fortysixelks.sender');

        $this->app->when(FortysixElks::class)
            ->needs('$sender')
            ->give($sender);

        $httpClient = $this->app->singleton(HttpClient::class, function ($app) {
            $username = $this->app->make('config')->get('services.fortysixelks.username');
            $password = $this->app->make('config')->get('services.fortysixelks.password');
            return new HttpClient(
                [
                    'headers' =>
                    [
                        'Content-Type' => 'application/x-www-urlencoded'
                    ],
                    'auth'    =>
                    [
                        $username,
                        $password
                    ]
                ]
            );
        });
        $this->app->when(FortysixElks::class)
            ->needs('$httpClient')
            ->give($httpClient);
    }
}
