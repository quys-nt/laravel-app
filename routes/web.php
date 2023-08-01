<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Routing\RouteGroup;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/tin-tuc', 'App\Http\Controllers\HomeController@getNews')->name('news');

Route::get('/chuyen-muc/{id}', [Homecontroller::class, 'getCategories']);

Route::prefix('admin')->group(function () {

    Route::get('tin-tuc/{id?}/{slug?}.html', function ($id = null, $slug = null) {
        $content = 'Phương thức Post của path/ Unicode với tham số: ';
        $content .= 'id = ' . $id . '<br>';
        $content .= 'slug = ' . $slug;
        return $content;
    })->where('id', '\d+')->where('slug', '.+')->name('admin.tintuc');
    // -> where(
    //     [
    //         // 'slug' => '[a-z-]+',
    //         'slug' => '.+',
    //         'id' => '[0-9]+',
    //     ]
    // )
    // ;

    Route::get('show-form', function () {
        return view('form');
    })->name('admin.show-form');

    Route::prefix('products')->middleware('checkpermission')->group(function () {
        Route::get('/', function () {
            return 'Danh sách sản phẩm';
        });

        Route::get('add', function () {
            return 'Thêm sản phẩm';
        })->name('admin.products.add');

        Route::get('edit', function () {
            return 'Sửa sản phẩm';
        });

        Route::get('delete', function () {
            return 'Xoá sản phẩm';
        });
    });
});
