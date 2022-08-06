@extends('client.home')
@section('index')
@php
    $route = \Route::current();
    $routeName = $route->getName();
    $categoryId = 0;

    if ($routeName == 'category-products' || $routeName == 'child-category-products') {
        $categoryId = $route->parameters()['category'];
    }
@endphp


<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <a href="{{ route('home') }}">
                                <h3 class="{{ request()->is('/') ? "text-bold" : "" }}">Tất cả</h3>
                            </a>
                        </div>
                    </aside>
                    @foreach ($categories as $parent)
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <a href="{{ route('category-products', $parent->id) }}">
                                    <h3 class="{{ $parent->id == $categoryId ? "text-bold" : "" }}">{{ $parent->name }}</h3>
                                </a>
                            </div>
                            <div class="widgets_inner"> 
                                <ul class="list">
                                    @foreach ($parent->children as $child)
                                        <li>
                                            <a href="{{ route('category-products', $child->id) }}" class="{{ $child->id == $categoryId ? "text-bold" : "" }}">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p><span>{{ $products->count() }} </span> Sản phẩm được tìm thấy</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item" style="height: 400px">
                                <img src="{{ asset('client/images/product/' . $product->image) }}" alt="" style="    height: 200px;
                                object-fit: cover;">
                                <div class="single_product_text">
                                    <h4 class="s-text-2">{{ $product->name }}</h4>
                                    <h3>
                                        @if ($product->sale_percent != 0)
                                            <div class="sale" style="text-decoration: line-through;">
                                                {{ number_format($product->price) }}đ
                                            </div>
                                        @endif

                                        {{ number_format(($product->sale_percent == 0) ? $product->price : $product->price_sale) . 'đ' }}
                                    </h3>
                                    <a href="{{ route('detail-product', $product->id) }}" class="add_cart">Xem chi tiết<i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    @if (count($products) != 0)
                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        @foreach ($products->links()->elements[0] as $key => $item)
                                            <li class="page-item {{ $products->links()->paginator->currentPage() == $key ? "active" : "" }}">
                                                <a class="page-link" href="{{ $item }}">{{ $key }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection