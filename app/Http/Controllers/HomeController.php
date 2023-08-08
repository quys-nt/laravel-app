<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;

class HomeController extends Controller
{
    //Active index
    public $data = [];

    public function index()
    {
        $this->data['title'] = 'Học lập trình Laravel';
        $this->data['message'] = 'Đăng ký tài khoản thành công!!';
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
        dd($request);
        // $rules = [
        //     'product_name' => 'required|min:6',
        //     'product_price' => 'required|integer'
        // ];
        
        // // $messages = [
        // //     'product_name.required' => 'Trường :attribute bất buộc phải nhập',
        // //     'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min',
        // //     'product_pricze.required' => 'Giá sản phẩm là bắt buộc',
        // //     'product_price.integer' => 'Giá sản phẩm phải là số'
        // // ];

        // $messages = [
        //     'required' => 'Trường :attribute là bắt buộc',
        //     'min' => 'Trường :attribute phải lớn hơn :min',
        //     'integer' => 'Trường :attribute phải là số'
        // ];

        // $request->validate($rules, $messages);
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
