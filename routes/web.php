<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', function () {
    return view('client');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/login', function () {
    return view('auth');
});

Route::get('/admin/bestseller', function () {
    return view('bestseller');
});

Route::post('/product/create',  [ProductsController::class, "create"]);
