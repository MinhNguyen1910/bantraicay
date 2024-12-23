@extends('master.main')

@section('body')

    <div class="banner-about">
        <div class="text-center">
          <h1>Đăng nhập</h1>
          <p><a href="home.html">Home</a> || Đăng nhập</p>
        </div>
      </div>
  
      <!-- Register -->
      <div class="register-register">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <p id="register-text">
                <a href="{{route('account.register')}}">Đăng ký</a> / Đăng Nhập
              </p>
              <form action="" id="form-register" method="POST">
                @csrf
                <div class="form-group">
                  <label for="">Tên đăng nhập:</label>
                  <input
                    type="text"
                    class="form-control"
                    name="email"
                    placeholder="Tên đăng nhập"
                  />
                </div>
                @error('email') <small class="error-message">{{$message}}</small> @enderror
                <div class="form-group">
                  <label for="">Password:</label>
                  <input
                    type="text"
                    class="form-control"
                    name="password"
                    placeholder="Nhập password"
                  />
                </div>
                @error('password') <small class="error-message">{{$message}}</small> @enderror
                <button type="submit" class="btn btn-default">Đăng Nhập</button>
                
              </form>
             
            </div>
            <div class="col-md-4">
              <div class="article-item">
                <div class="alticle-item-title text-center">
                  <p>Danh mục sản phẩm</p>
                </div>
                <div class="alticle-item-table">
                  <ul>
                    @foreach ($categories_names as $categories_name)
                      <li><a href="{{ route('home.category', $categories_name->id) }}">{{ $categories_name->name }} <span>({{ $categories_name->products->count() }})</span></a></li>
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