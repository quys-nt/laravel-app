<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Active index
    public $data = [];

    public function index()
    {
        $this->data['title'] = 'Học lập trình Laravel';
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
        return view('clients.add', $this->data);
    }

    public function postAdd(Request $request)
    {
        //
        // return 'phuong thuc POST';
        dd($request);
    }
    
    public function putAdd(Request $request)
    {
        //
        // return 'phuong thuc PUT';
        dd($request);
    }
}
