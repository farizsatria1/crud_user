<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/listUser',[UserController::class, 'index']);
Route::post('/addUser',[UserController::class, 'store']);
Route::put('/editUser/{id}',[UserController::class, 'update']);
Route::delete('/deleteUser/{id}',[UserController::class, 'destroy']);