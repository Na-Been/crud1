<?php

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
Route::get('user/download', [\App\Http\Controllers\CrudController::class, 'download'])->name('download.users');
Route::post('user/import', [\App\Http\Controllers\CrudController::class, 'importFile'])->name('import.users');
Route::resource('users', \App\Http\Controllers\CrudController::class);
