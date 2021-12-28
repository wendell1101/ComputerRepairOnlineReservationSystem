<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
        <strong class="brand-text font-weight-light">Tech2U</strong>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="sidenav-ul">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if(Request::is('admin/dashboard*')) active @endif" id="dashboard-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link @if(Request::is('admin/user*')) active @endif" id="categories-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link @if(Request::is('admin/categor*')) active @endif" id="categories-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Product Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link @if(Request::is('admin/product*')) active @endif" id="products-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('xcategory_services.index') }}" class="nav-link @if(Request::is('admin/xcategory_servic*')) active @endif" id="categories-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Service Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('services.index') }}" class="nav-link @if(Request::is('admin/service*')) active @endif" id="products-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Services
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link @if(Request::is('admin/reservation*')) active @endif" id="reservations-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Reservations
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
