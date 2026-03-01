<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Quản lý bán hàng')</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <div class="app">

    <aside class="sidebar">
      <div class="brand">
        <div class="logo">🛒</div>
        <div>
          <div class="title">Quản Lý Bán Hàng</div>
          <div class="sub">Tạp hóa mini • Laravel</div>
        </div>
      </div>

      @php($role = auth()->check() ? (auth()->user()->role ?? null) : null)

      <div class="nav">
        <div class="nav-title">MENU</div>

        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <span class="icon">🏠</span>
          <span>Trang chủ</span>
        </a>

        @if($role === 'admin')
          <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
            <span class="icon">👤</span>
            <span>Quản lý nhân sự</span>
          </a>
        @endif

        <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
          <span class="icon">📦</span>
          <span>Sản phẩm</span>
        </a>

        <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
          <span class="icon">🏷️</span>
          <span>Loại sản phẩm</span>
        </a>

        <a href="{{ route('inventory.index') }}" class="{{ request()->routeIs('inventory.*') ? 'active' : '' }}">
          <span class="icon">📊</span>
          <span>Tồn kho</span>
        </a>
      </div>
    </aside>

    <main class="main">
      <div class="topbar">
        <div>
          <div class="breadcrumb">@yield('breadcrumb','Trang quản trị')</div>
          <div class="h1">@yield('page_title','Dashboard')</div>
        </div>

        <div class="actions">
          <div class="userbox">
            <div class="avatar"></div>
            <div class="userinfo">
              <div class="name">Xin chào, {{ auth()->user()->name ?? 'User' }}</div>
              <div class="role">{{ ucfirst(auth()->user()->role ?? '') }}</div>
            </div>
          </div>

          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-ghost" type="submit">Đăng xuất</button>
          </form>
        </div>
      </div>

      <div class="container">
        @yield('content')
      </div>
    </main>

  </div>
</body>
</html>