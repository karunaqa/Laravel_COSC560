<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('/user', [UserController::class,'index']);//->middleware('auth:sanctum');

Route::post('/login', [AuthController::class,'login']);
Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/user', [UserController::class, 'index'])->middleware('auth:sanctum');

