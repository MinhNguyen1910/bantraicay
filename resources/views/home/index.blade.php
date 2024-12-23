@extends('master.main')
@section('title','Trang chủ')
@section('body')

    <!-- BANNER -->
    <div class="home-banner">
      <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-id" data-slide-to="0" class=""></li>
            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
            <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="uploads/Banner/Banner-Transformed/Banner4.jpeg">
                <div class="container">
                  <div class="carousel-caption">
                    <div class="col-mb-12">
                      <h1>happy field</h1>
                      <p>Nông trại & Thực phẩm hữu cơ</p>
                    </div>
    
                    <a
                      class="btn btn-lg btn-primary green-btn"
                      href="/"
                      role="button"
                      >Liên Hệ+</a
                    >
    
                    <a
                      class="btn btn-lg btn-primary orange-btn"
                      href="{{ route('home.about') }}"
                      role="button"
                      >Giới Thiệu+</a
                    >
                    </div>
                </div>
            </div>
            <div class="item">
                <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="uploads/Banner/Banner-Transformed/Banner5.png">
                <div class="container">
                  <div class="carousel-caption">
                    <div class="col-mb-12">
                      <h1>happy field</h1>
                      <p>Nông trại & Thực phẩm hữu cơ</p>
                    </div>
    
                    <a
                      class="btn btn-lg btn-primary green-btn"
                     
                      role="button"
                      >Liên Hệ+</a
                    >
    
                    <a
                      class="btn btn-lg btn-primary orange-btn"
                      href="{{ route('home.about') }}"
                      role="button"
                      >Giới Thiệu+</a
                    >
                    </div>
                </div>
            </div>
            <div class="item active">
                <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="uploads/Banner/Banner-Transformed/Banner4.jpeg">
                <div class="carousel-caption">
                  <div class="col-mb-12">
                    <h1>happy field</h1>
                    <p>Nông trại & Thực phẩm hữu cơ</p>
                  </div>
  
                  <a
                    class="btn btn-lg btn-primary green-btn"
                    href="/"
                    role="button"
                    >Liên Hệ+</a
                  >
  
                  <a
                    class="btn btn-lg btn-primary orange-btn"
                    href="{{ route('home.about') }}"
                    role="button"
                    >Giới Thiệu+</a
                  >
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- About us -->
    <div class="home-about">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h1>Giới thiệu</h1>
            <h2>Khám phá nông trại hữu cơ</h2>
            <p>
              Tại nông trại, từng khu vực được thiết kế kỹ lưỡng để tối ưu hóa
              sự sáng tạo và sự phát triển của cây cỏ, rau mầm, và trái cây.
              Chúng tôi chú trọng vào việc duy trì sự cân bằng tự nhiên và tái
              tạo đất đai để bảo vệ môi trường. Các hệ thống tưới tiêu hiệu quả
              và các kỹ thuật canh tác thông minh được áp dụng để đảm bảo sự hài
              hòa giữa con người và thiên nhiên.
            </p>
          </div>
          <div class="col-md-7">
            <div class="col-sm-6 col-md-6">
              <div class="home-about-item text-center">
                <div class="home-about-img">
                  <img src="assets/Images/icon/icon-1 1.png" alt="" />
                </div>
                <div class="home-about-info">
                  <a href="{{ route('home.product') }}">
                    <h1>Thực phẩm hữu cơ</h1>
                  </a>

                  <p>
                    Thực phẩm hữu cơ mang lại nhiều lợi ích cho sức khỏe và môi
                    trường
                  </p>
                </div>
              </div>

              <div class="home-about-item text-center">
                <div class="home-about-img">
                  <img src="assets/Images/icon/icon-2 1.png" alt="" />
                </div>
                <div class="home-about-info">
                  <a href="{{ route('home.about') }}">
                    <h1>Phân bón hữu cơ</h1>
                  </a>
                  <p>
                    Chúng tôi thường xuyên bón phân hưu cơ cho thực vật đảm bảo
                    cây được phát triển tốt nhất
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="home-about-item text-center">
                <div class="home-about-img">
                  <img src="assets/Images/icon/icon-3 1.png" alt="" />
                </div>
                <div class="home-about-info">
                  <a href="{{ route('home.about') }}"><h1>Làm vườn</h1></a>

                  <p>
                    Chúng tôi chăm sóc vườn hàng ngày, đảm bảo cây quả được tươi
                    mới nhất
                  </p>
                </div>
              </div>

              <div class="home-about-item text-center">
                <div class="home-about-img">
                  <img src="assets/Images/icon/icon-1 1.png" alt="" />
                </div>
                <div class="home-about-info">
                  <a href="{{ route('home.about') }}"><h1>Thiết kế cảnh quan</h1></a>

                  <p>
                    Tại vườn thì quý khách có thể thăm quan và chụp hình tại
                    nông trại
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Us -->
    <div class="home-contact">
      <div class="text-center">
        <h1>Trang trại thực phẩm & rau củ</h1>
        <h2>
          Trang trại cung cấp thực phẩm tươi <br />
          100%
        </h2>
        <h3>
          Tại đây bạn có thể trải nghiệm làm vườn, tham quan hoặc ăn thử các
          loại trái cây tại đây
        </h3>
        <button>
          <a href="{{ route('home.contact') }}" class="orange-btn">Liên Hệ+</a>
        </button>
      </div>
    </div>

    <!-- Our product -->
    <div class="home-product">
      <div class="text-center">
        <h1>Sản Phẩm</h1>
        <p>
          Sản phẩm Chúng tôi Cung cấp <br />
          có lợi Cho Sức Khỏe
        </p>
      </div>

      <div class="container">
        <div class="row">
          @foreach($products as $product)
          <a href="{{ route('home.product_view' , $product->id) }}">
          <div class="col-md-3">
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
                <button class="icon-button"><a href="{{ route('home.product_view' , $product->id) }}"><i class="fa-solid fa-eye" style="color: #7dc642;"></i></a></button>
                <button class="icon-button"><a href="{{ route('cart.add' , $product->id) }}"><i class="fa-solid fa-cart-shopping" style="color: #7dc642;"></i></a></button>
              </div>
              @endif
              </div> 
            </div>
          </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Sale -->
    <div class="home-sale">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>happy field</h1>
            <h2>Ưu đãi trong tuần</h2>
            <h3>Cam tươi</h3>
            <h4>Sale từ 2kg 89k/kg</h4>
            <p>
              Nước cam tăng cường hệ thống miễn dịch, cải thiện sức khỏe tiêu
              hóa, hỗ trợ giảm cân, làm sạch da, giảm nếp nhăn, cải thiện thị
              lực, hỗ trợ ngăn ngừa rụng tóc, giúp tóc đẹp, cung cấp dưỡng chất
              khi mang thai...
            </p>
            <button>
              <a href="{{ route('home.product') }}" class="orange-btn">Mua Ngay+</a>
            </button>
          </div>

          <div class="col-md-6">
            <img
              src="assets/Images/sale/Sale Images.png"
              class="img-responsive"
              alt="Image"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Customer review -->
    <div class="home-review">
      <div class="text-center">
        <h1>Nhận Xét Của Khách Hàng</h1>
        <div class="container">
          <div class="col-md-4">
            <img
              src="assets/Images/icon/Review QUANG HƯNG.png"
              class="img-responsive"
              alt="Image"
            />
          </div>
          <div class="col-md-4">
            <img
              src="assets/Images/icon/Review THÀNH LONG.png"
              class="img-responsive"
              alt="Image"
            />
          </div>
          <div class="col-md-4">
            <img
              src="assets/Images/icon/Review THỊ TRANG.png"
              class="img-responsive"
              alt="Image"
            />
          </div>
        </div>
      </div>
    </div>


@stop()