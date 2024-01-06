<?php

namespace Src\Suppliers\Providers;

use Illuminate\Support\ServiceProvider;

// Repositories
use Src\Suppliers\Repositories\Contracts\ISupplierRepository;
use Src\Suppliers\Repositories\SupplierRepository;

// Services
use Src\Suppliers\Services\Contracts\ISupplierService;
use Src\Suppliers\Services\SupplierService;

class SupplierServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind(ISupplierRepository::class, SupplierRepository::class);

        // Services
        $this->app->bind(ISupplierService::class, SupplierService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
    }
}
