@extends('manager.manager') @section('main')

<base href="/">

<h1 class="text-center">Chỉnh sửa sản phẩm: {{ $product->name }}</h1>

<form
    action=" {{ route('product.update', $product->id) }}"
    method="POST"
    role="form"
    enctype="multipart/form-data"
>
    @csrf @method('PUT')
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Mời nhập tên sảm phẩm"
                value="{{ $product->name }}"
            />
            @error('name')  <small class="error-message">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input
                type="text"
                class="form-control"
                name="price"
                placeholder="Mời nhập giá sảm phẩm"
                value="{{ $product->price }}"
            />
            @error('price')  <small class="error-message">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Giá giảm giá sản phẩm</label>
            <input
                type="text"
                class="form-control"
                name="sale_price"
                placeholder="Mời nhập giá giảm giá sảm phẩm"
                value="{{ $product->sale_price }}"
            />

            @error('sale_price')  <small class="error-message">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">ID danh mục sản phẩm</label>
            
            <select name="category_id" id="input" class="form-control" required="required">
                @foreach ($category_ids as $category_id)
                <option value="{{ $category_id -> id }}" {{ $category_id -> id == $product->category_id ? 'selected' : '' }}>{{ $category_id -> name }}</option>
                @endforeach
            </select>
            
            @error('category_id')  <small class="error-message">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Trang thái</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1"
                    {{$product -> status == 1 ? 'checked' : '' }} /> Hiển thị
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" name="status" value="0"
                    {{$product -> status == 0 ? 'checked' : '' }}/> Tạm ẩn
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Sửa thẻ Sản Phẩm <i class="fa-solid fa-floppy-disk"></i></button>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <img src="uploads/product/{{ $product->image }}" alt="" width="100%" id="show_image">
            <input
                type="file"
                class="form-control"
                name="image"
                placeholder="Mời nhập ảnh sảm phẩm"
                value="uploads/product/{{ $product->image }}"
                onchange="showImage(this)"
            />

            @error('image')  <small class="error-message ">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Content sản phẩm</label>
            <textarea 
                type="text"
                class="form-control product-content"
                name="content"
                placeholder="Mời nhập miêu tả sảm phẩm"
                >{{ $product -> content }}
            </textarea>

            @error('content')  <small class="error-message ">{{ $message }}</small> @enderror
        </div>
    </div>
</form>

@stop()

@section('css')
<link rel="stylesheet" href="assets/plugin/summernote/summernote.min.css">
@stop()

@section('js')
<script src="assets/plugin/summernote/summernote.min.js"></script>

<script>
    $('.product-content').summernote({
        height: 250
    })

    function showImage(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#show_image').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@stop()