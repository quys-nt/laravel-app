<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $users;

    const _PER_PAGE = 5;

    public function __construct()
    {
        $this->users = new Users();
    }

    //
    public function index(Request $request)
    {

        // $statement = $this->users->statementUser("SELECT * FROM users");

        $title = 'Danh sách người dùng';

        // $this->users->learnQueryBuilder();

        $filters = [];

        $keywords = null;

        if (!empty($request->status)) {
            $status = $request->status;

            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }

            $filters[] = ['users.status', '=', $status];
        }

        if (!empty($request->group_id)) {
            $groupId = $request->group_id;

            $filters[] = ['users.group_id', '=', $groupId];
        }

        if (!empty($request->keywords)) {
            $keywords = $request->keywords;
        }

        // Xử lý logic sắp xếp

        $sortBy = $request->input('sort-by');

        $sortType = $request->input('sort-type');

        $allowSort = ['asc', 'desc'];

        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }

        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType
        ];

        $userlits = $this->users->getAllUsers($filters, $keywords, $sortArr, self::_PER_PAGE);
        return view('clients.users.lists', compact('title', 'userlits', 'sortType'));
    }

    public function add()
    {
        $title = 'Thêm người dùng';

        $allGroups = getAllGroups();

        return view('clients.users.add', compact('title', 'allGroups'));
    }

    public function postAdd(UserRequest $request)
    {
        // $request->validate([
        //     'fullname' => 'required|min:5',
        //     'email' => 'required|email|unique:users',
        //     'group_id' => ['required','integer',function($attribute, $value, $fail) {
        //         if($value ==0) {
        //             $fail('Bắt buộc chọn nhóm');
        //         }
        //     }],
        //     'status' => 'required|integer'
        // ], [
        //     'fullname.required' => 'Họ và tên là bắt buộc phải nhập',
        //     'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên',
        //     'email.required' => 'Email là bắt buộc phải nhập',
        //     'email.email' => 'Email không đúng định dạng',
        //     'email.unique' => 'Email đăng ký đã tồn tại',
        //     'group_id.required' => 'Nhóm không được để trống',
        //     'group_id.integer' => 'Nhóm không hợp lệ',
        //     'status.required' => 'Trạng thái không được để trống',
        //     'status.integer' => 'Trạng thái không hợp lệ'
        // ]);

        $dataInsert = [
            // $request->fullname,
            // $request->email,
            // date('Y-m-d H:i:s')

            'name' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->users->addUser($dataInsert);

        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công!!');
    }

    public function getEdit(Request $request, $id = 0)
    {
        $title = 'Cập nhật người dùng';

        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết người dùng không tồn tại!!');
        }

        $allGroups = getAllGroups();

        return view('clients.users.edit', compact('title', 'userDetail', 'allGroups'));
    }

    public function postEdit(UserRequest $request)
    {

        $id = session('id');

        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }

        // $request->validate([
        //     'fullname' => 'required|min:5',
        //     'email' => 'required|email|unique:users,email'.$id,
        //     'group_id' => ['required','integer',function($attribute, $value, $fail) {
        //         if($value ==0) {
        //             $fail('Bắt buộc chọn nhóm');
        //         }
        //     }],
        //     'status' => 'required|integer'
        // ], [
        //     'fullname.required' => 'Họ và tên là bắt buộc phải nhập',
        //     'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên',
        //     'email.required' => 'Email là bắt buộc phải nhập',
        //     'email.email' => 'Email không đúng định dạng',
        //     'email.unique' => 'Email đăng ký đã tồn tại',
        //     'group_id.required' => 'Nhóm không được để trống',
        //     'group_id.integer' => 'Nhóm không hợp lệ',
        //     'status.required' => 'Trạng thái không được để trống',
        //     'status.integer' => 'Trạng thái không hợp lệ'
        // ]);

        $dataUpdate = [
            // $request->fullname,
            // $request->email,
            // date('Y-m-d H:i:s')


            'name' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'update_at' => date('Y-m-d H:i:s')
        ];

        $this->users->updateUser($dataUpdate, $id);

        return back()->with('msg', 'Cập nhật người dùng thành công!!');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Xoá người dùng thành công';
                } else {
                    $msg = 'bạn không thể xoá người dùng lúc này';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'Liên kết người dùng không tồn tại!!';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}
