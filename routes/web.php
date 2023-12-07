<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthFormController;
use App\Http\Controllers\DashboardController;


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

route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect('signin');
    })->name('home');
    Route::get('signin', [AuthFormController::class, 'signin_form'])->name('signin_form');
    Route::get('signup', [AuthFormController::class, 'signup_form'])->name('signup_form');
    Route::post('signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    route::post('printer', function () {
        return dump(request()->all());
    })->name('printer');
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('user/create/contact',[ContactoController::class, 'create_view'])->name('contact.create.view');

    Route::POST('signout', [AuthController::class, 'signout'])->name('signout');
});
