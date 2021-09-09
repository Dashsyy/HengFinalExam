<?php

use App\Http\Controllers\ProductController;
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
    return view('frontend.index');
});
Route::get('/admin', function () {
    return view('admin.index');
});
//route to category
Route::get('/product', [ProductController::class, 'index']);
Route::delete('/product/{category_id}', [ProductController::class, 'destroy']);
