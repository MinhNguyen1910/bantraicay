<h3>Hi: {{ $order->customer->name }}</h3>

<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod cumque repellat neque sint architecto minima.</p>

<h4>Chi tiết đơn hàng</h4>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    <?php $total=0; ?>
    @foreach ($order->details as $detail)
    <tr>
        <th>{{ $loop->index +1 }}</th>
        <th>{{ $detail->product->name }}</th>
        <th>{{ $detail->price }}</th>
        <th>{{ $detail->quantity }}</th>
        <th>{{ number_format($detail->price * $detail->quantity) }}</th>
    </tr>
    <?php $total+=$detail->price * $detail->quantity; ?>
    @endforeach
    <tr>
        <th colspan="4">Total price</th>
        <th>{{ number_format($total) }}</th>
    </tr>
</table>

<p><a href="{{ route('order.verify', $token) }}">Click here to verify your order by us market</a></p>