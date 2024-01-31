<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">grocery shop</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Report Panel
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reports"
            aria-expanded="true" aria-controls="reports">
            <i class="fas fa-hand-holding-usd"></i>
            <span>Reports</span>
        </a>
        <div id="reports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Report Components:</h6>
                <a class="collapse-item" href="{{route('report.index')}}"><i class="fas fa-hand-point-right"></i> Collection Reports</a>
                {{-- <a class="collapse-item" href="buttons.html"><i class="fas fa-hand-point-right"></i> Custome Reports</a>
                <a class="collapse-item" href="buttons.html"><i class="fas fa-hand-point-right"></i> Supplier Reports</a>
                <a class="collapse-item" href="{{route('report.friends')}}"><i class="fas fa-hand-point-right"></i> Friend Reports</a> --}}
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaction"
            aria-expanded="true" aria-controls="transaction">
            <i class="fas fa-tasks"></i>
            <span>Transactions</span></a>
        </a>
        <div id="transaction" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Report Components:</h6>
                <a class="collapse-item" href="{{route('transaction.income')}}"><i class="fas fa-hand-point-right"></i> Income Transactions</a>
                <a class="collapse-item" href="{{route('transaction.expense')}}"><i class="fas fa-hand-point-right"></i> Expense Transactions</a>
                <a class="collapse-item" href="{{route('transaction.loan')}}"><i class="fas fa-hand-point-right"></i> Loan Transactions</a>
                <a class="collapse-item" href="{{route('transaction.create')}}"><i class="fas fa-plus-circle"></i> Add Transactions</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Main Panel
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-shopping-cart"></i>
            <span>Customers</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Customer Components:</h6>
                <a class="collapse-item" href="{{route('customer.index')}}"><i class="fas fa-hand-point-right"></i> Customer List</a>
                <a class="collapse-item" href="{{route('customer.create')}}"><i class="fas fa-hand-point-right"></i> Customer Add</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-truck"></i>
            <span>Suppliers</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Supplier Components:</h6>
                <a class="collapse-item" href="{{route('supplier.index')}}"><i class="fas fa-hand-point-right"></i> Supplier List</a>
                <a class="collapse-item" href="{{route('supplier.create')}}"><i class="fas fa-hand-point-right"></i> Supplier Add</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
            aria-expanded="true" aria-controls="users">
            <i class="fas fa-users"></i>
            <span>User Panel</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('user.index')}}"><i class="fas fa-hand-point-right"></i> User List</a>
                <a class="collapse-item" href="{{route('user.create')}}"><i class="fas fa-hand-point-right"></i> User Add</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Settings</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>