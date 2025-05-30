<?php

namespace App\Providers;

use App\Contracts\DomainCheckServiceInterface;
use App\Services\DomainCheckService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DomainCheckServiceInterface::class, DomainCheckService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
