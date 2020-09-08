<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{asset('admin/images/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ware House</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link {{Request::is('admin/home')?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.companies.index')}}" class="nav-link {{Request::is('admin/companies')?'active':''}}">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Companies
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.godowns.index')}}" class="nav-link {{Request::is('admin/godowns')?'active':''}}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Godam
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories.index')}}" class="nav-link {{Request::is('admin/categories')?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.batches.index')}}" class="nav-link {{Request::is('admin/batches')?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Batches
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.types.index')}}" class="nav-link {{Request::is('admin/types')?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Product Type
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.products.index')}}" class="nav-link {{Request::is('admin/products')?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.challans.index')}}" class="nav-link {{Request::is('admin/challans')?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Challan In
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.challan-out.index')}}" class="nav-link {{Request::is('admin/challan-out')?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Challan Out
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.users.index')}}" class="nav-link {{Request::is('admin/users')?'active':''}}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.roles.index')}}" class="nav-link {{Request::is('admin/roles')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.permissions.index')}}" class="nav-link {{Request::is('admin/permissions')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>