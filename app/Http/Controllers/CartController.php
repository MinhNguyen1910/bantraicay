<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Product $product) {
        $products = Product::orderBy('name','DESC')->limit(3)->get();
        $categories_names = Category::orderBy('name','DESC')->get();
        $cards = Cart::orderBy('price','DESC')->get();
        return view('home.cart', compact('products','categories_names','cards'));
    }

    public function checkIn () {
        $cus_id = auth('cus')->id();
        if(!auth('cus')->id()) {
            return 2;
        } else {
            return $cus_id;
        }
    }

    public function add(Product $product, Request $request) {
        $quantity = $request->quantity ? floor($request->quantity ) : 1;
        
        $cartExists = Cart::where(['customer_id' => CartController::checkIn(), 'product_id' => $product->id])->first();
        if($cartExists) {
            Cart::where(['customer_id' => CartController::checkIn(), 'product_id' => $product->id])->increment('quantity', $quantity);
                // $cartExists->update([
                //     'quantity' => $cartExists->quantity + $quantity,
                // ]);
            return redirect()->route('cart.index')->with('yes','Cho thêm vào rỏ thành công.');
        } else {
            $data = [
            'customer_id' => CartController::checkIn(),
            'product_id' => $product->id,
            'price' => $product->sale_price ? $product->sale_price : $product->price,
            'quantity' => $quantity
            ];
            if(Cart::create($data)) {
                return redirect()->route('cart.index')->with('yes','Cho vào rỏ thành công.');
            }
        }
        
        return redirect()->back()->with('no','Có lỗi. Mời thử lại.');
    }

    public function update(Product $product, Request $request) {
        $quantity = $request->quantity ? floor($request->quantity ) : 1;
        // $cus_id = auth('cus')->id();       
        $cartExists = Cart::where(['customer_id' => CartController::checkIn(), 'product_id' => $product->id])->first();
        if($cartExists) {
            Cart::where(['customer_id' => CartController::checkIn(), 'product_id' => $product->id])->update([
                    'quantity' => $quantity,
                ]);
            return redirect()->route('cart.index')->with('yes','Cho thêm vào rỏ thành công.');
        } 
        
        return redirect()->back()->with('no','Có lỗi. Mời thử lại.');
    }

    public function delete($product_id) {
        // $cus_id = auth('cus')->id();
        Cart::where(['customer_id' => CartController::checkIn(), 'product_id' => $product_id])->delete();
        return redirect()->back()->with('ok','Xóa thành công.');
    }

    public function clear() {
        // $cus_id = auth('cus')->id();
        Cart::where(['customer_id' => CartController::checkIn()])->delete();
        return redirect()->back()->with('ok','Xóa tất cả thành công.');
    }
}
