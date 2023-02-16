<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Maket;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product/{id}', function ($id) {
    return view('welcome');
});
Route::get('/user/{id}', function ($id) {
    return view('welcome');
});


// product
Route::post('/product', [ProductsController::class,'CreateProduct']);
Route::get('/product/{id}', [ProductsController::class,'CreateProductView']);
Route::put('/product/{id}/edit');
Route::put('/product/{id}/delete');
// Auth
Route::post('/register', [UsersController::class,'CreateUser']);
Route::get('/register', [UsersController::class,'CreateUserView']);
Route::post('/login', [UsersController::class,'Login']);
Route::get('/login', [UsersController::class,'LoginView']);
Route::get('/profile/{id}', [UsersController::class,'LoginView']);
Route::put('/profile');
Route::delete('/profile');
// maket 
Route::get('/maket',[Maket::class,'MaketView']);