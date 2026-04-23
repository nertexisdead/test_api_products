<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\ProductsController as ProductsV1Controller;

Route::group([
    'prefix' => 'v1/products',
    'as' => 'v1.products.',
], function () {
    Route::get('/', [ProductsV1Controller::class, 'index'])->name('index');
});
