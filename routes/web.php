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

Route::get('/', [App\Http\Controllers\PostController::class, 'all'])->name('post.all');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\PostController::class,'index'])->name('dashboard');
    Route::get('/dashboard/post', [App\Http\Controllers\PostController::class,'create'])->name('post.create');
    Route::get('/dashboard/post/getexternalpost', [App\Http\Controllers\PostController::class,'createPostByExternalURL'])->name('post.rest');
    Route::post('/dashboard/post', [App\Http\Controllers\PostController::class,'storage'])->name('post.storage');
});



require __DIR__.'/auth.php';
