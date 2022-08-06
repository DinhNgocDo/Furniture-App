@extends('client.home')
@section('index')

<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Đơn hàng của bạn
        </span>

        <span class="stext-109 cl4">
            Chi tiết đơn hàng
        </span>
    </div>
</div>

<div class="entry-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header-title">
                    <h2>Chi tiết đơn hàng</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg0 p-t-75 p-b-85">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                @if (count($detail) != 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail text-center">Hình ảnh</th>
                                            <th class="product-name text-center">Tên sản phẩm</th>
                                            <th class="product-price text-center">Size</th>
                                            <th class="product-quantity text-center">Số lượng</th>
                                            <th class="product-quantity text-center">Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;   
                                        @endphp
                                        @foreach ($detail as $item)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <img 
                                                        src="{{ asset('client/images/product/' . $item->productSize->product->image) }}"
                                                        class="profile-user-img img-responsive"
                                                    >
                                                </td>
                                                <td class="product-name">{{ $item->productSize->product->name }}</td>
                                                <td class="product-price">{{ $item->productSize->size->name }}</td>
                                                <td class="product-quantity">{{ $item->quantity }}</td>
                                                <td class="product-quantity"><b>{{ number_format($item->total) }}đ</b></td>
                                            </tr>
                                            @php
                                                $total += $item->total
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{{ number_format($total) }}đ</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    Không có đơn hàng
                @endif
            </div>
        </div>
    </div>
</div>
@endsection