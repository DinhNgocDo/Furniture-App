@extends('admin.app')
@section('index')
    <section class="content-header">
        <h1>{{ $tab }}</h1>
        <div class="timeline-footer general">
            <a href="{{ route('products.create') }}" class="btn btn-primary btn general">
                <i class="fa fa-plus-square general"></i> Thêm mới
            </a>
        </div>
        @if (session()->has('messageSuccess'))
            <div class="col-md-3 infoMessage">
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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách</h3>
                </div>
                <div id="livesearch"></div>
                    <div class="box-body table-responsive no-padding" id="tableContent">
                        <table class="table table-hover text-center">
                            @if ($products->isEmpty())
                                <tr>
                                    <th>Không có thông tin</th>
                                </tr>
                            @else
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Danh mục</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>
                                                <img class="image" src="{{ asset('client/images/product/' . $product->image) }}" alt="">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->status == 0 ? "Đang ẩn" : "Đang hiển thị" }}</td>
                                            <td>
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="td general">
                                                <a href="{{ route('products.edit', $product->id) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form general delete">
                                                    @method('DELETE')
                                                    @csrf   
                                                    <button type="submit" title="Xóa" onClick="return confirm('Bạn có chắc chắn muốn xóa')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                        <div class="col-sm-12 text-right">
                            <div class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    @foreach ($products->links()->elements[0] as $key => $item)
                                        @if ($products->links()->paginator->currentPage() == $key)
                                            <li class="active">
                                                <a>{{ $key }}</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $item }}">{{ $key }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection