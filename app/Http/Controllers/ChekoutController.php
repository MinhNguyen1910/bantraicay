<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Mail;
use App\Mail\OrderMail;

class ChekoutController extends Controller
{
    public function checkout () {
        $auth = auth('cus')->user();
        return view('home.checkout', compact('auth'));
    }

    public function post_checkout (Request $request) {
        $auth = auth('cus')->user();

        $request -> validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Họ tên không thể để trống',
            'email.required'=> "Email không được để trống",
            'phone.required'=> "Số điện thoại không được để trống",
            'address.required'=> "Địa chỉ không được để trống",
        ]);

        $data = $request -> only('name','email','phone','address');
        $data['customer_id'] = $auth->id;

        if($order = Order::create($data)) {
            $token = \Str::random(40);
            foreach($auth->carts as $cart) {
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                ];

                OrderDetail::create($data1);
            }

           
            $order->token = $token;
            $order->save();
            Mail::to($auth->email)->send(new OrderMail($order, $token));
            return redirect()->route('home.index')->with('ok','Đặt thành công mời xác nhận đơn hàng');
        }

        return redirect()->route('home.index')->with('no','Có lỗi. Mời thử lại.');
    }

    public function verify($token) {
        $order =  Order::where('token', $token)->first();
        if($order) {
            $order->token = Null;
            $order->status = 1;
            $order->save();
            return redirect()->route('home.index')->with('ok','Xác nhận đơn hàng thành công');
        }
        
        return abort(404);
    }

    public function history () {
        $auth = auth('cus')->user();
        return view('home.history', compact('auth'));
    }

    public function detail (Order $order) {
        $auth = auth('cus')->user();
        return view('home.detail', compact('auth','order'));
    }
}
