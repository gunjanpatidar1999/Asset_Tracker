<?php

use App\Http\Controllers\myadmin;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard',[myadmin::class,'dashboard']);

Route::get('/create_asset_type',[myadmin::class,'create_asset_type']);

Route::post('/store' ,[myadmin::class,'store']);

Route::get('/show' ,[myadmin::class,'index']);

Route::get('/show/delete/{id}',[myadmin::class, 'destroy']);

Route::get('/show/edit/{id}',[myadmin::class, 'edit']);

Route::post('/show/edit/update/{id}',[myadmin::class,'update']);

Route::get('/test',[myadmin::class, 'test']);

// Route::get('dashboard',[myadmin::class,'dashboard']);

Route::get('/create_asset',[myadmin::class,'create_asset']);

Route::post('/store_asset' ,[myadmin::class,'store_asset']);

Route::get('/showassets' ,[myadmin::class,'index1']);

Route::get('/showasset/delete/{asset_id}',[myadmin::class, 'destroyasset']);

Route::get('/showasset/edit/{asset_id}',[myadmin::class, 'editasset']);

Route::post('/showasset/edit/update/{asset_id}',[myadmin::class,'updateasset']);

Route::get('/test1',[myadmin::class, 'test1']);

Route::get('/tasks', [myadmin::class,'exportCsv']);

Route::get('/export',[myadmin::class,'exportdata']);