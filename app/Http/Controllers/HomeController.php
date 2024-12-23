<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $topBanners = Banner::getBanner()->first();
        $cats = Category::orderBy('name','ASC')->get();
        $products = Product::orderBy('name','DESC')->where('category_id','=',2)->limit(4)->get();

        // $new_products = Product::orderBy('created_at','DESC')->where('category_id','=',2)->limit(4)->get();
        return view('home.index',compact('cats', 'products','topBanners'));
    }

    public function product() {
        $products = Product::orderBy('name','DESC')->get();
        $categories_names = Category::orderBy('name','DESC')->get();
        return view('home.product', compact('products','categories_names'));
    }

    public function product_view(Product $product) {
        $products = Product::where('category_id', $product->category_id)->limit(4)->get();
        $categories_names = Category::orderBy('name','DESC')->get();
        return view('home.product-view', compact('products','categories_names','product'));
    }

    public function about() {
        $products = Product::orderBy('name','DESC')->limit(4)->get();
        $categories_names = Category::orderBy('name','DESC')->get();
        return view('home.about', compact('products','categories_names'));
    }

    public function contact() {
        $products = Product::orderBy('name','DESC')->limit(4)->get();
        $categories_names = Category::orderBy('name','DESC')->get();
        return view('home.contact', compact('products','categories_names'));
    }

    public function category(Category $cat) {
        // $products = Product::where('category_id', $cat->id)->get();
        $products = $cat->products()->paginate(9);
        $categories_names = Category::orderBy('name','DESC')->get();
        return view('home.category', compact('products','categories_names','cat'));
    }


    public function register(Request $request) {
        return view('account.register');
    }
}
