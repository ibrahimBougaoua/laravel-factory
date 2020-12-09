        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('panel.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Employees -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employees"
                    aria-expanded="true" aria-controls="employees">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Employees</span>
                </a>
                <div id="employees" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">employees :</h6>
                        <a class="collapse-item" href="{{ Route('employee.index') }}">All employees</a>
                        <a class="collapse-item" href="{{ Route('employee.create') }}">Create new employee</a>
                    </div>
                </div>
            </li>

            <!-- Factorie -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#factories"
                    aria-expanded="true" aria-controls="factories">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Factories</span>
                </a>
                <div id="factories" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">factories :</h6>
                        <a class="collapse-item" href="{{ route('factory.index') }}">All factories</a>
                        <a class="collapse-item" href="{{ route('factory.create') }}">Create new factory</a>
                    </div>
                </div>
            </li>

            <!-- point of sale -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pointofsale"
                    aria-expanded="true" aria-controls="pointofsale">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Points of sales</span>
                </a>
                <div id="pointofsale" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">point of sale :</h6>
                        <a class="collapse-item" href="{{ route('pointofsale.index') }}">All points of sales</a>
                        <a class="collapse-item" href="{{ route('pointofsale.create') }}">Create new point of sale</a>
                    </div>
                </div>
            </li>

            <!-- sales men -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#salesman"
                    aria-expanded="true" aria-controls="salesman">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Sales men</span>
                </a>
                <div id="salesman" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">sales men :</h6>
                        <a class="collapse-item" href="{{ route('salesman.index') }}">All sales men</a>
                        <a class="collapse-item" href="{{ route('salesman.create') }}">Create new sales man</a>
                    </div>
                </div>
            </li>

            <!-- sales men -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories"
                    aria-expanded="true" aria-controls="categories">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Categories</span>
                </a>
                <div id="categories" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">categories :</h6>
                        <a class="collapse-item" href="{{ route('category.index') }}">All categories</a>
                        <a class="collapse-item" href="{{ route('category.create') }}">Create new category</a>
                    </div>
                </div>
            </li>

            <!-- products men -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
                    aria-expanded="true" aria-controls="products">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>products</span>
                </a>
                <div id="products" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">products :</h6>
                        <a class="collapse-item" href="{{ route('product.index') }}">All products</a>
                        <a class="collapse-item" href="{{ route('product.create') }}">Create new product</a>
                    </div>
                </div>
            </li>

            <!-- stores men -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stores"
                    aria-expanded="true" aria-controls="stores">
                    <i class="fas fa-fw fa-store"></i>
                    <span>stores</span>
                </a>
                <div id="stores" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">stores :</h6>
                        <a class="collapse-item" href="{{ route('store.index') }}">All store</a>
                        <a class="collapse-item" href="{{ route('store.create') }}">Create new store</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->