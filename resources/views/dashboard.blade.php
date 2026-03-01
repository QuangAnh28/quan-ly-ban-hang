@extends('layouts.dashboard')

@section('title','Dashboard')
@section('breadcrumb','Trang quản trị')
@section('page_title','Dashboard')

@section('content')

<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">🎉 Đăng nhập thành công</h3>
      <p class="card-sub">Chào mừng bạn đến hệ thống quản lý bán hàng.</p>
    </div>
  </div>
  <div class="card-body">
    <p class="small-muted">
      Đây là trang tổng quan hệ thống. Sau này bạn có thể thêm:
    </p>
    <ul style="margin-top:10px; padding-left:18px;">
      <li>• Thống kê doanh thu hôm nay</li>
      <li>• Số sản phẩm còn hàng</li>
      <li>• Đơn hàng gần đây</li>
    </ul>
  </div>
</div>

@endsection