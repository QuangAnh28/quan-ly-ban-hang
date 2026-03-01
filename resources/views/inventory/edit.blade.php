@extends('layouts.dashboard')

@section('title','Điều chỉnh tồn kho')
@section('breadcrumb','Quản trị / Tồn kho')
@section('page_title','Điều chỉnh tồn kho')

@section('content')
<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">{{ $product->name }} ({{ $product->sku }})</h3>
      <p class="card-sub">Tồn hiện tại: <b>{{ $product->stock }} {{ $product->unit }}</b> • Ngưỡng: {{ $product->low_stock }}</p>
    </div>
    <a class="btn" href="{{ route('inventory.index') }}">Quay lại</a>
  </div>

  <div class="card-body">
    <form method="POST" action="{{ route('inventory.update', $product->id) }}" class="form">
      @csrf

      <input class="input" type="number" name="qty_change" value="{{ old('qty_change') }}" placeholder="Nhập số thay đổi (+10 hoặc -3)" required>

      <input class="input" name="note" value="{{ old('note') }}" placeholder="Ghi chú (VD: nhập thêm, hư hỏng, kiểm kê...)">

      <button class="btn btn-primary" type="submit">Xác nhận</button>
    </form>

    @if($errors->any())
      <div style="margin-top:12px; color:#b91c1c; font-weight:700">
        {{ $errors->first() }}
      </div>
    @endif

    <div style="height:14px"></div>

    <div class="card" style="box-shadow:none">
      <div class="card-header">
        <div>
          <h3 class="card-title">Lịch sử điều chỉnh (20 lần gần nhất)</h3>
          <p class="card-sub">Tăng là số dương, giảm là số âm</p>
        </div>
      </div>
      <div class="card-body">
        <div class="table-wrap">
          <table class="table">
            <thead>
              <tr>
                <th style="width:90px">ID</th>
                <th style="width:160px">Thời gian</th>
                <th style="width:140px">Thay đổi</th>
                <th>Ghi chú</th>
              </tr>
            </thead>
            <tbody>
              @forelse($logs as $log)
                <tr>
                  <td>{{ $log->id }}</td>
                  <td>{{ $log->created_at }}</td>
                  <td>
                    @if($log->qty_change > 0)
                      <span class="badge badge-staff">+{{ $log->qty_change }}</span>
                    @else
                      <span class="badge badge-admin">{{ $log->qty_change }}</span>
                    @endif
                  </td>
                  <td>{{ $log->note }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" style="text-align:center; padding:18px; color:#64748b;">
                    Chưa có lịch sử điều chỉnh.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection