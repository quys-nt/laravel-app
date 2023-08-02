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
    public function index(Request $request)
    {
        // $allData = $request->all();
        // dd($allData);

        // $url = $request->fullUrl();
        // echo $url;

        // $ip = $request->ip();
        // echo 'Ip là: '.$ip;

        // $server = $request->server();
        // dd($server);

        // $header  = $request->header();
        // dd($header['user-agent']);

        $id = $request->input('id');
        echo $id;

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
    public function addCategory(Request $request)
    {

        // $url = $request->url();
        // echo $url;
        $cateName = $request->old('category_name');

        return view('clients/categories/add', compact('cateName'));
    }

    //Thêm dữ liệu vào chuyên mục (Phương thức POST)
    public function handleAddCategory(Request $request)
    {
        // $allData = $request->all();
        // dd($allData);
        // return 'Submit thêm chuyên mục';
        if ($request->has('category_name')) {
            $cateName = $request->category_name;
            $request->flash(); //set section flash

            return redirect(route('categories.add'));
        } else {
            return 'khong co category name';
        }
    }

    //Xoá dữ liệu (Phương thức DELETE)
    public function deleteCategory()
    {
        return 'Submit xoá chuyên mục';
    }

    public function getFile()
    {
        return view('clients/categories/file');
    }

    //Sử lý thông tin file
    public function handleFile(Request $request)
    {
        if ($request->hasFile('photo')) {
            if($request->photo->isValid()) {
                $file = $request->file('photo');
                // $path = $file->path();
                $ext = $file->extension();
                // $path = $file->store('images');
                // $path = $file->storeAs('images','img-background-01.jpg');
                // $fileName = $file->getClientOriginalName();

                //Đổi tên
                $fileName = md5(uniqid()).'.'.$ext;
                dd($fileName);
            }
            else {
                return 'Upload không thành công';
            }
        }
        else {
            return 'Vui lòng chọn file';
        }
    }
}
