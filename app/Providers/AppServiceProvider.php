<?php

namespace App\Providers;

use App\Interfaces\RegionInterface;
use App\Services\DB_Region;
use App\Services\Direct_Region;
use Illuminate\Support\ServiceProvider;

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
        if (config('keys.swap_search') == 'db') {
            $this->app->bind(RegionInterface::class, DB_Region::class);
        }
        else if (config('keys.swap_search') == 'direct') {
            $this->app->bind(RegionInterface::class, Direct_Region::class);
        }
    }
}
