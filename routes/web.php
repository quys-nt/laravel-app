<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

//Clients Routes
Route::middleware('auth.admin')->prefix('categories')->group(function () {
    //Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');

    //Lấy chi tiết 1 chuyên mục
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    //Sử lý update chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    //Hiện form add dữ liệu
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //Sử lý thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //Xoá chuyên mục
    Route::post('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');

    //Hiện form upload
    Route::get('/upload', [CategoriesController::class, 'getFile']);

    //Sử lý file
    Route::post('/upload', [CategoriesController::class, 'handleFile'])->name('categories.upload');
});

Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('products', ProductsController::class);
});
