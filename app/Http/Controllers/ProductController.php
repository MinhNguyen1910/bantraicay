<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        if($key =  request()->key) {
            $products = Product::orderBy('id', 'DESC')->where('name','like','%'.$key.'%')->paginate(10);
        }
        return view('manager.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_ids = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('manager.product.create',compact('category_ids'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:products',
            'price'=>'required|numeric',
            'sale_price'=>'numeric|lte:price',
            'content'=>'required',
            'image'=>'required|file|mimes:jpg,jpeg,png,gif,webp|unique:products',
            'category_id'=>'required|exists:categories,id',
        ],[
            'name.required' => 'Tên sản phẩm không để trống.',
            'name.unique' => 'Tên này đã có. Mời nhập lại.',
            'price.numeric' => 'Giá sản phẩm phải là số. Mời nhập lại.',
            'price.required' => 'Giá sản phẩm không được để trống',
            'sale_price.numeric' => 'Giá giảm giá sản phẩm phải là số. Mời nhập lại.',
            'image.required' => 'Ảnh sản phẩm không để trống.',
            'image.mimes' => 'Kiểu file không phù hợp. Các kiểu cho phép: jpg,jpeg,png,gif,webp.',
            'image.unique' => 'Ảnh có hợp lệ với ảnh khác. Mời chọn ảnh khác.',
            'content.required' => 'Miêu tả không thể để trống.',
            'category_id.required' => 'Chuyên mục sản phẩm không để trống.',
            'category_id.exists' => 'Chuyên mục sản phẩm không tồn tai. Mời nhập lại.',
        ]);
        $data = $request->all('name','image','price','sale_price','content','category_id','status');

        $image_name = $request->image->hashName();
        $request->image->move(public_path('uploads/product'), $image_name);
        $data['image'] = $image_name;

        if(Product::create($data)) {
            return redirect()->route('product.index')->with('ok','Thêm mới đã thành công');
        };
        

        return redirect()->back()->with('no','Có lỗi. MỜi thử lại');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category_ids = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('manager.product.edit',compact('category_ids', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required|unique:products,name,'.$product->id,
            'price'=>'required|min:4|numeric',
            'sale_price'=>'numeric|lte:price',
            'content'=>'required',
            'image'=>'mimes:jpg,jpeg,png,gif,webp|file',
            'category_id'=>'required|exists:categories,id',
        ],[
            'name.required' => 'Tên sản phẩm không để trống.',
            'name.unique' => 'Tên này đã có. Mời nhập lại.',
            'price.numeric' => 'Giá sản phẩm phải là số. Mời nhập lại.',
            'price.required' => 'Giá sản phẩm không được để trống',
            'sale_price.numeric' => 'Giá giảm giá sản phẩm phải là số. Mời nhập lại.',
            'sale_price.lte' => 'Giá giảm giá sản phẩm phải to hơn giá gốc.',
            'image.mimes' => 'Kiểu file không phù hợp. Các kiểu cho phép: jpg,jpeg,png,gif,webp.',
            'image.file' => 'Kiểu file không được định dạng. Mời nhập lại.',
            'image.required' => 'Ảnh không thể để trống.',
            'content.required' => 'Miêu tả không thể để trống.',
            'category_id.required' => 'Chuyên mục sản phẩm không để trống.',
            'category_id.exists' => 'Chuyên mục sản phẩm không tồn tai. Mời nhập lại.',
        ]);

        $data = $request->all('name','image','price','sale_price','content','category_id','status');

        if ($request->has('image')) {
            $image_name = $request->image->hashName();
            $request->image->move(public_path('uploads/product'), $image_name);
            $data['image'] = $image_name;
        }
        
        if($product->update($data)) {
            return redirect()->route('product.index')->with('ok','Sửa đổi đã thành công');
        };

        return redirect()->back()->with('no','Có lỗi. MỜi thử lại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->delete()) {
            return redirect()->route('product.index')->with('ok','Xóa thành công');
        }
        return redirect()->back()->with('no','Đã có lỗi. Mời thử lại');
    }

    public function search() {
        $cats = Category::all();
        $prods = Product::all();
        return redirect()->route('product.index');
    }
}
