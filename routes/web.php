<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


// home controller
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/user-profile',[ProfileController::class,'profile'])->name('profile');
Route::get('/restaurant-search',[HomeController::class,'search'])->name('search');
// category controller
Route::get('/category/{restaurant}',[HomeController::class,'show_name_order']);

Route::get('/category',[CategoryController::class,'index']);
// sub category controller
Route::get('/category/item/{permalink}',[SubCategoryController::class,'index']);
Route::get('/search-by-location',[SubCategoryController::class,'search']);

// Route::get('/vozonroshik-sub-category/{id}',[SubCategoryController::class,'index']);
// single page controller
Route::get('/restaurant/{route_url}',[SingleController::class,'index']);
Route::get('/review-comment-like/{id}',[SingleController::class,'like']);//->middleware('authcheck');
Route::get('/like/{id}/{rest_id}',[SingleController::class,'like']);
Route::get('/review-comment-dislike/{id}',[SingleController::class,'dislike']);
Route::get('/search-by-food',[SingleController::class,'search']);
Route::get('/save-restaurant/{id}',[SingleController::class,'save_restaurant']);
// Route::get('/vozonroshik-count_like/{id}',[SingleController::class,'count_like']);


// Auth controller
Route::get('/register',[AuthController::class,'register']);
Route::post('/user-store',[AuthController::class,'store'])->name('auth.store');
Route::post('/user-check',[AuthController::class,'check'])->name('auth.check');
// Route::get('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/forget-password-temp',[AuthController::class,'View']);
Route::post('/forget-password',[AuthController::class,'postEmail']);

Route::get('/reset-password/{token}', [AuthController::class,'getPassword']);
Route::post('/reset-password', [AuthController::class,'updatePassword']);

// Google login
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


