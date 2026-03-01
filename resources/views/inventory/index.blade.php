@extends('layouts.dashboard')

@section('title','Tồn kho')
@section('breadcrumb','Quản trị / Tồn kho')
@section('page_title','Tồn kho')

@section('content')
@php($role = auth()->user()->role ?? null)

<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">Danh sách tồn kho</h3>
      <p class="card-sub">Tìm kiếm, lọc loại và kiểm tra sắp hết</p>
    </div>

    <form method="GET" action="{{ route('inventory.index') }}" style="display:flex; gap:8px; flex-wrap:wrap; align-items:center">
      <input class="input" style="width:220px" name="q" value="{{ $q ?? '' }}" placeholder="Tìm theo tên / SKU">

      <select class="input" style="width:220px" name="category">
        <option value="">-- Tất cả loại --</option>
        @foreach(($categories ?? []) as $c)
          <option value="{{ $c->id }}" {{ (string)($categoryId ?? '') === (string)$c->id ? 'selected' : '' }}>
            {{ $c->name }}
          </option>
        @endforeach
      </select>

      <label style="display:flex; gap:8px; align-items:center; font-weight:700; color:#475569">
        <input type="checkbox" name="low" value="1" {{ ($low ?? false) ? 'checked' : '' }}>
        Sắp hết
      </label>

      <button class="btn" type="submit">Tìm</button>
      <a class="btn" href="{{ route('inventory.index') }}">Reset</a>
    </form>
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
            <th style="width:180px">Tồn / Ngưỡng</th>
            <th style="width:160px">Trạng thái</th>
            <th style="width:160px">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $p)
            <tr>
              <td>{{ $p->id }}</td>
              <td>{{ $p->sku }}</td>
              <td>{{ $p->name }}</td>
              <td>{{ $p->category?->name }}</td>
              <td>{{ $p->stock }} {{ $p->unit }} / {{ $p->low_stock }}</td>
              <td>
                @if($p->stock <= 0)
                  <span class="badge badge-admin">Hết hàng</span>
                @elseif($p->stock <= $p->low_stock)
                  <span class="badge badge-admin">Sắp hết</span>
                @else
                  <span class="badge badge-staff">Bình thường</span>
                @endif
              </td>
              <td>
                @if($role === 'admin')
                  <a class="btn btn-primary btn-sm" href="{{ route('inventory.edit', $p->id) }}">Điều chỉnh</a>
                @else
                  <span style="color:#64748b">—</span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="text-align:center; padding:18px; color:#64748b;">
                Không có dữ liệu.
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