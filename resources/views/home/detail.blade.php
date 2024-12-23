@extends('master.main')
@section('body')
   
        <!-- Banner -->
    <div class="banner-about">
      <div class="text-center">
        <h1>Chi tiết đơn hàng</h1>
        <p><a href="{{ route('home.index') }}">Home</a> || Chi tiết đơn hàng </p>
      </div>
    </div>

      <!-- Our Product -->
      <div class="product-product">
        <div class="container">
              <div class="col-md-6" style="margin-top: 50px; margin-bottom: 50px;">
                <h3>Thông tin khách hàng</h3>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Họ tên</th>
                      <td>{{ $auth->name }}</td>
                    </tr>
                    <tr>
                      <th>Điện thoại</th>
                      <td>{{ $auth->phone }}</td>
                    </tr>
                    <tr>
                      <th>Điạ chỉ</th>
                      <td>{{ $auth->address }}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ $auth->email }}</td>
                    </tr>
                  </thead>
                </table>
              </div>

              <div class="col-md-6" style="margin-top: 50px; margin-bottom: 50px;">
                <h3>Thông tin dao hàng</h3>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Họ tên</th>
                      <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                      <th>Điện thoại</th>
                      <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                      <th>Điạ chỉ</th>
                      <td>{{ $order->address }}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ $order->email }}</td>
                    </tr>
                  </thead>
                </table>
              </div>
              

              <h3>Thông tin sản phẩm đơn hàng</h3>

              <table class="table table-hover" style="margin-top: 50px; margin-bottom: 50px;">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order->details as $item)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td><img src="uploads/product/{{ $item->product->image }}" alt="" width="40px" height="40px"></td>
                      <td>{{ $item->product->name }}</td>
                      <td>{{ number_format($item->price) }}</td>
                      <td>{{ number_format($item->quantity) }}</td>
                      <td>{{ number_format($item->price * $item->quantity) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table> 
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