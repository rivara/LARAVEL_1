<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [MainController::class, 'index']);
Route::get('/search', [MainController::class, 'search'])->name('search');
Route::post('/erase', [MainController::class, 'erase'])->name('erase');
Route::post('/record', [MainController::class, 'record'])->name('record');
Route::post('/searching', [MainController::class, 'searching'])->name('searching');
