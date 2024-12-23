@extends('master.main')
@section('body')
   
        <!-- Banner -->
    <div class="banner-about">
      <div class="text-center">
        <h1>Lịch sử đặt hàng</h1>
        <p><a href="{{ route('home.index') }}">Home</a> || Lịch sử đặt hàng </p>
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
                    <th>Order date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($auth->orders as $item)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $item->created_at->format('d/m/Y') }}</td>
                      <td>
                        @if($item->status == 0)
                            <span>Bạn chưa xác nhận đơn hàng</span>
                        @elseif($item->status == 1)
                            <span>Bạn đã xác nhận đơn hàng</span>
                        @elseif($item->status == 2)
                            <span>Bạn đã thanh toán đơn hàng</span>
                        @else
                            <span>Đơn hàng đã hủy</span>
                        @endif
                      </td>
                      <td>
                        {{ number_format($item-> totalPrice) }}
                      </td>
                      <td>
                        <a class="btn btn-primary" href="{{ route('order.detail', $item->id) }}">Chi tiết</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <br>
              <div class="text-center">            
                <a href="" class="btn btn-primary">Tiếp túc mua sắm</a>
                @if($carts->count())
                <a href="{{ route('cart.clear') }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa tất cả</a>
                <a href="{{ route('order.checkout') }}" class="btn btn-success">Đặt hàng</a>
                @endif
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