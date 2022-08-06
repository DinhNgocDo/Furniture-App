<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    <span>Website</span>
                </a>
            </li>
            <li class="{{ request()->is('*dashboard*') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('*admin/users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Quản lý người dùng</span>
                </a>
            </li>
            <li class="{{ request()->is('*admin/categories*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-list-ul"></i>
                    <span>Quản lý danh mục</span>
                </a>
            </li>
            <li class="{{ request()->is('*admin/sizes*') ? 'active' : '' }}">
                <a href="{{ route('sizes.index') }}">
                    <i class="fa fa-list-ul"></i>
                    <span>Quản lý kích thước</span>
                </a>
            </li>
            <li class="{{ request()->is('*admin/products*') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-inbox"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="{{ request()->is('*admin/orders*') ? 'active' : '' }}">
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-cart-plus"></i>
                    <span>Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="{{ request()->is('*admin/news*') ? 'active' : '' }}">
                <a href="{{ route('news.index') }}">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Quản lý tin tức</span>
                </a>
            </li>
        </ul>
    </section>
</aside>