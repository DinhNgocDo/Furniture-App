<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản trị hệ thống</title>
    @include('admin.layout.link') 
</head>
<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        @include('admin.layout.header')
        @include('admin.layout.menu')
	    <div class="content-wrapper">
            @yield('index')
        </div>
        @include('admin.layout.footer')
    </div>
</body>
@include('admin.layout.script')