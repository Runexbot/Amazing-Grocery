<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('{locale?}')->middleware('locale')->group(function(){

    Route::middleware('isAdmin')->group(function(){
        Route::get('/accmaintain', [AccountController::class, 'adminPage'])->name('accmaintain');
        Route::get('/editrole/{id}', [AccountController::class, 'editRole'])->name('editRole');
    });

    Route::middleware('auth')->group(function(){
        Route::get('/home', [ItemController::class, 'index'])->name('home');
        Route::get('/item/{id}', [ItemController::class, 'detail'])->name('detail');
        Route::get('/buy/{id}', [ItemController::class, 'addtocart'])->name('buy');
        Route::get('/cart', [ItemController::class, 'cart'])->name('cart');
        Route::get('/profile', [AccountController::class, 'index'])->name('profile');
        Route::get('/successupdate', [AccountController::class, 'success'])->name('finishprofile');
        Route::get('/checkoutsuccess', [OrderController::class, 'chkout'])->name('chkoutpg');

    });

    Route::middleware('guest')->group(function(){
        Route::get('/', function () {return view('welcome');})->name('landing');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::get('/logoutpg', [LoginController::class, 'logoutpg'])->name('logoutpg');
    });
});

    Route::middleware('guest')->group(function(){
        Route::post('/registodb', [RegisterController::class, 'regisdb'])->name('registodb');
        Route::post('/logintohome', [LoginController::class, 'login'])->name('logintohome');
    });

    Route::middleware('auth')->group(function(){
        Route::delete('/cart/{id}', [OrderController::class, 'destroy'])->name('deleteitem');
        Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::patch('/updateProfile', [AccountController::class, 'update'])->name('update');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    //Admin
    Route::middleware('isAdmin')->group(function(){
        Route::delete('/deleteuser/{id}', [AccountController::class, 'deleteUser'])->name('deleteUser');
        Route::patch('/updaterole/{id}', [AccountController::class, 'updateRole'])->name('updateRole');
    });
