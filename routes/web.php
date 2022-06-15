<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\TimeController;
use App\Models\Activity;
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

/* Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('index');
})->name('home'); */

Route::middleware(['auth:sanctum', 'verified'])->get('/',[HomeController::class,'index'])->name('home');

//!RUTAS DE LA APLICACION
//*productos
Route::resource('product',ProductController::class)->names('products');
//*categorias
Route::resource('categories',CategoryController::class)->names('categories');
//*ventas
Route::resource('sells',SellController::class)->names('sells');
