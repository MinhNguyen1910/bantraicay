@extends('manager.manager') @section('main')
<base href="/">
<h1 class="text-center">Danh sách sản phẩm</h1>
<div class="admin-product-above">
    <a href="{{ route('product.create') }}" class="btn btn-success">Thêm mới <i class="fa-solid fa-plus"></i></a>
    <form action="">
        <input type="text" name="key" placeholder="Tìm kiếm...">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>


<hr />
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Sale price</th>
            <th>Content</th>
            <th>Category</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td style="max-width: 100px;">{{ $product->name }}</td>
            <td><img src="uploads/product/{{ $product->image }}" alt="" width="40px" height="40px"></td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->sale_price }}</td>
            <td style="max-width: 450px;">{{ $product->content }}</td>
            <td>{{ $product->cat->name }}</td>
            <td>{{ $product->status == 0 ? 'Tạm ẩn' : 'Hiển thị'}}</td>
            <td>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không?')">
                    @csrf @method('DELETE')
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-hammer"></i></a>
                    <button  class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$products->links()}}

@stop()
