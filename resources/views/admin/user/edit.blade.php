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
                        <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Chọn quyền</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="role_id">
                                        @if ($user->role_id == 0)
                                            <option value="0" selected>Quản trị viên</option>
                                            <option value="1">Khách hàng</option>
                                        @else
                                            <option value="0">Quản trị viên</option>
                                            <option value="1" selected>Khách hàng</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('role_id'))
                                        <div class="error">{{ $errors->first('role_id') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Họ và tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                    @if ($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                    @if ($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Mật khẩu</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Số diện thoại</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                                    @if ($errors->has('phone'))
                                        <div class="error">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-info quaylai">Quay lại</a>
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