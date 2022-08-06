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
    </div>
</div>

<div class="entry-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header-title">
                    <h2>Đơn hàng của bạn</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg0 p-t-75 p-b-85">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                @if (count($orders) != 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail text-center">Mã đơn</th>
                                            <th class="product-name text-center">Trạng thái</th>
                                            <th class="product-price text-center">Chi tiết</th>
                                            <th class="product-quantity text-center">Ngày đặt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    {{ $order->id }}
                                                </td>
                                                <td class="product-name">
                                                    @php
                                                        if ($order->status == 0) {
                                                            echo '<span class="label label-primary">Đã xác nhận</span>';
                                                        }

                                                        if ($order->status == 1) {
                                                            echo '<span class="label label-danger">Chưa xác nhận</span>';
                                                        }

                                                        if ($order->status == 2) {
                                                            echo '<span class="label label-success">Đã thanh toán</span>';
                                                        }
                                                    @endphp
                                                </td>
                                                <td class="product-remove">
                                                    <a href="{{ route('user-order-detail', $order->id) }}" class="remove-cart">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td class="product-quantity">
                                                    {{ date('d/m/Y H:i:m', strtotime($order->created_at)) }}
                                                </td>
                                            </tr>
                                        @endforeach
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