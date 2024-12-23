<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Mail;
use App\Mail\VerifyAccount;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function login() {
        $categories_names = Category::orderBy('name','DESC')->get();
        $products = Product::orderBy('name','DESC')->limit(4)->get();
        return view('account.login', compact('categories_names','products'));
    }

    public function logout() {
        auth('cus')->logout();
        return redirect()->route('account.login')->with('yes','Your logout');
    }

    public function check_login(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:customers',
            'password' => 'required'
        ],[
            'email.required' => 'Email không thể để trống',
            'email.email'=> "Email nhập không đúng định dạng. Mời nhập lại",
            'password.required' => 'Password không thể để trống',
        ]);
        $data = $request->only('email','password');
        
        $check = auth('cus')->attempt($data);

        if($check) {
            if (auth('cus')->user()->email_verified_at == '') {
                auth('cus')->logout();
                return redirect()->back()->with('no', 'Your account is not verified. Please check your email');
            }
            return redirect()->route('home.index')->with('yes','Welcome back');
        };
        return redirect()->back()->with('no','Something wrong. Please try again');
    }

    // ********* //

    public function register() {
        $categories_names = Category::orderBy('name','DESC')->get();
        $products = Product::orderBy('name','DESC')->limit(4)->get();
        return view('account.register', compact('categories_names','products'));
    }

    public function check_register(Request $request) {
        $request -> validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Họ tên không thể để trống',
            'name.min'=> "Họ tên tối thiểu là 6 ký tự",
            'name.max'=> "Họ tên tối đa là 100 ký tự",
            'email.required' => 'Email không thể để trống',
            'email.email'=> "Email nhập không đúng định dạng. Mời nhập lại",
            'email.min'=> "Email tối thiểu là 6 ký tự",
            'email.max'=> "Email tối đa là 100 ký tự",
            'email.unique'=> "Email đã tồn tại",
            'password.required' => 'Password không thể để trống',
            'password.min'=> "Password tối thiểu là 6 ký tự",
            'password.max'=> "Password tối đa là 100 ký tự",
            'confirm_password.required' => 'Xác nhận mật khẩu không thể để trống',
            'confirm_password.same'=> "Nhập không giống mật khẩu. Mời nhập lại",        
        ]);

        $data = $request -> only('name','email','phone','address','gender');

        $data['password'] = bcrypt($request->password);

        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('OKe','Register succsessfully, please check your email to verify account');
        }

        return redirect()->back()->with('no', 'Something error');
    }

    // ********* //

    public function verify($email) {
        $acc = Customer::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        Customer::where('email', $email)->update(['email_verified_at' => date('Y-m-d')]);
        return redirect()->route('account.login')->with('OKe','Verify succsessfully');
    }

    // ********* //

    public function change_password() {
        return view('accout.change_password');
    }

    public function check_change_password() {
        
    }

    // ********* //

    public function forgot_password() {
        return view('accout.forgot_password');
    }

    public function check_forgot_password() {
        
    }

    // ********* //

    public function profile() {
        $auth = auth('cus')->user();
        return view('account.profile', compact('auth'));
    }

    public function check_profile(Request $request) {
        $auth = auth('cus')->user();
        $request -> validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers,email,'.$auth->id,
            'password' => ['required', function ($attribute, $value, $fail) {
                $auth = auth('cus')->user();
                if(!Hash::check($value, $auth->password)) {
                    return $fail('Your password doesnt yet');
                };
                
            }],
        ], [
            'name.required' => 'Họ tên không thể để trống',
            'name.min'=> "Họ tên tối thiểu là 6 ký tự",       
        ]);

        $data = $request -> only('name','email','phone','address','gender');

        $check = $auth->update($data);
        if ($check) {
            return redirect()->back()->with('ok', 'Update succsess');
        }
        return redirect()->back()->with('no', 'Have some mistake. Please try again');
    }

    // ********* //

    public function reset_password() {
        return view('accout.reset_password');
    }

    public function check_reset_password() {
        
    }
}
