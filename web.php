<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
//     return view('home.home');
// });

Route::get('/', [HomeController::class, 'index']);
Route::post('/submission', [HomeController::class, 'submit']);
Route::get('/submission/id={id}', [HomeController::class, 'uploaded']);
Route::get('/submission/all/data', [HomeController::class, 'view']);
