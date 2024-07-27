<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::delete('/products/{id}', 'delete');
    Route::post('/products/move', 'move');
});
