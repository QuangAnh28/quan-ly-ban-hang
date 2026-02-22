<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Bán Hàng</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">🛒 Quản Lý Bán Hàng</a>

        <div class="d-flex text-white">
            Xin chào, {{ auth()->user()->name }}
            <form action="{{ route('logout') }}" method="POST" class="ms-3">
                @csrf
                <button class="btn btn-light btn-sm">Đăng xuất</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-3">
            <h5 class="text-white">MENU</h5>

            <a href="/dashboard">Dashboard</a>

            @if(auth()->user()->role == 'admin')
                <a href="{{ route('users.index') }}">Quản lý User</a>
            @endif
        </div>

        <!-- CONTENT -->
        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>