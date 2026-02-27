@extends('layouts.dashboard')
@section('title','Sửa sản phẩm')
@section('breadcrumb','Quản trị / Sản phẩm')
@section('page_title','Sửa sản phẩm')

@section('content')
<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">Sửa sản phẩm</h3>
      <p class="card-sub">Cập nhật thông tin sản phẩm</p>
    </div>
    <a class="btn" href="{{ route('products.index') }}">Quay lại</a>
  </div>

  <div class="card-body">
    <form method="POST" action="{{ route('products.update',$product->id) }}" class="form">
      @csrf
      @method('PUT')

      <select class="input" name="category_id" required>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
            {{ $c->name }}
          </option>
        @endforeach
      </select>

      <input class="input" name="sku" value="{{ $product->sku }}" required>
      <input class="input" name="name" value="{{ $product->name }}" required>
      <input class="input" name="unit" value="{{ $product->unit }}" required>

      <input class="input" type="number" name="price_buy" value="{{ $product->price_buy }}" min="0" required>
      <input class="input" type="number" name="price_sell" value="{{ $product->price_sell }}" min="0" required>

      <input class="input" type="number" name="stock" value="{{ $product->stock }}" min="0" required>
      <input class="input" type="number" name="low_stock" value="{{ $product->low_stock }}" min="0" required>

      <label style="display:flex; align-items:center; gap:8px; font-weight:700; color:#475569">
        <input type="checkbox" name="is_active" {{ $product->is_active ? 'checked' : '' }}>
        Đang bán
      </label>

      <button class="btn btn-primary" type="submit">Cập nhật</button>
    </form>
  </div>
</div>
@endsection