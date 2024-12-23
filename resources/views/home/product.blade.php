@extends('master.main')

@section('body')
  
  <!-- Banner -->
    <div class="banner-about">
        <div class="text-center">
          <h1>Dịch Vụ</h1>
          <p><a href="{{ route('home.index') }}">Home</a> || Dịch Vụ</p>
        </div>
      </div>
  
      <!-- Our Product -->
      <div class="product-product">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              @foreach ($products as $product)
              <a href="{{ route('home.product_view' , $product->id) }}">
                <div class="col-md-4">
                  <div class="product-item">
                    <div class="product-item-img">           
                        <img src="uploads/product/{{ $product->image }}" alt="" />
                    </div>
                    <div class="product-under">
                      <div class="product-info text-center">
                      <div class="product-title">
                        <h2>{{ $product->name }}</h2>
                      </div>
                      <span class="current-price">
                        <span class="price-amount">{{ number_format($product->price - $product->sale_price)  }}</span>
                        <span class="price-symbol">₫</span>
                      </span>
                      @if($product->sale_price > 0) 
                        <span class="original-price">
                        <span class="price-amount">{{ number_format($product->price) }}</span>
                        <span class="price-symbol">₫</span>
                        </span>
                      @endif               
                    </div>
                    @if(auth('cus')->check())
                    <div class="product-button">
                      <button class="icon-button"><a href="{{ route('home.product_view' , $product->id) }}"><i class="fa-solid fa-eye" style="color: #7dc642;"></i></a></button>
                      <button class="icon-button"><a href="{{ route('cart.add' , $product->id) }}"><i class="fa-solid fa-cart-shopping" style="color: #7dc642;"></i></a></button>
                    </div>
                    @else
                    <div class="product-button">
                      <button class="icon-button"><a href="{{ route('account.login') }}" onclick="alert('Vui lòng đăng nhập')"><i class="fa-solid fa-eye" style="color: #7dc642;"></i></a></button>
                      <button class="icon-button"><a href="{{ route('account.login') }}" onclick="alert('Vui lòng đăng nhập')"><i class="fa-solid fa-cart-shopping" style="color: #7dc642;"></i></a></button>
                    </div>
                    @endif
                    </div> 
                  </div>
                </div>
                </a>
              @endforeach
          </div>
          <div class="col-md-4">
              <div class="article-item">
                <div class="alticle-item-title text-center">
                  <p>Danh mục sản phẩm</p>
                </div>
                <div class="alticle-item-table">
                  <ul>
                    @foreach ($categories_names as $categories_name)
                      <li><a href="{{ route('home.category', $categories_name->id) }}">{{ $categories_name->name }}<span>({{ $categories_name->products->count() }})</span></a></li>
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