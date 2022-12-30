<?php

use App\Http\Controllers\UsersApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users/{id?}', [UsersApiController::class, 'showUsers']);
Route::post('/addUser', [UsersApiController::class, 'addUser']);
Route::put('/update-user/{id}', [UsersApiController::class, 'updateUser']);
Route::delete('/deleteUser/{id}', [UsersApiController::class, 'deleteUser']);
