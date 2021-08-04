<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
    return view('home');
});

Auth::routes();

Route::resources([
    'categories' => CategoryController::class,
]);
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('dashboard', function (){
       return view('admin.home');
    })->name('dashboard');
    Route::resources([
        'posts' => PostController::class,
        'categories' => CategoryController::class,
    ], ['as' => 'admin']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
