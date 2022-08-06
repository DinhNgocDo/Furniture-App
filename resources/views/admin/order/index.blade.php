@extends('admin.app')
@section('index')
    <section class="content-header">
        <h1>{{ $tab }}</h1>
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
                            @if ($orders->isEmpty())
                                <tr>
                                    <th>Không có thông tin</th>
                                </tr>
                            @else
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thông báo</th>
                                        <th>Chi tiết</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->phone }}</td>
                                            <td>
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
                                            <td>
                                                {!!
                                                    $order->notification == 0 ? 
                                                        '<span class="label label-success">Đã đọc</span>' 
                                                    :
                                                        '<span class="label label-primary">Thông báo mới</span>' 
                                                !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="td general">
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="delete-form general delete">
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
                                    @foreach ($orders->links()->elements[0] as $key => $item)
                                        @if ($orders->links()->paginator->currentPage() == $key)
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