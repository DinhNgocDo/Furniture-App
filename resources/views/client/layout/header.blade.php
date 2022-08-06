<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}"> 
                        <img src="https://aconcept-vn.com/catalog/view/theme/default/images/social-share.png" alt="logo" style="    height: 40px;
                        width: 155px;
                        object-fit: cover;"> 
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">Trang chủ</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Danh mục
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    @foreach ($categories as $parent)
                                        <a class="dropdown-item" href="{{ route('category-products', $parent->id) }}">{{ $parent->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact-us') }}">Liên hệ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news') }}">Tin tức</a>
                            </li>
                            @if (Auth::check())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tài khoản
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" style="color: yellow !important">{{ Auth()->user()->name }}</a>
                                        <a class="dropdown-item" href="{{ route('information') }}">Thông Tin Cá Nhân</a>
                                        <a class="dropdown-item" href="{{ route('user-order') }}">Đơn hàng của bạn</a>
                                        <form action="{{ route('logout-client') }}" method="POST" class="dropdown-item" style="display: flex; justify-content: center;">
                                            @csrf
                                            <button type="submit" style="    border: none;
                                            background: none;
                                            outline: none;">
                                                <a>
                                                    <span class="hidden-xs" style="color: white">Đăng xuất</span>
                                                </a>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login-client') }}">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register-client') }}">Đăng ký</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="{{ route('cart') }}">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner" action="{{ route('search') }}" method="GET">
                <input type="text" class="form-control" id="search_input" name="key" placeholder="Nhập tên sản phẩm ...">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>