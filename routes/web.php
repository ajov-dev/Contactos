<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthFormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaController;


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
Route::group(['middleware' => ['auth:sanctum']], function () {
    route::post('printer', function () {
        return dump(request()->all());
    })->name('printer.post');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    route::get('printer', function () {
        return dump(request()->all());
    })->name('printer.get');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return redirect()->route('signin_form');
    })->name('home');
    Route::get('signin', [AuthFormController::class, 'signin_form'])->name('signin_form');
    Route::get('signup', [AuthFormController::class, 'signup_form'])->name('signup_form');
    Route::post('signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('signout', [AuthController::class, 'signout'])->name('signout');
});

// contact routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user/contact/dashboard', [ContactoController::class, 'index_get'])->name('contact.index.get');
    Route::get('user/contact/create', [ContactoController::class, 'create_get'])->name('contact.create.get');
    Route::post('user/contact/create', [ContactoController::class, 'create_post'])->name('contact.create.post');
    Route::post('user/contact/update', [ContactoController::class, 'update_post'])->name('contact.update.post');
    Route::post('user/contact/destroy', [ContactoController::class, 'destroy_post'])->name('contact.destroy.post');
});
// category routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user/category', [CategoriaController::class, 'index_get'])->name('category.index.get');
    Route::get('user/category/create', [CategoriaController::class, 'create_get'])->name('category.create.get');
    Route::post('user/category/create', [CategoriaController::class, 'create_post'])->name('category.create.post');
    Route::post('user/category/update', [CategoriaController::class, 'update_post'])->name('category.update.post');
    Route::post('user/category/destroy', [CategoriaController::class, 'destroy_post'])->name('category.destroy.post');
});
