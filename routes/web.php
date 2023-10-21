<?php

use App\Models\Item;
use App\Models\category;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardItemController;
use App\Http\Controllers\DashboardCategoryController;


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
Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/items', [ItemController::class, 'index']);

Route::get('/', function () {
    return view('home', [
        'categories' => category::latest()->get()
    ]);
});

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard/items', DashboardItemController::class)->middleware('auth');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth');

Route::get('/dashboard/items/checkSlug', [DashboardItemController::class, 'checkSlug'])->middleware('auth');