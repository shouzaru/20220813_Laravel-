<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PlayerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PhotoController::class, 'index']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('players', PlayerController::class);
// Route::resource('photos', PhotoController::class);

Route::post('/photos/upload',[PhotoController::class, 'upload']);

Route::resource('/photo', PhotoController::class);
Route::resource('/player', PlayerController::class);

Route::get('/photo.nenchou', [PhotoController::class, 'nenchou']);
Route::get('/photo.ichinen', [PhotoController::class, 'ichinen']);
Route::get('/photo.ninen', [PhotoController::class, 'ninen']);
Route::get('/photo.sannen', [PhotoController::class, 'sannen']);
Route::get('/photo.yonen', [PhotoController::class, 'yonen']);
Route::get('/photo.gonen', [PhotoController::class, 'gonen']);
Route::get('/photo.rokunen', [PhotoController::class, 'rokunen']);
Route::get('/photo.taggingAll', [PhotoController::class, 'taggingAll']);
Route::get('/photo.taggingNone', [PhotoController::class, 'taggingNone']);
