<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MaketController;
use App\Http\Controllers\commentController;
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

// product
Route::post('/product', [ProductController::class,'CreateProduct'])->middleware("auth");
Route::get('/product', [ProductController::class,'CreateProductView'])->middleware("auth");
Route::get('/product/{id}', [ProductController::class,'ProductView']);
Route::put('/product/{id}/edit')->middleware("auth");
Route::delete('/product/{id}/delete')->middleware("auth");
// Auth
Route::post('/register', [UsersController::class,'CreateUser']);
Route::get('/register', [UsersController::class,'CreateUserView'])->name('register');
Route::post('/login', [UsersController::class,'Login']);
Route::get('/login', [UsersController::class,'LoginView'])->name('login');
Route::get('/profile/{id?}', [UsersController::class,'GetProfile']);
Route::put('/profile/edit')->middleware("auth");
Route::delete('/profile/delete')->middleware("auth");
// maket 
Route::get('/maket',[MaketController::class,'MaketView']);
Route::post('/maket/buy',[MaketController::class,'Buy'])->middleware("auth");

//commant
