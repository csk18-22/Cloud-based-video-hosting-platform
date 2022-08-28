<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\VideoController;
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

Route::get('/', function () {
    return view('/welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/myvideos', [App\Http\Controllers\VideoController::class, 'index'])->name('video')->middleware('auth');
Route::get('/analytics', [App\Http\Controllers\AnalyticsController::class, 'index'])->name('c')->middleware('auth');
Route::get('/billing', [App\Http\Controllers\BillingController::class, 'index'])->name('billing')->middleware('auth');
Route::get('/accountsettings', [App\Http\Controllers\HomeController::class, 'accountsettings'])->middleware('auth');
Route::post('/accountsettings/{user}', [App\Http\Controllers\HomeController::class, 'update'])->middleware('auth');

Route::post('video-delete/{video}', [VideoController::class, 'videoDelete'])->name('video.delete')->middleware('auth');
Route::get('video-upload', [VideoController::class, 'videoUpload'])->name('video.upload')->middleware('auth');
Route::post('video-upload', [VideoController::class, 'videoUploadPost'])->name('video.upload.post')->middleware('auth');


