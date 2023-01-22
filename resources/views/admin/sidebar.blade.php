<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Sản phẩm
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                    <a href="{{route('admin.product.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách Sản phẩm</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item menu-is-opening menu-open">
            <a href="{{route('admin.cate.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Loại hàng
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
{{--            <ul class="nav nav-treeview" style="display: block;">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.cate.create')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Thêm Loại hàng</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.cate.index')}}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Danh sách Loại hàng</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}
        </li>
        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <p>
                    Người dùng

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                    <a href="{{route('admin.users.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách Users</p>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>
