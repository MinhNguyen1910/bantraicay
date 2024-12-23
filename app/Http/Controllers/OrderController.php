<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()  {
        $status = request('status', 1);
        $orders = Order::orderBy('id','DESC')->where('status', $status)->paginate();
        return view('manager.order.index', compact('orders'));
    }

    public function show (Order $order) {
        $auth = $order->customer;
        return view('manager.order.detail', compact('auth','order'));
    }

    public function update (Order $order) {
        $status = request('status', 1);
        if($order->status != 2) {
            $order->update(['status' => $status]);
            return redirect()->route('order.index')->with('ok', 'Cập nhật đã thành công');
        }
        return redirect()->route('order.index')->with('no', 'Đơn hàng này không thể cập nhật');
    }
}
