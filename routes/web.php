<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
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

Route::get('/', function () {
    return view('welcome');
});

// login with google with sociallite
Route::redirect('home', 'dashboard');
Route::get('/auth',[AuthController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [AuthController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [AuthController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [AuthController::class, "logout"]);

//Dashboard Endpoint

Route::prefix('/dashboard')->middleware('auth')->group(
function(){
    Route::get('/',function(){
        return view('dashboard.layout');
    });
    Route::resource('/pages',PagesController::class);

});
