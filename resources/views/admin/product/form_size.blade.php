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
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" action="{{ route('product-add-size', $product->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kích thước</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="size_id" style="width: 100%;">
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('size_id'))
                                            <div class="error">{{ $errors->first('size_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Số lượng</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0" class="form-control" name="quantity" value="{{ old('quantity') }}">
                                        @if ($errors->has('quantity'))
                                            <div class="error">{{ $errors->first('quantity') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Thêm</button>
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