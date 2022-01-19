<?php

namespace App\Providers;

use App\Library\Services\Decanto;
use App\Library\Services\Evanto;
use Illuminate\Support\ServiceProvider;

class EvantoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Contracts\CustomServiceInterface', function ($app) {
            return new Decanto();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
