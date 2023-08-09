<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

class UserController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    //
    public function index()
    {
        $title = 'Danh sách người dùng';
        $userlits = $this->users->getAllUsers();
        return view('clients.users.lists', compact('title', 'userlits'));
    }

    public function add()
    {
        $title = 'Thêm người dùng';
        return view('clients.users.add', compact('title'));
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'fullname.required' => 'Họ và tên là bắt buộc phải nhập',
            'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên',
            'email.required' => 'Email là bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đăng ký đã tồn tại'
        ]);

        $dataInsert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];

        $this->users->addUser($dataInsert);

        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công!!');
    }
}
