<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Repositories
use App\Repositories\Contracts\ICustomerRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\Contracts\ISupplierRepository;
use App\Repositories\SupplierRepository;

// Services
use App\Services\Contracts\ICustomerService;
use App\Services\CustomerService;
use App\Services\Contracts\ISupplierService;
use App\Services\SupplierService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind(ICustomerRepository::class, CustomerRepository::class);
        $this->app->bind(ISupplierRepository::class, SupplierRepository::class);

        // Services
        $this->app->bind(ICustomerService::class, CustomerService::class);
        $this->app->bind(ISupplierService::class, SupplierService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
