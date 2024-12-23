@extends('master.main')

@section('body')
    <!-- Banner -->
    <div class="banner-about">
        <div class="text-center">
          <h1>Giới Thiệu</h1>
          <p><a href="{{ route('home.index') }}">Home</a> || Giới Thiệu</p>
        </div>
      </div>

      <!-- About us -->
      <div class="about-about">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h1 class="about-title">Giới thiệu</h1>
              <h2 class="about-heading">Lorem Ipsum là gì?</h2>
              <p>
                Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào
                việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã
                được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn
                từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn
                bản với nhau để tạo thành một bản mẫu văn bản. Đoạn văn bản này
                không những đã tồn tại năm thế kỉ, mà khi được áp dụng vào tin
                học văn phòng, nội dung của nó vẫn không hề bị thay đổi. Nó đã
                được phổ biến trong những năm 1960 nhờ việc bán những bản giấy
                Letraset in những đoạn Lorem Ipsum, và gần đây hơn, được sử dụng
                trong các ứng dụng dàn trang, như Aldus PageMaker.
              </p>
              <img
                src="assets/Images/gallery/dang-xinh-da-dep-voi-sinh-to-bo-chuoi-thom-ngon-202201101952370748.jpeg"
                class="img-responsive"
                alt="Image"
              />
              <h3>Nước sinh tố bơ. Tốt cho sức khỏe, tốt cho cuộc sống.</h3>
              <h2>Lorem Ipsum là gì?</h2>
              <p>
                Trái với quan điểm chung của số đông, Lorem Ipsum không phải chỉ
                là một đoạn văn bản ngẫu nhiên. Người ta tìm thấy nguồn gốc của
                nó từ những tác phẩm văn học la-tinh cổ điển xuất hiện từ năm 45
                trước Công Nguyên, nghĩa là nó đã có khoảng hơn 2000 tuổi. Một
                giáo sư của trường Hampden-Sydney College (bang Virginia – Mỹ)
                quan tâm tới một trong những từ la-tinh khó hiểu nhất,
                “consectetur”, trích từ một đoạn của Lorem Ipsum, và đã nghiên
                cứu tất cả các ứng dụng của từ này trong văn học cổ điển, để từ
                đó tìm ra nguồn gốc không thể chối cãi của Lorem Ipsum. Thật ra,
                nó được tìm thấy trong các đoạn 1.10.32 và 1.10.33 của “De
                Finibus Bonorum et Malorum” (Đỉnh tối thượng của Cái Tốt và Cái
                Xấu) viết bởi Cicero vào năm 45 trước Công Nguyên. Cuốn sách này
                là một luận thuyết đạo lí rất phổ biến trong thời kì Phục Hưng.
                Dòng đầu tiên của Lorem Ipsum, “Lorem ipsum dolor sit amet…”
                được trích từ một câu trong đoạn thứ 1.10.32.
              </p>
            </div>
            <div class="col-md-4">
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