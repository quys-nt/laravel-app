<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Routing\RouteGroup;

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


Route::prefix('admin')->group(function () {

    Route::get('tin-tuc/{slug}-{id}.html', function ($slug = null, $id = null) {
        $content = 'Phương thức Post của path/ Unicode với tham số: ';
        $content .= 'id = ' . $id . '<br>';
        $content .= 'slug = ' . $slug;
        return $content;
    })->where('id', '\d+')->where('slug', '.+');
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
    });

    Route::prefix('products')->group(function () {
        Route::get('/', function () {
            return 'Danh sách sản phẩm';
        });

        Route::get('add', function () {
            return 'Thêm sản phẩm';
        });

        Route::get('edit', function () {
            return 'Sửa sản phẩm';
        });

        Route::get('delete', function () {
            return 'Xoá sản phẩm';
        });
    });
});
