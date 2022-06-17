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

Route::get('/', function () {
    return view('welcome');
});

//追加するルーティング
// Route::get('hello', function () {
//     echo 'Hello World!!';
// });
// Route::get('hello', 'PostsController@hello');
// Route::get('/hello', [PostsController::class, 'hello']);
Route::get('/index', [PostsController::class, 'index']);

// こちらを追加する
Route::get('/create-form', [PostsController::class, 'createForm']);
Route::post('post/create', [PostsController::class, 'create']);

Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);
Route::post('post/update', [PostsController::class, 'update']);

Route::get('/post/{id}/delete', [PostsController::class, 'delete']);
// Route::get('/create-form', 'PostsController@createForm');
// Route::get('post/{id}/update-form', 'PostsController@updateForm');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
