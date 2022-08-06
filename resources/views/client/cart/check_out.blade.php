@extends('client.home')
@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/contact_responsive.css') }}">
@endsection
@section('index')


<section class="ftco-section">
    <form action="{{ route('check-out') }}" method="POST" class="billing-form">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 ftco-animate">
                    <h3 class="mb-4 billing-heading"></h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Họ tên *</label>
                                <input type="text" class="form-control" name="name" value="{{ (Auth::check()) ? Auth::user()->name : old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ (Auth::check()) ? Auth::user()->email : old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Số điện thoại *</label>
                                <input type="number" class="form-control" name="phone" value="{{ (Auth::check()) ? Auth::user()->phone : old('phone') }}">
                                @if ($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Địa chỉ *</label>
                                <input type="text" class="form-control" name="address" value="{{ (Auth::check()) ? Auth::user()->address : old('address') }}">
                                @if ($errors->has('address'))
                                    <div class="error">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Ghi chú </label>
                                @if ($errors->has('note'))
                                    <div class="error">{{ $errors->first('note') }}</div>
                                @endif
                                <textarea class="form-control" placeholder="...." rows="10" cols="30" name="note">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 ftco-animate">
                    <div class="col-md-12 text-center">
                        <div class="cart-detail cart-total bg-light p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Đơn hàng</h3>
                            @foreach ($cart as $item)
                                <p>
                                    ({{ $item['name'] }} - size {{ $item['size'] }}) × {{ $item['quantity'] }} mẫu: {{ number_format($item['total']) }}đ
                                    {{-- <span>{{ number_format($item['total']) }}đ</span> --}}
                                </p>
                            @endforeach
                            <hr>
                            <p class="total-price">
                                <span>Tổng đơn: {{ number_format($total) }}đ</span>
                            </p>
                            <p>
                                <button type="submit" class="btn btn-primary py-3 px-4">Đặt hàng</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection