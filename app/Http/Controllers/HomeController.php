<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use App\Rules\Uppercase;

class HomeController extends Controller
{
    //Active index
    public $data = [];

    public function index()
    {
        $this->data['title'] = 'Học lập trình Laravel';
        $this->data['message'] = 'Đăng ký tài khoản thành công!!';

        $users = DB::select('SELECT * FROM users WHERE email=:email', [
            'email' => 'admin@gmail.com'
        ]);

        // dd($users);

        return view('clients.home', $this->data);
    }

    //Active get news
    public function getNews()
    {
        return 'danh sach tin tuc';
    }

    public function getCategories()
    {
        $this->data['title'] = 'Trang sản phẩm';
        return view('clients.product', $this->data);
    }

    public function getAdd()
    {
        $this->data['title'] = 'Thêm sản phẩm';
        $this->data['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu!!';
        return view('clients.add', $this->data);
    }

    public function postAdd(ProductRequest $request)
    {
        $rules = [
            'product_name' => ['required', 'min:6'],
            'product_price' => ['required', 'integer']
        ];

        $messages = [
            'required' => 'Trường :attribute là bắt buộc',
            'min' => 'Trường :attribute phải lớn hơn :min',
            'integer' => 'Trường :attribute phải là số',
            'uppercase' => 'Trường :attribute phải viết hoa'
        ];

        $attributes = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm',
        ];

        // $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        // $validator->validate();

        $request->validate($rules, $messages);

        return response()->json(['status' => 'success']);

        // $validator->validate();

        // if ($validator->fails()) {
        //     $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
        //     //     return 'Validate thất bại';
        // } else {
        //     //     return 'Validate thành công';
        //     return redirect()->route('product')->with('msg', 'Validate thành công');
        // }

        // dd($request);

        // $request->validate($rules, $messages);

        // return back()->withErrors($validator);
    }

    public function putAdd(Request $request)
    {
        //
        return 'phuong thuc PUT';
        dd($request);
    }

    public function getArr()
    {
        $contentArr = [
            'title' => 'Học Laravel 10.x',
            'lesson' => 'Hóc response của Laravel',
            'academy' => 'Unide Code',
        ];

        return $contentArr;
    }

    public function downloadImg(Request $request)
    {
        if (!empty($request->img)) {
            $image = trim($request->img);
            // $fileName = 'image_'.uniqid().'.jpg';
            $fileName = basename($image);
            // echo $fileName;
            // return response()->streamDownload(function () use ($image) {
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, $fileName);
            return response()->download($image);
        }
    }
}
