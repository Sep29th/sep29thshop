<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::group([], function () {

  Route::get('/', [UserController::class, 'mainPage'])
    ->name('User.MainPage');

  Route::get('/login', function (Request $request) {
    $request->session()->forget('user_id');
    Cookie::queue(Cookie::forget('user_id'));
    return view('UserView/UserLogin');
  })->name('User.Login');

  Route::get('/detail/{product_id}', [UserController::class, 'detailProducts'])
    ->name('User.DetailProducts');
});

Route::group(['prefix' => 'User'], function () {

  Route::get('/detail', [UserController::class, 'detailUser'])
    ->name('User.DetailUser');

  Route::get('/edit', [UserController::class, 'editUser'])
    ->name('User.EditUser');

  Route::get('/cart', [UserController::class, 'cart'])
    ->name('User.Cart');

  Route::get('/order', [UserController::class, 'order'])
    ->name('User.Order');

  Route::get('/detailOrder', [UserController::class, 'detailOrder'])
    ->name('User.DetailOrder');

  Route::get('/review/{product_id}', [UserController::class, 'review'])
    ->name('User.Review');
})->middleware('userLogin');

Route::group(['prefix' => 'handleUser'], function () {
  Route::get('/login', [LoginController::class, 'userLogin'])
    ->name('user.login');
  Route::post('/register', [LoginController::class, 'userRegis'])
    ->name('user.register');
});
/*
|--------------------------------------------------------------------------
| Shipper
|--------------------------------------------------------------------------
*/
