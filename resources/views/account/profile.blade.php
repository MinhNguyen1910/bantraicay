@extends('master.main')

@section('body')

    <div class="banner-about">
        <div class="text-center">
          <h1>Trang cá nhân</h1>
          <p><a href="home.index">Home</a> || Đăng nhập</p>
        </div>
      </div>
  
      <!-- Register -->
      <div class="register-register">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <p id="register-text">
                Trang cá nhân
              </p>
              <form action="" id="form-register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Tên đăng nhập:</label>
                    <input
                      type="text"
                      value="{{ $auth->name }}"
                      class="form-control"
                      name="name"
                      placeholder="Tên đăng nhập"
                    />
                  </div>
                  @error('name') <small class="error-message">{{$message}}</small> @enderror
    <!-- EMAIL -->
                  <div class="form-group">
                    <label for="">Email:</label>
                    <input
                      type="text"
                      value="{{ $auth->email }}"
                      class="form-control"
                      name="email"
                      placeholder="Email"
                    />
                  </div>
                  @error('email') <small class="error-message">{{$message}}</small> @enderror
    <!-- PHONE -->
                  <div class="form-group">
                    <label for="">Số của bạn:</label>
                    <input
                      type="text"
                      value="{{ $auth->phone }}"
                      class="form-control"
                      name="phone"
                      placeholder="Phone"
                    />
                  </div>
                  @error('phone') <small class="error-message">{{$message}}</small> @enderror
    <!-- ADDRESS -->
                  <div class="form-group">
                    <label for="">Địa chỉ của bạn:</label>
                    <input
                      type="text"
                      value="{{ $auth->address }}"
                      class="form-control"
                      name="address"
                      placeholder="Address"
                    />
                  </div>
                  @error('address') <small class="error-message">{{$message}}</small> @enderror
                  <!-- ADDRESS -->
                  <div class="form-group">
                    <label for="">Giới tính:</label>
                    <select name="gender" class="form-control" ">
                        <option value="">--- Trọn giới tính ---</option>
                        <option value="1" {{ $auth->gender == 1 ? 'selected' : ''}} >Nam tính</option>
                        <option value="0" {{ $auth->gender == 0 ? 'selected' : ''}}>Nữ tính</option>
                    </select>
                  </div>
<!-- PASSWORD -->
                  <div class="form-group">
                    <label for="">Password:</label>
                    <input
                      type="text"
                      class="form-control"
                      name="password"
                      placeholder="Nhập password"
                    />
                  </div>
                  @error('password') 
                  <div class="help-block">{{ $message }}</div>
                   @enderror
                <button type="submit" class="btn btn-default">Thay đổi</button>
              </form>
            </div>
            <div class="col-md-4">
              <div class="article-item">
                <div class="alticle-item-title text-center">
                  <p>Danh mục sản phẩm</p>
                </div>
                <div class="alticle-item-table">
                  <ul>
                    <li><a href="ourProduct.html">Hoa quả</a></li>
                    <li><a href="ourProduct.html">Rau hữu cơ</a></li>
                    <li><a href="ourProduct.html">Thực phẩm khô</a></li>
                    <li><a href="ourProduct.html">Nước ép</a></li>
                  </ul>
                </div>
  
                <div class="alticle-item-title text-center">
                  <p>Sản phẩm</p>
                </div>
                <div class="alticle-item-product">
                  <div class="col-md-8">
                    <p>NHO XANH</p>
  
                    <div class="col-md-6">
                      <a href="ourProduct.html">
                        <h1 id="h1-text">12,000 đ</h1>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <h2 id="h2-text">15,000 đ</h2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <a href="ourProduct.html">
                      <img
                        src="assets/Images/Rau-cu-qua/graples-green.jpg"
                        class="img-responsive"
                        alt="Image"
                      />
                    </a>
                  </div>
                </div>
  
                <div class="alticle-item-product">
                  <div class="col-md-8">
                    <p>NHO XANH</p>
                    <div class="col-md-6">
                      <a href="ourProduct.html">
                        <h1 id="h1-text">12,000 đ</h1>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <h2 id="h2-text">15,000 đ</h2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <a href="ourProduct.html">
                      <img
                        src="assets/Images/Rau-cu-qua/graples-green.jpg"
                        class="img-responsive"
                        alt="Image"
                      />
                    </a>
                  </div>
                </div>
  
                <div class="alticle-item-product">
                  <div class="col-md-8">
                    <p>NHO XANH</p>
                    <div class="col-md-6">
                      <a href="ourProduct.html">
                        <h1 id="h1-text">12,000 đ</h1>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <h2 id="h2-text">15,000 đ</h2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <a href="ourProduct.html">
                      <img
                        src="assets/Images/Rau-cu-qua/graples-green.jpg"
                        class="img-responsive"
                        alt="Image"
                      />
                    </a>
                  </div>
                </div>
  
                <div class="alticle-item-product">
                  <div class="col-md-8">
                    <p>NHO XANH</p>
                    <div class="col-md-6">
                      <a href="ourProduct.html">
                        <h1 id="h1-text">12,000 đ</h1>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <h2 id="h2-text">15,000 đ</h2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <a href="ourProduct.html">
                      <img
                        src="assets/Images/Rau-cu-qua/graples-green.jpg"
                        class="img-responsive"
                        alt="Image"
                      />
                    </a>
                  </div>
                </div>
  
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