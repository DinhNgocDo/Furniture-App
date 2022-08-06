<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $paginate = 15;
    
    public function index()
    {
        $tab = "Quản lý người dùng";
        $users = User::orderBydesc('created_at')->paginate($this->paginate);
        
        return view('admin.user.index', compact([
            "tab",
            "users",
        ]));
    }
    
    public function create()
    {
        $tab = "Quản lý người dùng / Thêm người dùng";

        return view('admin.user.create', compact([
            "tab",
        ]));
    }
    
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        
        return redirect()->route('users.index')->with('messageSuccess', 'Thêm người dùng thành công');
    }
    
    public function edit($id)
    {
        $tab = "Quản lý người dùng / Cập nhật người dùng";
        $user = User::findOrFail($id);

        if ($user) {
            return view('admin.user.edit', compact([
                "tab",
                "user",
            ]));
        }
        
        return redirect()->route('users.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        if ($user) {
            $data['password'] = bcrypt($data['password']);
            $user->update($data);
            return redirect()->route('users.index')->with('messageSuccess', 'Cập nhật người dùng thành công');
        }
        
        return redirect()->route('users.index')->with('messageSuccess', 'Không tồn tại');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
        
            return redirect()->route('users.index')->with('messageSuccess', 'Xóa người dùng thành công');
        }
        
        return redirect()->route('users.index')->with('messageSuccess', 'Không tồn tại');
    }
}
