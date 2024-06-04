<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


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

Route::get('/test', [ExampleController::class, 'test']);

//User related routes
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');
Route::post('/register',[UserController::class, "register"])->middleware('guest');
Route::post('/login',[UserController::class, "login"])->middleware('guest');
Route::post('/logout',[UserController::class, "logout"])->middleware('mustBeLoggedIn');

// Blog post related routes
Route::get('/create-post',[PostController::class, 'showCreateForm'])->middleware('mustBeLoggedIn');
Route::post('/create-post',[PostController::class, 'storeNewPost'])->middleware('mustBeLoggedIn');
Route::get('/post/{post}',[PostController::class, 'showSinglePost']);

//profile related routes
Route::get('/profile/{user:username}',[UserController::class, 'showProfile']);