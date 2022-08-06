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
                            <a href="#settings" data-toggle="tab" aria-expanded="true">Cập nhật thông tin</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Trạng thái</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            @if ($news->status == 0)
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
                                    <label for="inputName" class="col-sm-2 control-label">Hình ảnh</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    @if ($news->image)
                                                        <img 
                                                            class="img-responsive news-detail-image"
                                                            src="{{ asset('client/images/news/' . $news->image) }}
                                                        ">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <div class="error">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tên bài</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{ $news->name }}">
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Mô tả ngắn</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="short_description" value="{{ $news->short_description }}">
                                        @if ($errors->has('short_description'))
                                            <div class="error">{{ $errors->first('short_description') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Nội dung bài</label>
                                    <div class="col-sm-10">
                                        @if ($errors->has('content'))
                                            <div class="error">{{ $errors->first('content') }}</div>
                                        @endif
                                        <textarea id="editor1" rows="10" cols="80" name="content" class="form-control">
                                            {{ $news->content }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                                        <a href="{{ route('news.index') }}" class="btn btn-info quaylai">Quay lại</a>
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
        CKEDITOR.replace('editor1');
    </script>
@endsection