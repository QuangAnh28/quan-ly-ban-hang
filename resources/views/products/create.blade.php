@extends('layouts.dashboard')
@section('title','Thêm sản phẩm')
@section('breadcrumb','Quản trị / Sản phẩm')
@section('page_title','Thêm sản phẩm')

@section('content')
<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">Thêm sản phẩm</h3>
      <p class="card-sub">Nhập thông tin sản phẩm</p>
    </div>
    <a class="btn" href="{{ route('products.index') }}">Quay lại</a>
  </div>

  <div class="card-body">
    <form method="POST" action="{{ route('products.store') }}" class="form">
      @csrf

      <select class="input" name="category_id" required>
        <option value="">-- Chọn loại sản phẩm --</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
      </select>

      <input class="input" name="sku" placeholder="SKU (VD: MIH0001)" required>
      <input class="input" name="name" placeholder="Tên sản phẩm" required>
      <input class="input" name="unit" placeholder="Đơn vị (VD: chai, gói, kg)" value="cái" required>

      <input class="input" type="number" name="price_buy" placeholder="Giá nhập" min="0" required>
      <input class="input" type="number" name="price_sell" placeholder="Giá bán" min="0" required>

      <input class="input" type="number" name="stock" placeholder="Tồn kho ban đầu" min="0" value="0" required>
      <input class="input" type="number" name="low_stock" placeholder="Ngưỡng sắp hết" min="0" value="5" required>

      <label style="display:flex; align-items:center; gap:8px; font-weight:700; color:#475569">
        <input type="checkbox" name="is_active" checked>
        Đang bán
      </label>

      <button class="btn btn-primary" type="submit">Lưu</button>
    </form>
  </div>
</div>
@endsection