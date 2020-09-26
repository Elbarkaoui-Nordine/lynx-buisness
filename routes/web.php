<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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
// Route::get('/admin', 'UserController@update');

Route::middleware(['auth'])->group(function () {

    Route::get('/post/create', function () {
        return view('post.create');
    });

    Route::get('/admin',[AdminController::class,'getAllUsers'])->middleware('check.role:ADMIN');
    Route::get('/admin/manage/{id}',[AdminController::class,'getOneUser'])->middleware('check.role:ADMIN');

    Route::get('/profil',[PostController::class, 'getUserPost']);
    Route::put('/admin/user/{id}',[AdminController::class,'update']);
    Route::put('/user/{id}',[UserController::class,'update']);
    Route::get('/user/update',[UserController::class,'getUserUpdate']);
    Route::delete('/user/{id}',[UserController::class,'delete']);
  
    Route::get('/post',[PostController::class, 'getAllPost']);
    Route::get('/post/{id}',[PostController::class, 'getOnePost']);
    Route::get('/post/update/{id}',[PostController::class, 'updatePost']);
    Route::put('/post/{id}',[PostController::class, 'update'])->name('post.update');
    Route::post('/post/create',[PostController::class, 'create'])->name('post.create');
    Route::delete('/post/{id}',[PostController::class, 'delete'])->name('post.delete');

});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
