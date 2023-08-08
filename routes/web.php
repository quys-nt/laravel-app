<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::get('/san-pham', [HomeController::class, 'getCategories'])->name('product');

Route::get('/them-san-pham', [HomeController::class, 'getAdd'])->name('add');

Route::post('/them-san-pham', [HomeController::class, 'postAdd'])->name('post-add');

Route::put('/them-san-pham', [HomeController::class, 'putAdd']);

Route::get('/lay-thong-tin', [HomeController::class, 'getArr']);

Route::get('/demo-response', function () {
    // $response = new Response();
    // dd($response);

    // $response = response();
    // dd($response);

    // $response = new Response('Học lập trình Laravel',404);
    // $response = response('Học lập trình Laravel', 404);
    // dd($response);
    // $content = 'học laravel';
    // $content = json_encode([
    //     'Item 1',
    //     'Item 2',
    //     'Item 3',
    // ]);
    // $response = (new Response($content))->header('Content-type','application/json');
    // $response = (new Response())->cookie('unicode', 'Training PHP Laravel 10.x', 30);
    // return $response;
    // $response = response()->view('clients.demo-test', [
    //     'title' => 'Học Laravel unicode',
    // ], 201)
    //     ->header('Content-Type', 'application/json')
    //     ->header('API-key', '134567890');
    // return  $response;

    // $content = [
    //     'name' => 'Unicode',
    //     'Version' => 'Laravel 10.x',
    //     'lesson' => 'HTTP response Laravel'
    // ];
    // return response()->json($content, 201, ['API-key' => '12334']);
    return view('clients.demo-test');
})->name('demo-response');

Route::post('/demo-response', function (Request $request) {
    if (!empty($request->username)) {
        // return redirect()->route('demo-response');
        // return redirect(route('demo-response'));
        return back()->withInput();
    }
    else {
        return redirect(route('demo-response'))->with('mess', 'validate không thanh công');
    }
});

Route::get('demo-response-2', function (Request $request) {
    return $request->cookie('unicode');
});

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


Route::get('/download-img',[HomeController::class,'downloadImg'])->name('download-img');