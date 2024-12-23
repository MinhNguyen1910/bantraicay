@extends('manager.manager')

@section('main')

<h1 class="text-center">Thêm sản phẩm</h1>

<form action="{{ route('product.store') }}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Mời nhập tên sản phẩm"
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
            
            />

            @error('sale_price')  <small class="error-message">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">ID danh mục sản phẩm</label>
            
            <select name="category_id" id="input" class="form-control" required="required">
                @foreach ($category_ids as $category_id)
                <option value="{{ $category_id -> id }}">{{ $category_id -> name }}</option>
                @endforeach
            </select>
            
            @error('category_id')  <small class="error-message">{{ $message }}</small> @enderror

        </div>

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

        <button type="submit" class="btn btn-success">Tạo thẻ Sản phẩm mới <i class="fa-solid fa-plus"></i></button>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input
                type="file"
                class="form-control"
                name="image"
                placeholder="Mời nhập ảnh sảm phẩm"
                onchange="showImage(this)"
            />
            <img id="show_image" src="" alt="" width="50%" height="50%">
            @error('image')  <small class="error-message">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="">Content sản phẩm</label>
            <textarea type="text"
                name="content"
                class="form-control product-content"
                placeholder="Mời nhập miêu tả sảm phẩm">
            </textarea>

            @error('content') <small class="error-message">{{ $message }}</small> @enderror
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