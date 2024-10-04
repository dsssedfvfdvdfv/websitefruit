<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class GHNServiceProvider extends ServiceProvider
{
  
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client();
        });
    }

  
    public function getCities()
    {
        $client = app(Client::class);
        $response = $client->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/province', [
            'headers' => [
                'Token' => '0da3fb68-638c-11ee-b394-8ac29577e80e',
            ],
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
