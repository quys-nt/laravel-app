<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Active index
    public $data = [];

    public function index()
    {

        $this->data['welcome'] = 'Học lập trình Laravel';
        $this->data['content'] = '
            <h3>Chương 1: Nhập môn</h3>
            <p>Kiến thức 1</p>
            <p>Kiến thức 2</p>
            <p>Kiến thức 3</p>
        ';

        $this->data['index'] = 1;

        $this->data['dataArr'] = [
            'Item 1',
            'Item 2',
            'Item 3',
        ];

        $this->data['message'] = 'Đặt hàng thành công !!';

        return view('home', $this->data);
    }

    //Active get news
    public function getNews()
    {
        return 'danh sach tin tuc';
    }

    public function getCategories($id)
    {
        return 'Danh sach chuyen muc: ' . $id;
    }
}
