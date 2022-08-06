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
                            <a href="#settings" data-toggle="tab" aria-expanded="true">Thêm thông tin</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" action="{{ route('categories.update', $category->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Trạng thái</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            @if ($category->status == 0)
                                                <option value="0" selected>Ẩn</option>
                                                <option value="1">Hiển thị</option>
                                            @else
                                                <option value="0">Ẩn</option>
                                                <option value="1" selected>Hiển thị</option>
                                            @endif
                                        </select>
                                        @if ($errors->has('status'))
                                            <div class="error">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dạnh mục cha</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                                            <option value="0">-- Không có --</option>
                                            @foreach ($parents as $parent)
                                                @if ($parent->id == $category->parent_id)
                                                    <option value="{{ $parent->id }}" selected>{{ $parent->name }}</option>
                                                @else
                                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('parent_id'))
                                            <div class="error">{{ $errors->first('parent_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tên danh mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                                        <a href="{{ route('categories.index') }}" class="btn btn-info quaylai">Quay lại</a>
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