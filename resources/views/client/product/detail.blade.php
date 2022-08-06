@extends('client.home')
@section('index')

<div class="product_image_area section_padding">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="{{ asset('client/images/product/' . $product->image) }}">
                            <img src="{{ asset('client/images/product/' . $product->image) }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>{{ number_format(($product->sale_percent != 0) ? $product->price_sale : $product->price) . 'đ' }}</h2>
                    <ul class="list">
                    <li>
                        <a class="active" href="#">
                        <span>Thể loại</span> : {{ $product->category->name }}</a>
                    </li>
                    <li>
                        <a href="#"> <span>Trạng thái</span> : Còn hàng</a>
                    </li>
                    </ul>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <select id="product_size_id" class="form-control">
                            @foreach ($product->productSizes as $ps)
                                <option value="{{ $ps->id }}">{{ $ps->size->name }} - Số lượng: {{ $ps->quantity }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <div class="product_count">
                            <input class="input-number" type="number" value="1" min="1" max="10" id="quantity">
                        </div>
                        <a href="{{ route('add-cart') }}" class="form-cart btn_3">Thêm vào giỏ</a>
                        <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 30px">
            <div class="col-lg-12">
                <h3><b>Mô tả</b></h3>
                <br>
                <p>{!! $product->description !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('.form-cart').click(function(e) {
	    e.preventDefault();

	    var route = $(this).attr('href');
        var product_size_id = $('#product_size_id').val();
        var quantity = $('#quantity').val();

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                product_size_id: product_size_id,
                quantity: quantity,
            },
        })
        .done(function(res) {
            $('.notification').append(`
                <div class="message">
                    ${res.message}
                </div>
            `);

            $('.message').delay(3000).slideUp();

            setTimeout(function() {
                $('.notification').text('');
            }, 60000)
        })
        .fail(function(err) {
            alert(err.responseJSON.errors.quantity[0])
        })
        .always(function() {

        });
    });
</script>
@endsection