@extends('admin.app')
@section('index')
    <section class="content-header">
        <h1><?= $tab ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#settings" data-toggle="tab" aria-expanded="true">Thêm kích thước</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <form action="{{ route('product-delete-size', [
                            $product->id,
                            $productSize->id
                        ]) }}" method="POST">
                            @method('DELETE')
                            @csrf   
                            <button type="submit" class="btn btn-danger" title="Xóa kích thước này" onClick="return confirm('Bạn có chắc chắn muốn xóa')">
                                Xóa kích thước này
                            </button>
                        </form>
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" action="{{ route('product-update-size', [
                                $product->id,
                                $productSize->id
                            ]) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kích thước</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productSize->size->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Số lượng</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0" class="form-control" name="quantity" value="{{ $productSize->quantity }}">
                                        @if ($errors->has('quantity'))
                                            <div class="error">{{ $errors->first('quantity') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info quaylai">Quay lại</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('.select2').select2();
    </script>
@endsection