<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagerController extends Controller
{
    public function index() {
        return view('manager.index');
    }

    public function login() {
        return view('manager.login');
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
        if (auth()->attempt($data)) {
            return redirect()->route('manager.index')->with('ok','Xin kính chào.');
        }

        return redirect()->back()->with('no', 'Password is not right. Please try again');
    }

    public function logout () {
        auth()->logout();
        return redirect()->route('manager.login')->with('ok', 'Đã logout');
    }

    public function register() {
        return view('manager.register');
    }

    public function check_register() {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ],[
            'name.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email đúng giang. Mời nhập lại.',
            'email.unique' => 'Email đã tồn tại. Mời nhập mail khác.',
            'password.required' => 'Mật khâu không thể để trống.',
            'password.min'=> "Mật khẩu tối thiểu là 4 ký tự.",
            'confirm_password.required' => 'Xác nhận mật khẩu không thể để trống.',
            'confirm_password.same'=> "Nhập không giống mật khẩu. Mời nhập lại.",      
        ]);
        $data = request()->all('email','name','password');
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        return redirect()->route('manager.login');
    }
}
