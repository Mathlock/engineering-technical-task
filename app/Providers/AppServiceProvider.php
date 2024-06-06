<?php

namespace App\Providers;

use App\Repositories\PropertyRepository;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\RoomRepository;
use App\Repositories\RoomRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(RoomRepositoryInterface::class, function () {
            return new RoomRepository();
        });

        $this->app->bind(PropertyRepositoryInterface::class, function () {
            return new PropertyRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
