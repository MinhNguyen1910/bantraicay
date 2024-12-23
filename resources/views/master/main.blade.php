<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Signika:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="assets/plugin/OwlCarousel/dist/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/plugin/OwlCarousel/dist/owl.theme.default.min.css"
    />
    <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" 
    integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/plugin/fontawesome/css/all.min.css">
    
  </head>
  <body>
    <!-- HEADER -->
    <!-- làm mầu dropdown!!! -->
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target=".navbar-ex1-collapse"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="{{ route('home.index') }}">
            <img src="assets/Images/icon/logo3.png" style="width: 185px; height: 90px" />
          </a>
          
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-center">
            <li><a href="{{ route('home.index') }}">Trang Chủ</a></li>
            <li><a href="{{ route('home.about') }}">Giới Thiệu</a></li>
            <li class="dropdown">
              <a href="{{ route('home.product') }}" class="dropdown-toggle" data-toggle="dropdown">Sản Phẩm<b class="caret"></b></a>
              <ul class="dropdown-menu">
                  @foreach ($cats_homes as $cats_home)
                    <li><a href="{{ route('home.category', $cats_home->id) }}">{{ $cats_home->name }}</a></li>
                  @endforeach
              </ul>
            </li>
            <li><a href="{{ route('home.contact') }}">Liên Hệ</a></li>
            @if(!auth('cus')->check())
            <li><a href="{{ route('account.register') }}">Đăng Ký</a></li>
            @endif 
          </ul> 
          
          <ul class="nav navbar-nav navbar-right">
            @if(auth('cus')->check())
              <li><a href="{{ route('account.profile') }}"></a></li>
              <li class="dropdown">
                <a href="{{ route('home.product') }}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user"></i><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('account.profile') }}">Thông tin cá nhân</a></li>
                  <li><a href="{{ route('order.history') }}">Lịch sử đặt hàng</a></li>
                </ul>
              </li>
                  <li><a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
                  <li><a href="{{ route('account.logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a></li>  
            @else  
              <li><a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
              <li><a href="{{ route('account.login') }}"><i class="fa-solid fa-user"></i></a></li>
            @endif 
          </ul> 
        </div>
      </div>
    </nav>

@yield('js')
@yield('body')

 <!-- Footer -->
 <div class="home-footer">
  <div class="container">
    <div class="row">
      <img
        src="assets/Images/icon/logo3.png"
        class="img-responsive img-banner"
        alt="Image"
      />

      <div class="col-md-3">
        <a href="{{ route('home.contact') }}">
          <div class="booter-info">
            <div class="booter-title">
              <p>liên hệ</p>
            </div>
            <div class="booter-item">
              <p>
                Tòa Nhà HTC, 250 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy, Hà Nội,
                Việt Nam
              </p>
              <p>0123.456.789</p>
              <p>contact@demo.vn</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-3">
        <a href="{{ route('home.about') }}">
          <div class="booter-info">
            <div class="booter-title">
              <p>hỗ trợ khách hàng</p>
            </div>
            <div class="booter-item">
              <p>Kinh nghiệm mua hàng</p>
              <p>Hướng dẫn mua hàng</p>
              <p>Chính sách đổi trả</p>
              <p>Hình thức thanh toán</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-3">
        <div class="booter-info">
          <div class="booter-title">
            <p>Liên kết nhanh</p>
          </div>
          <div class="booter-item">
            <a href="#"><p>Trang chủ</p></a>
            <a href="{{ route('home.about') }}">
              <p>Hình thức thanh toán</p>
              <p>Kinh nghiệm mua hàng</p>
              <p>Hình thức thanh toán</p>
              <p>Hướng dẫn mua hàng</p>
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <a href="{{ route('home.about') }}">
          <div class="gallery">
            <div class="booter-title">
              <p>gallery</p>
            </div>

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

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugin/OwlCarousel/dist/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
@if(Session::has('ok'))
<script>
  $.toast({
    heading: 'Thông báo',
    text: "{{ Session::get('ok') }}",
    showHideTransition: 'slide',
    position: 'top-center',
    icon: 'sucsses'
})
</script>
@endif

@if(Session::has('no'))
<script>
  $.toast({
    heading: 'Thông báo',
    text: "{{ Session::get('no') }}",
    showHideTransition: 'slide',
    position: 'top-center',
    icon: 'error'
})
</script>
@endif

</script>
</body>
</html>