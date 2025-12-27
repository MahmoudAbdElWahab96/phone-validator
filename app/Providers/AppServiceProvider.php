<?php

namespace App\Providers;

use App\Repositories\Contracts\PhoneNumberRepositoryInterface;
use App\Repositories\PhoneNumberRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PhoneNumberRepositoryInterface::class,
            PhoneNumberRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
