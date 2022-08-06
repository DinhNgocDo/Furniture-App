<body>
    <p>Họ tên: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Điện thoại: {{ $data['phone'] }}</p>
    <p>Địa chỉ: {{ $data['address'] }}</p>
    @if (isset($data['password']))
        <p>Đây là mật khẩu để đăng nhập lần sau cho khách hàng mới: {{ $data['password'] }}</p>
    @endif
    <p><a href="{{ route('user-order') }}">Link đơn hàng</a></p>

    <p>Sản phẩm</p>
    @php
        $total = 0;
    @endphp
    @foreach ($data['cart'] as $key => $item)
        <p>
            <b>- {{ $item["name"] }} ({{ $item["size"] }}), số lượng: {{ $item["quantity"] }} | Tổng giá tiền: {{ number_format($item["total"]) }} VNĐ</b>    
        </p>
        @php
            $total += $item["total"];
        @endphp
    @endforeach
    <p>
        Tổng số tiền cần thanh toán: 
        <b>
            {{ number_format($total) }} VNĐ
        </b>
    </p>
</body>