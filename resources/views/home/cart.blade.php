@extends('master.main')
@section('body')
   
        <!-- Banner -->
    <div class="banner-about">
      <div class="text-center">
        <h1>Rỏ Hàng</h1>
        <p><a href="{{ route('home.index') }}">Home</a> || Rỏ Hàng </p>
      </div>
    </div>

      <!-- Our Product -->
      <div class="product-product">
        <div class="container">
          <div class="row">
            <div class="col-md-8" style="margin-top: 50px; margin-bottom: 50px;">  
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cards as $card)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $card->product->name }}</td>
                      <td><img src="uploads/product/{{ $card->product->image }}" alt="" width="40px" height="40px"></td>
                      <td>{{number_format( $card->price )}} đ</td>
                      <td>
                        <form action="{{ route('cart.update', $card->product_id) }}" method="get">
                          <input type="number" value="{{ $card->quantity }}" name="quantity" style="width: 60xp; text-align: center;">
                          <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i></button>
                        </form>
                      </td>
                      <td>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ route('cart.delete', $card->product_id) }}" class="fas fa-trash"><i class="fa-solid fa-trash icon-prt"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <br>
              <div class="text-center">            
                <a href="" class="btn btn-primary" style="margin-right: 100px;">Tiếp túc mua sắm</a>
                @if($cards->count())
                <a href="{{ route('cart.clear') }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa tất cả</a>
                <a href="{{ route('order.checkout') }}" class="btn btn-success">Đặt hàng</a>
                @endif
              </div>
          </div>
          <div class="col-md-4" style="margin-top: 50px; margin-bottom: 50px;">
              <div class="article-item">
                <div class="alticle-item-title text-center">
                  <p>Danh mục sản phẩm</p>
                </div>
                <div class="alticle-item-table">
                  <ul>
                    @foreach ($categories_names as $categories_name)
                      <li><a href="">{{ $categories_name->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
                <div class="alticle-item-title text-center">
                  <p>Sản phẩm</p>
                </div>
                @foreach ($products as $product)
                  @if($product->sale_price > 0)
                    <div class="alticle-item-product">
                    <div class="col-md-8">
                      <p>{{ $product->name }}</p>

                    <div class="col-md-6">
                        <a href="{{ route('home.product') }}">
                          <h1 id="h1-text">{{  number_format($product->price - $product->sale_price) }} đ</h1>
                        </a>
                    </div>
                      <div class="col-md-6">
                        <h2 id="h2-text">{{  number_format($product->price) }} đ</h2>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <a href="{{ route('home.product') }}">
                        <img
                          src="uploads/product/{{ $product->image }}"
                          class="img-responsive"
                          alt="Image"
                        />
                      </a>
                    </div>
                  </div>
                  @endif
                @endforeach
           
                <div class="alticle-item-title text-center">
                  <p>Thư viện ảnh</p>
                </div>
                <a href="aboutUs.html">
                  <div class="gallery">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <img
                        src="assets/Images/gallery/cocktail-trai-cay.webp"
                        class="img-responsive"
                        alt="Image"
                      />
                      <img
                        src="assets/Images/gallery/cocktail-trai-cay.webp"
                        class="img-responsive"
                        alt="Image"
                      />
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <img
                        src="assets/Images/gallery/sinh-to-cho-be-thumb-1200x628.jpg"
                        class="img-responsive"
                        alt="Image"
                      />
                      <img
                        src="assets/Images/gallery/sinh-to-cho-be-thumb-1200x628.jpg"
                        class="img-responsive"
                        alt="Image"
                      />
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <img
                        src="assets/Images/gallery/xay-bo-voi-dua-chuot-va-uong-moi-ngay-ban-se-bat-ngo-vi-rat-nhieu-tac-dung_1.jpg"
                        class="img-responsive"
                        alt="Image"
                      />

                      <img
                        src="assets/Images/gallery/xay-bo-voi-dua-chuot-va-uong-moi-ngay-ban-se-bat-ngo-vi-rat-nhieu-tac-dung_1.jpg"
                        class="img-responsive"
                        alt="Image"
                      />
                    </div>
                  </div>
                </a>
              </div>
            </div>
        </div>
      </div>
      </div>

@stop()

@section('js')
<script>
   $('.thumb-image').click(function(e) {
    e.preventDefault;

    var _url = $(this).attr('src')
   })
</script>
      

@stop