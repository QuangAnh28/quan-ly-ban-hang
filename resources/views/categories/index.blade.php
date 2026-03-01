@extends('layouts.dashboard')

@section('title','Loại sản phẩm')
@section('breadcrumb','Quản trị / Loại sản phẩm')
@section('page_title','Loại sản phẩm')

@section('content')
@php($role = auth()->user()->role ?? null)

<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">Danh sách loại sản phẩm</h3>
      <p class="card-sub">Quản lý loại sản phẩm</p>
    </div>

    @if($role === 'admin')
      <a class="btn btn-primary" href="{{ route('categories.create') }}">+ Thêm loại</a>
    @endif
  </div>

  <div class="card-body">
    <div class="table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th style="width:90px">ID</th>
            <th>Tên</th>
            <th style="width:220px">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @forelse($categories as $c)
            <tr>
              <td>{{ $c->id }}</td>
              <td>{{ $c->name }}</td>
              <td>
                @if($role === 'admin')
                  <div class="t-actions">
                    <a class="btn btn-warning btn-sm" href="{{ route('categories.edit',$c->id) }}">Sửa</a>
                    <form method="POST" action="{{ route('categories.destroy',$c->id) }}" onsubmit="return confirm('Xóa loại này?')">
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
              <td colspan="3" style="text-align:center; padding:18px; color:#64748b;">
                Không có loại sản phẩm nào.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div style="margin-top:14px">
      {{ $categories->links() }}
    </div>
  </div>
</div>
@endsection