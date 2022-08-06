<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang chủ</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
    @include('client.layout.link')
</head>
<body class="goto-here">
    @php
        $route = \Route::current();
        $routeName = $route->getName();
        $pageName = '';
        $categoryId = 0;

        if ($routeName == 'category-products' || $routeName == 'child-category-products') {
            $categoryId = $route->parameters()['category'];
            $pageName = App\Models\Category::findOrFail($categoryId)->name;
        }

        if (isset($pageNameRoot)) {
            $pageName = $pageNameRoot;
        }
    @endphp
    <div class="notification">
        @if (session()->has('message'))
            <div class="message">{{ session()->get('message') }}</div>
            <script>
                setTimeout(() => {
                    $('.message').delay(100).slideUp();
                }, 3000);
            </script>
        @endif
    </div>
    
    @include('client.layout.header')
    @include('client.layout.tab')

    @yield('index')
    
    @include('client.layout.footer')
    @include('client.layout.script')
</body>
</html>
