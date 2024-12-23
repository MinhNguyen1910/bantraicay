<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Category::orderBy('id', 'DESC')->paginate(10);

        return view('manager.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories',
        ],[
            'name.required' => 'Tên sản phẩm không để trống.',
            'name.unique' => 'Tên này đã có. Mời nhập lại.',
        ]);
        $data = $request->all('name','status');
        Category::create($data);

        return redirect(route('category.index'))->with('ok','Đã tạo danh mục mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('manager.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|unique:categories,name,'.$category->id,
        ],[
            'name.required' => 'Tên sản phẩm không để trống.',
            'name.unique' => 'Tên này đã có. Mời nhập lại.',
        ]);
        $data = $request->all('name','status');
        $category->update($data);

        return redirect(route('category.index'))->with('ok','Đã chỉnh sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'));
    }
}
