<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        $users = User::orderBy('name','DESC')->get();
        return view('admin.index', compact('users'));
    }

    public function login() {
        return view('admin.login');
    }

    public function check_login(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ],[
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email đúng giang. Mời nhập lại.',
            'email.exists' => 'Email không tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);
        $data = $request->all('email','password');
        if (auth('admin')->attempt($data)) {
            return redirect()->route('admin.index')->with('ok','Xin kính chào.');
        }

        return redirect()->back()->with('no', 'Có lỗi. Mời thử lại');
    }

    public function logout () {
        auth('admin')->logout();
        return redirect()->route('admin.login')->with('ok', 'Đã đăng xuất');
    }
}
