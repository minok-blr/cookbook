<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/visualization', [App\Http\Controllers\HomeController::class, 'visualize']);
Route::get('/profile', [App\Http\Controllers\ProfilesController::class, 'profile'])->name('profile');

//Route::get('/newpost', [App\Http\Controllers\PostsController::class, 'newPost'])->name('newpost');
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{id}', [App\Http\Controllers\PostsController::class, 'show']);
Route::get('/myposts', [App\Http\Controllers\PostsController::class, 'myposts']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::delete('/p/{id}', [App\Http\Controllers\PostsController::class, 'delete']);
