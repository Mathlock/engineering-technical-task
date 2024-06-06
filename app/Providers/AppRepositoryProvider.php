<?php

namespace App\Providers;

use App\Repositories\PropertyRepository;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\RoomRepository;
use App\Repositories\RoomRepositoryInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
