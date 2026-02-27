@extends('layouts.dashboard')

@section('title','Sản phẩm')
@section('breadcrumb','Quản trị / Sản phẩm')
@section('page_title','Sản phẩm')

@section('content')
@php($role = auth()->user()->role ?? null)
<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">Danh sách sản phẩm</h3>
      <p class="card-sub">Quản lý sản phẩm, giá và tồn kho</p>
    </div>

    <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap">
      <form method="GET" action="{{ route('products.index') }}" style="display:flex; gap:8px; flex-wrap:wrap; align-items:center">
        <input class="input" style="width:220px" name="q" value="{{ $q ?? '' }}" placeholder="Tìm theo tên / SKU">

        <select class="input" style="width:220px" name="category">
          <option value="">-- Tất cả loại --</option>
          @foreach(($categories ?? []) as $c)
            <option value="{{ $c->id }}" {{ (string)($categoryId ?? '') === (string)$c->id ? 'selected' : '' }}>
              {{ $c->name }}
            </option>
          @endforeach
        </select>

        <button class="btn" type="submit">Tìm</button>
        <a class="btn" href="{{ route('products.index') }}">Reset</a>
      </form>

      @if($role === 'admin')
        <a class="btn btn-primary" href="{{ route('products.create') }}">+ Thêm sản phẩm</a>
      @endif
    </div>
  </div>

  <div class="card-body">
    <div class="table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th style="width:80px">ID</th>
            <th style="width:140px">SKU</th>
            <th>Tên</th>
            <th style="width:180px">Loại</th>
            <th style="width:140px">Giá bán</th>
            <th style="width:130px">Tồn</th>
            <th style="width:220px">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $p)
            <tr>
              <td>{{ $p->id }}</td>
              <td>{{ $p->sku }}</td>
              <td>{{ $p->name }}</td>
              <td>{{ $p->category?->name }}</td>
              <td>{{ number_format($p->price_sell, 0, ',', '.') }}</td>
              <td>{{ $p->stock }} {{ $p->unit }}</td>
              <td>
                @if($role === 'admin')
                  <div class="t-actions">
                    <a class="btn btn-warning btn-sm" href="{{ route('products.edit',$p->id) }}">Sửa</a>
                    <form method="POST" action="{{ route('products.destroy',$p->id) }}" onsubmit="return confirm('Xóa sản phẩm này?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit">Xóa</button>
                    </form>
                  </div>
                @else
                  <span style="color:#64748b">—</span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="text-align:center; padding:18px; color:#64748b;">
                Không có sản phẩm nào.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div style="margin-top:14px">
      {{ $products->links() }}
    </div>
  </div>
</div>
@endsection