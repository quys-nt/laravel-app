<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
    }

    //Hiện thị danh sách chuyên mục (Phương thức GET)
    public function index()
    {
        return view('clients/categories/list');
    }

    //Lấy ra 1 chuyên mục theo ID (phương thức GET)
    public function getCategory($id)
    {
        return view('clients/categories/edit');
    }

    //Sửa 1 chuyên mục (Phương thức POST)
    public function updateCategory($id)
    {
        return 'Submit chuyên mục' . $id;
    }

    //Show Form thêm dữ liệu (Phương thức GET)
    public function addCategory()
    {
        return view('clients/categories/add');
    }

    //Thêm dữ liệu vào chuyên mục (Phương thức POST)
    public function handleAddCategory()
    {
        return 'Submit thêm chuyên mục';
    }

    //Xoá dữ liệu (Phương thức DELETE)
    public function deleteCategory()
    {
        return 'Submit xoá chuyên mục';
    }
}
