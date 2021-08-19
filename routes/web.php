<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DanhmucController;

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

Route::get('/',[FrontendController::class,'home']);
Route::get('/danh-muc/{slug}', [FrontendController::class,'danhmuc']);

Route::get('/xem-truyen/{slug}', [FrontendController::class,'xemtruyen']);
Route::get('/xem-chapter/{slug}', [FrontendController::class,'xemchapter']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/category', CategoryController::class);
Route::resource('/story', StoryController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/danhmuc', DanhmucController::class);



