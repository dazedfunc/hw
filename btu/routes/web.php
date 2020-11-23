<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;


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
//Route::get('/users/{id}/{name}', function ($id, $name) {
//    return 'this is user '.$name.' with an id of '.$id;
//});
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/services', 'App\Http\Controllers\PagesController@services');
Route::resource('/posts', PostsController::class);
Auth::routes();
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post_login');
//Route::get('/my-posts', [PostsController::class, 'ownPosts'])->name('ownposts');

});



//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
