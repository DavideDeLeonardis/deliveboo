<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        Paginator::useBootstrap();

        $this->app->singleton(Gateway::class, function($app){
            return new Gateway([

                'environment' => 'sandbox',
                'merchantId' => '4sjx493rm6vt8q2c',
                'publicKey' => '539phtdsx375fjwc',
                'privateKey' => '307fe81d97d44c7182edc38983c574e8'
            ]);
        });
    }
}

// BraintreeGateway gateway = new BraintreeGateway(
//     Environment.SANDBOX,
//     "4sjx493rm6vt8q2c",
//     "539phtdsx375fjwc",
//     "307fe81d97d44c7182edc38983c574e8"
//   );
