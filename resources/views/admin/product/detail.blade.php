@extends('admin.app')
@section('index')
    <section class="content-header">
        <h1><?= $tab ?></h1>
        @if (session()->has('messageSuccess'))
            <div class="col-md-3 infoMessage" id="infoMessage">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-bell-o"></i>
                            Thông báo
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        {{ session()->get('messageSuccess') }}
                    </div>
                </div>
            </div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if ($product->image != '')
                            <img 
                                class="profile-user-img product-detail-image img-responsive img-circle"
                                src="{{ asset('client/images/product/' . $product->image) }}">
                        @endif
                        <h3 class="profile-username text-center">{{ $product->name }}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Danh mục</b> <a class="pull-right">{{ $product->category->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Trạng thái</b> 
                                <a class="pull-right">
                                    {{ $product->status == 0 ? "Đã ẩn" : "Đang hiển thị" }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Giá gốc</b>
                                <a class="pull-right">{{ number_format($product->price) }}đ</a>
                            </li>
                            @if ($product->sale_percent != 0)
                                <li class="list-group-item">
                                    <b>Giá sale ({{ $product->sale_percent . '%' }})</b>
                                    <a class="pull-right">{{ number_format($product->price_sale) }}đ</a>
                                </li>
                            @endif
                        </ul>
                        <div class="form-group text-center">
                            <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-danger">
                                <b>Chỉnh sửa</b>
                            </a>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">
                                <b>Quay lại</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin</h3>
                    </div>
                    <div class="box-body">
                        <h3 class="text-bold">
                            Kích thước sản phẩm
                            <a href="{{ route('product-form-size', [$product->id]) }}" class="btn btn-primary">
                                <b>Thêm</b>
                            </a>
                        </h3>
                        <div class="timeline-footer">
                            @foreach ($product->productSizes as $ps)
                                <a class="btn btn-warning btn-xs" href="{{ route('product-edit-form-size', [
                                    $product->id,
                                    $ps->id
                                ]) }}">
                                    {{ $ps->size->name . ' (SL: ' . $ps->quantity . ')' }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-body">
                        <h3 class="text-bold">Mô tả</h3>
                        <div class="timeline-footer">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection