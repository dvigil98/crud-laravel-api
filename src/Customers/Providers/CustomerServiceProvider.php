<?php

namespace Src\Customers\Providers;

use Illuminate\Support\ServiceProvider;

// Repositories
use Src\Customers\Repositories\Contracts\ICustomerRepository;
use Src\Customers\Repositories\CustomerRepository;

// Services
use Src\Customers\Services\Contracts\ICustomerService;
use Src\Customers\Services\CustomerService;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind(ICustomerRepository::class, CustomerRepository::class);

        // Services
        $this->app->bind(ICustomerService::class, CustomerService::class);
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
