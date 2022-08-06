@extends('client.home')
@section('index')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <form action="{{ route('change-information') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-title">
                            <h2>{{ $pageNameRoot }}</h2>
                        </div>
                        <div class="row offset-lg-4">
                            <div class="col-md-6 mb-3">
                                Họ tên
                                <input type="text" class="form-control" name="name" value="{{ (Auth::check()) ? Auth::user()->name : old('name') }}" placeholder="Họ tên">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                Email
                                <input type="email" class="form-control" name="email" value="{{ (Auth::check()) ? Auth::user()->email : old('email') }}" placeholder="Email">
                                @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                                @if (session()->has('email'))
                                    <div class="error">{{ session()->get('email') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">	
                                Số điện thoại										
                                <input type="number" class="form-control" name="phone" value="{{ (Auth::check()) ? Auth::user()->phone : old('phone') }}" placeholder="Điện thoại">
                                @if ($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                @endif
                                @if (session()->has('phone'))
                                    <div class="error">{{ session()->get('phone') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">	
                                Địa chỉ										
                                <input type="text" class="form-control" name="address" value="{{ (Auth::check()) ? Auth::user()->address : old('address') }}" placeholder="Địa chỉ">
                                @if ($errors->has('address'))
                                    <div class="error">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                @if ($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <div class="cart-btn text-center">
                                    <input type="submit" class="btn amado-btn btn-primary w-30" value="Thay đổi thông tin">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection