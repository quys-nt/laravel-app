<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Active index
    public function index()
    {
        return 'Home';
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
