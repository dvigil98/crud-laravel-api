<?php

use Illuminate\Support\Facades\Route;
use Src\Suppliers\Controllers\SupplierController;

Route::prefix('/api/v1/suppliers')
    ->namespace('Src\Suppliers\Controllers')
    ->group(function () {

        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/', [SupplierController::class, 'store']);
        Route::get('/{id}', [SupplierController::class, 'show']);
        Route::put('/{id}', [SupplierController::class, 'update']);
        Route::delete('/{id}', [SupplierController::class, 'destroy']);
        Route::get('/{critery}/{value}/search', [SupplierController::class, 'search']);
    });
