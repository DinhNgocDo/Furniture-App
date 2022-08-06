@extends('client.home')
@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/contact_responsive.css') }}">
@endsection
@section('index')


<section class="cart_area padding_top">
    <div class="container">
        @if (!empty($cart))
            <form action="{{ route('update-cart') }}" method="POST">
                @csrf
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng giá</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $key => $item)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('client/images/product/' . $item['image']) }}" alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $item['name'] }} - {{ $item['size'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{ number_format($item['price']) }}đ</h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="number" name="quantity[{{ $key }}]" value="{{ $item['quantity'] }}" min="1" max="10">
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{ number_format($item['total']) }}đ</h5>
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{ route('remove-cart', $key) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Tổng đơn hàng</h5>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($total) }}đ</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <button type="submit" class="btn_1" style="border:none">Cập nhật giỏ hàng</button>
                            <a class="btn_1 checkout_btn_1" href="{{ route('check-out-form') }}">Tiến hành thanh toán</a>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <div class="checkout_btn_inner text-center">
                Không có đơn hàng nào
                <br>
                <br>
                <a class="btn_1 checkout_btn_1" href="{{ route('home') }}">Chọn sản phẩm</a>
            </div>
        @endif
    </div>
</section>
@endsection