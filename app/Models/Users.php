<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers($filters = [], $keywords = null, $sortByArr = null, $perPage = null)
    {
        // $users =  DB::select('SELECT * FROM users ORDER BY created_at DESC');
        // DB::enableQueryLog();

        $users = DB::table($this->table)
            ->select('users.*', 'groups.name as group_name')
            ->join('groups', 'users.group_id', '=', 'groups.id');
        // ->orderBy('users.created_at', 'DESC');

        $orderBy = 'users.created_at';
        $orderTypre = 'DESC';

        if (!empty($sortByArr) && is_array($sortByArr)) {
            if (!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])) {
                $orderBy = trim($sortByArr['sortBy']);
                $orderTypre = trim($sortByArr['sortType']);
            }
        }

        $users = $users->orderBy($orderBy, $orderTypre);

        if (!empty($filters)) {
            $users = $users->where($filters);
        }

        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                $query->orWhere('users.name', 'like', '%' . $keywords . '%');
            });
        }

        // $users = $users->get();

        if (!empty($perPage)) {
            $users = $users->paginate($perPage)->withQueryString();  // 5 bản ghi trên 1 trang
        } else {
            $users = $users->get();
        }


        // $sql = DB::getQueryLog();

        return $users;
    }

    public function addUser($data)
    {
        // DB::insert('INSERT INTO users (name, email, created_at) values (?, ?,?)', $data);
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        // $data[] = $id;
        // return DB::update('UPDATE ' . $this->table . ' SET name=?, email=?, created_at=? WHERE id = ?', $data);

        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function deleteUser($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function statementUser($sql)
    {
        return DB::statement($sql);
    }

    public function learnQueryBuilder()
    {
        // DB::enableQueryLog();
        // Lấy tất cả bản ghi của table
        // $lists =  DB::table($this->table)
        //     ->select('name as hoten', 'email', 'id', 'update_at', 'created_at')
        // ->where('id', 2)
        // ->where('id', '>=', 2 )
        // ->where('id', '>=', 2 )
        // ->where('id', '<=', 5 )
        // ->where([
        //     [
        //         'id', '>=', '2'
        //     ],
        //     [
        //         'id', '<=', '5'
        //     ]
        // ])
        // ->where('id', 2)
        // ->orWhere('id', 6)
        // ->toSql();
        // ->where('name', 'like', '%demo%')
        // ->whereNotBetween('id', [2, 6])
        // ->whereIn ('id', [2, 6])
        // ->whereMonth('created_at', '02')
        // ->whereColumn('created_at', 'update_at')
        // ->get();
        // $sql = DB::enableQueryLog();

        // $lists = DB::table('users')
        // ->select('users.*', 'groups.name as group_name')
        // ->rightJoin('groups', 'users.group_id', '=', 'groups.id')
        // ->orderBy('created_at','asc')
        // ->orderBy('id','desc')
        // ->inRandomOrder()
        // ->get();
        // dd($lists);

        // $status = DB::table($this->table)->insert([
        //     'name' => 'Nguyễn Văn A',
        //     'email' => 'nguyenvana@gmail.com',
        //     'group_id' => 1,
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);

        // $lastId = DB::getPdo()->lastInsertId();

        // $lastId = DB::table('users')->insertGetId([
        //     'name' => 'Nguyễn Văn A',
        //     'email' => 'nguyenvana@gmail.com',
        //     'group_id' => 1,
        //     'created_at' => date('Y-m-d H:i:s')

        // ]);
        // dd($lastId);

        // $status = DB::table($this->table)
        //     ->where('id', 14)
        //     ->update([
        //         'name' => 'Nguyễn Văn B',
        //         'email' => 'nguyenvanb@gmail.com',
        //         'update_at' => date('Y-m-d H:i:s')
        //     ]);


        // $status = DB::table('users')
        //     ->where('id', 14)
        //     ->delete();

        // Đếm số bảng ghi
        // $lists = DB::table('users')
        //     ->where('id', '>', 4)
        //     ->get();
        // $count = count($lists);
        // dd($count);

        // $sql = DB::enableQueryLog();
        // dd($sql);

        // Lấy bản ghi đầu tiên của table (lấy chi tiết)
        // $lists =  DB::table($this->table)->first();
        // dd($lists);
    }
}
