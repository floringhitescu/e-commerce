<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"  crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex ">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Beauty Pro</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->

    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="userDropdown">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="login.html">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Main</div>
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>Dashboard</a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link" href="{{ route('admin.users.index') }}"  >
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        Users
                    </a>
                    <a class="nav-link" href="{{ route('admin.products.index') }}"  >
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-columns"></i>
                        </div>
                        Products
                    </a>
                    <a class="nav-link" href="{{ route('admin.posts.index') }}"  >
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        Posts
                    </a>
                    <a class="nav-link" href="{{ route('admin.orders.index') }}"  >
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-store-alt"></i>
                        </div>
                        Orders
                    </a>
                    <a class="nav-link" href="{{ route('admin.categories.index') }}"  >
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        Categories
                    </a>
                    <a class="nav-link" href="{{ route('admin.roles.index') }}"  >
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        Roles
                    </a>

                    <div class="sb-sidenav-menu-heading">Features</div>
                    <a class="nav-link" onclick="alert('Coming soon stay tuned!')">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>Charts
                    </a>
                </div>
            </div>

        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-end small">
                    <div class="text-muted">Copyright &copy; QA 2020</div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/admin/admin.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/admin/table.js') }}"></script>
</body>
</html>
