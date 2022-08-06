<header class="main-header">
    <a class="logo">
        <span class="logo-lg">Manager</span>
        <span class="logo-mini">
            <i class="fa fa-dashboard"></i>
        </span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @php
                    $notis = App\Models\Order::where('notification', 1)->get();
                    $notis = count($notis);
                @endphp
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{ $notis }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Thông báo</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('orders.index') }}">
                                        <i class="fa fa-shopping-cart text-green"></i> Có {{ $notis }} đơn hàng chưa xem
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/iconUser.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('dist/img/iconUser.png') }}" class="img-circle" alt="User Image">
                            <p>
                                {{ Auth()->user()->name }}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Đăng xuất</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>