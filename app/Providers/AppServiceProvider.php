<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\ICustomerRepository;
use App\Repositories\CustomerRepository;

use App\Services\Contracts\ICustomerService;
use App\Services\CustomerService;

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

        // Services
        $this->app->bind(ICustomerService::class, CustomerService::class);
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
