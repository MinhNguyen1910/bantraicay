@extends('manager.manager')
@section('main')
<h1 class="text-center">Lịch sử đặt hàng</h1>
      <!-- Our Product -->
      <div class="product-product">
        <div class="container">
          <div class="row">
            <div class="col-md-12">  
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
                  @foreach ($orders as $item)
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
                        <a class="btn btn-primary" href="{{ route('order.show', $item->id) }}">Chi tiết</a>
                      </td>
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