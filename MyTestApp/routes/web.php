<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('forms');
Route::get('/catalog', [\App\Http\Controllers\PageController::class, 'catalog'])->name('catalog');
Route::post('/deleteItem', [\App\Http\Controllers\TestObjectController::class, 'destroy']);
Route::middleware('auth:sanctum')->group(function () {
        Route::match(['get', 'post'], '/createData', [\App\Http\Controllers\TestObjectController::class, 'createData']);
        Route::match(['get', 'post'], '/setData', [\App\Http\Controllers\TestObjectController::class, 'setData']);
    }
);
