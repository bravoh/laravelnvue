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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * Clients management
 * */
Route::prefix('/clients')->group(function () {
    Route::get('/', [\App\Http\Controllers\ClientsController::class, 'index']);
    Route::get('/{client}', [\App\Http\Controllers\ClientsController::class, 'show']);
    Route::post('/store', [\App\Http\Controllers\ClientsController::class, 'store']);
    Route::patch('/{client}', [\App\Http\Controllers\ClientsController::class, 'update']);
    Route::post('/destroy', [\App\Http\Controllers\ClientsController::class, 'destroyMass']);
    Route::delete('/{client}/destroy', [\App\Http\Controllers\ClientsController::class, 'destroy']);
});

/*
 * Products management
 * */
Route::prefix('/products')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/{product}', [\App\Http\Controllers\ProductController::class, 'show']);
    Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store']);
    Route::patch('/{product}', [\App\Http\Controllers\ProductController::class, 'update']);
    Route::post('/destroy', [\App\Http\Controllers\ProductController::class, 'destroyMass']);
    Route::delete('/{product}/destroy', [\App\Http\Controllers\ProductController::class, 'destroy']);
});

/*
 * Supplier management
 * */
Route::prefix('/suppliers')->group(function () {
    Route::get('/', [\App\Http\Controllers\SupplierController::class, 'index']);
    Route::get('/{supplier}', [\App\Http\Controllers\SupplierController::class, 'show']);
    Route::post('/store', [\App\Http\Controllers\SupplierController::class, 'store']);
    Route::patch('/{supplier}', [\App\Http\Controllers\SupplierController::class, 'update']);
    Route::post('/destroy', [\App\Http\Controllers\SupplierController::class, 'destroyMass']);
    Route::delete('/{supplier}/destroy', [\App\Http\Controllers\SupplierController::class, 'destroy']);
});

/*
 * Order management
 * */


/*
 * Current user
 * */
Route::prefix('/user')->group(function () {
    Route::get('/', [\App\Http\Controllers\CurrentUserController::class, 'show']);
    Route::patch('/', [\App\Http\Controllers\CurrentUserController::class, 'update']);
    Route::patch('/password', [\App\Http\Controllers\CurrentUserController::class, 'updatePassword']);
});

/*
 * File upload (e.g. avatar)
 * */
Route::post('/files/store', [\App\Http\Controllers\FilesController::class, 'store']);
