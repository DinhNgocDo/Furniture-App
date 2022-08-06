<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('users.index');
        }

        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->all();
        $user = User::whereEmail($data['email'])->first();
        
        if ($user) {
            if (Auth::attempt([
                'email' => $data['email'],
                'password' => $data['password'],
            ])) {
                return redirect()->route('users.index');
            }
        }

        return redirect()->back()->with('messageSuccess', 'Thông tin đăng nhập không đúng');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
