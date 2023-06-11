<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/downloads/{id}', [PostController::class, 'download']); // download one file in collection by post id
Route::get('/downloads', [PostController::class, 'downloads']); //DOWNLOAD ALL collection FILES:
Route::get('/downloadsall', [PostController::class, 'downloadsall']); //DOWNLOAD ALL FILES:
Route::resource('/posts', PostController::class);
Route::get('/resimage/{id}', [PostController::class, 'resImage']); // RESPONIVE IMAGES

