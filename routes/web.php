<?php

use App\Http\Controllers\UserController;
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
    return redirect()->route('home');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/complete-profile', [UserController::class, 'index']);
Route::get('/update-profile/{user_id}', [UserController::class, 'updateProfile'])->name('update.profile');
Route::post('/user-info/{user_id}', [UserController::class, 'saveUserInfo'])->name('save.info');
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('/user/{user}', [UserController::class, 'viewUser'])->name('user.view');
