<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [MainController::class, 'index']);
Route::get('create', [MainController::class, 'create']);
Route::post('create', [MainController::class, 'store']);
Route::get('update/{id}', [MainController::class, 'edit'])->where('id', '[0-9]+');
Route::put('update/{id}', [MainController::class, 'update'])->where('id', '[0-9]+');
Route::post('view/{id}', [MainController::class, 'show'])->where('id', '[0-9]+');
Route::delete('delete/{id}', [MainController::class, 'destroy'])->where('id', '[0-9]+');
Route::post('search', [SearchController::class, 'search']);
Route::get('search/{keyword}', [SearchController::class, 'search_result'])
    ->where('keyword', '[a-zA-Z0-9 _-]+');
