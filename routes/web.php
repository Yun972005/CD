<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //controladores
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('inici');
})->name('inici');


// //ej 1
// Route::get('/posts', function () {
//     return 'Llistat de posts';
// })->name('posts_llistat');

// //ej 2
// Route::get('/posts/{id}', function ($id) {
//     return "Fitxa del post $id";
// })->where('id', '[0-9]+')
//   ->name('posts_fitxa');

//ej 4

Route::resource('posts', PostController::class);

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
