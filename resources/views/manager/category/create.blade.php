@extends('manager.manager') @section('main')

<h1 class="text-center">Thêm danh mục</h1>

<form action=" {{ route('category.store') }}" method="POST" role="form">
    @csrf
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Mời nhập tên danh mục"
            />
        </div>
        @error('name')  <small class="error-message">{{ $message }}</small> @enderror
        <div class="form-group">
            <label for="">Trang thái</label>
            <div class="radio">
                <label>
                    <input
                        type="radio"
                        name="status"
                        value="1"
                        checked="checked"
                    />
                    Hiển thị
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" name="status" value="0" />
                    Tạm ẩn
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Tạo Danh mục mới <i class="fa-solid fa-plus"></i></button>
    </div>
</form>

@stop()
