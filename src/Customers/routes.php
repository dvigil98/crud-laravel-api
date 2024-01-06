<?php

use Illuminate\Support\Facades\Route;
use Src\Customers\Controllers\CustomerController;

Route::prefix('/api/v1/customers')
    ->namespace('Src\Customers\Controllers')
    ->group(function () {

        Route::get('/', [CustomerController::class, 'index']);
        Route::post('/', [CustomerController::class, 'store']);
        Route::get('/{id}', [CustomerController::class, 'show']);
        Route::put('/{id}', [CustomerController::class, 'update']);
        Route::delete('/{id}', [CustomerController::class, 'destroy']);
        Route::get('/{critery}/{value}/search', [CustomerController::class, 'search']);
    });
