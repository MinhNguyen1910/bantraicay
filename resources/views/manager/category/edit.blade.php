@extends('manager.manager') @section('main')

<h1 class="text-center">Chỉnh sửa danh mục</h1>

<form
    action=" {{ route('category.update', $category->id) }}"
    method="POST"
    role="form"
>
    @csrf @method('PUT')
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Mời nhập tên danh mục"
                value="{{ $category->name }}"
            />
        </div>
        @error('name')  <small class="error-message">{{ $message }}</small> @enderror
        <div class="form-group">
            <label for="">Trang thái</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1"
                    {{$category -> status == 1 ? 'checked' : '' }} /> Hiển thị
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" name="status" value="0"
                    {{$category -> status == 0 ? 'checked' : '' }}/> Tạm ẩn
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Sửa Danh mục <i class="fa-solid fa-floppy-disk"></i></button>
    </div>
</form>

@stop()
