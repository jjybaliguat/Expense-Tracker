<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CompletedtothelordController;
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

Route::get('/expense-tracker', function () {
    return view('auth.login');
});

Route::get('login', [UserController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/', [UserController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('register', [UserController::class, 'register'])->middleware('alreadyLoggedIn');
Route::post('register-user', [UserController::class, 'registerUSer'])->name('register-user');
Route::post('login-user', [UserController::class, 'loginUser'])->name('login-user');
Route::get('dashboard', [UserController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('profile', [UserController::class, 'profile'])->middleware('isLoggedIn');
Route::get('settings', [UserController::class, 'settings'])->middleware('isLoggedIn');
Route::get('viewcompletedtotheLord', [CompletedtothelordController::class, 'view'])->middleware('isLoggedIn');
Route::get('gettotheLordItem', [CompletedtothelordController::class, 'getItems']);
Route::get('logout', [UserController::class, 'logOut']);
Route::get('index', [TransactionController::class, 'index'])->name('index');


Route::post('transactions', [TransactionController::class, 'store']);
Route::get('get-transactions', [TransactionController::class, 'getTransactions']);
Route::post('update-transaction', [TransactionController::class, 'updateTransaction']);
Route::post('delete-transaction', [TransactionController::class, 'deleteTransaction']);
Route::post('save_totheLord', [TransactionController::class, 'saveTotheLord']);


