<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashBoardController;
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


Auth::routes();
//Route::get('test', function(){
//    //we get soft deleted data in laravel.
//    dd(\App\Models\Category::onlyTrashed()->get());
//    //we restore soft deleted data in laravel.
//    Category::withTrashed()->restore();
//    //we finally delete of soft deleted data in laravel.
//    Category::withTrashed()->find(1)->forceDelete();
//});

Route::resources([
    'categories' => CategoryController::class,
]);
Route::group(['prefix' => 'admin', 'middleware' => 'check_role'], function (){
    Route::get('dashboard', [DashBoardController::class,'index'])->name('dashboard');
    Route::get('categories/restore', [CategoryController::class, 'restore'])
        ->name('admin.category.restore');
    Route::resources([
        'posts' => PostController::class,
        'categories' => CategoryController::class,
        'users' => UserController::class,
    ], ['as' => 'admin']);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
