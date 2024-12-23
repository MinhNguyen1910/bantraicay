@extends('manager.manager') @section('main')

<h1 class="text-center">Chuyên mục</h1>
<div class="admin-product-above">
    <a href="{{ route('category.create') }}" class="btn btn-success">Thêm mới <i class="fa-solid fa-plus"></i></a>
</div>

<hr />
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->status == 0 ? 'Tạm ẩn' : 'Hiển thị'}}</td>
            <td>
                <form action="{{ route('category.destroy', $cat->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-hammer"></i></a>
                    <button  class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$cats->links()}}

@stop()
