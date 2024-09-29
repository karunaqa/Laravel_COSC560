<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PhotoController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;



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

// Route for the homepage
Route::get('/', function () {
    return view('auth.login');
});

// Uncomment and adjust these routes as needed
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');



Route::get('/test',[PostController::class, 'test']);


// Authentication routes (login, registration, etc.)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::prefix('admin')->middleware('admin')->group(function() {
//     Route::resource('users', Admin\UserController::class);
//     Route::resource('posts', Admin\PostController::class);
// });


// Group routes that require authentication
Route::group(['middleware' => ['auth','admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    // Resource routes for posts (CRUD operations)
    Route::resource('posts', AdminPostController::class);
    Route::resource('users', UserController::class);
    
    // Resource routes for photos (CRUD operations)
    Route::resource('photos', PhotoController::class);
    
    // Route for the home page after login
    Route::get('/home', [PostController::class, 'index'])->name('home');

});


Route::group(['middleware' => ['auth'], 'as' => 'author.', 'prefix' => 'author'], function () {
    // Resource routes for posts (CRUD operations)
    Route::resource('posts', AuthorPostController::class);

 });


