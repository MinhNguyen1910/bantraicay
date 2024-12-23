@extends('master.main')
@section('body')
   
        <!-- Banner -->
    <div class="banner-about">
      <div class="text-center">
        <h1>Xác Nhận Đơn Hàng</h1>
        <p><a href="{{ route('home.index') }}">Home</a> || Xác Nhận Đơn Hàng </p>
      </div>
    </div>

      <!-- Our Product -->
      <div class="product-product">
        <div class="container">
          <div class="row">
            <div class="col-md-7" style="margin-top: 50px; margin-bottom: 50px;">  
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
                  @foreach ($carts as $cart)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $cart->product->name }}</td>
                      <td><img src="uploads/product/{{ $cart->product->image }}" alt="" width="40px" height="40px"></td>
                      <td>{{ $cart->price }}</td>
                      <td>
                        <form action="{{ route('cart.update', $cart->product_id) }}" method="get">
                          <input type="number" value="{{ $cart->quantity }}" name="quantity" style="width: 60xp; text-align: center;">
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
          <div class="col-md-5" style="margin-top: 50px; margin-bottom: 50px;">
            <form action="" id="form-register" method="POST">
              @csrf
            <div class="form-group">
              <label for="">Tên đăng nhập:</label>
              <input
                type="text"
                class="form-control"
                value="{{ $auth->name }}"
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
                class="form-control"
                name="email"
                value="{{ $auth->email }}"
                placeholder="Email"
              />
            </div>
            @error('email') <small class="error-message">{{$message}}</small> @enderror
            <!-- PHONE -->
            <div class="form-group">
              <label for="">Số của bạn:</label>
              <input
                type="text"
                class="form-control"
                name="phone"
                value="{{ $auth->phone }}"
                placeholder="Phone"
              />
            </div>
            @error('phone') <small class="error-message">{{$message}}</small> @enderror
            <!-- ADDRESS -->
            <div class="form-group">
              <label for="">Địa chỉ của bạn:</label>
              <input
                type="text"
                class="form-control"
                name="address"
                value="{{ $auth->address }}"
                placeholder="Address"
              />
            </div>
            @error('address') <small class="error-message">{{$message}}</small> @enderror
            <button type="submit" class="btn btn-default">Đặt Hàng</button>
          </form>
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