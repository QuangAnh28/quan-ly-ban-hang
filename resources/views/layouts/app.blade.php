<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Bán Hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout-btn {
            padding: 6px 12px;
            border: none;
            background: white;
            color: #007bff;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        /* ===== LAYOUT ===== */
        .container {
            display: flex;
            min-height: calc(100vh - 60px);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 220px;
            background-color: #343a40;
            padding: 20px;
        }

        .sidebar h4 {
            color: white;
            margin-bottom: 15px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        /* ===== CONTENT ===== */
        .content {
            flex: 1;
            padding: 25px;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* ===== FORM ===== */
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-group input,
        .form-group select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* ===== BUTTONS ===== */
        .btn-primary,
        .btn-success,
        .btn-warning,
        .btn-danger,
        .btn-secondary,
        .btn-disabled {
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            color: white;
        }

        .btn-primary { background: #007bff; }
        .btn-success { background: #28a745; }
        .btn-warning { background: #ffc107; color: black; }
        .btn-danger { background: #dc3545; }
        .btn-secondary { background: #6c757d; }
        .btn-disabled { background: #999; cursor: not-allowed; }

        .button-group {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        /* ===== ALERT ===== */
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        /* ===== TABLE ===== */
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background: #343a40;
            color: white;
        }

        .center {
            text-align: center;
        }

        .badge-danger {
            background: #dc3545;
            padding: 4px 8px;
            border-radius: 5px;
            color: white;
        }

        .badge-secondary {
            background: #6c757d;
            padding: 4px 8px;
            border-radius: 5px;
            color: white;
        }

        /* ===== DASHBOARD ===== */
        .dashboard-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="navbar">
    <h3>🛒 Quản Lý Bán Hàng</h3>
    <div class="navbar-right">
        <span>Xin chào, {{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Đăng xuất</button>
        </form>
    </div>
</div>

<div class="container">
    <div class="sidebar">
        <h4>MENU</h4>
        <a href="/dashboard">Dashboard</a>
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('users.index') }}">Quản lý User</a>
        @endif
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>