@extends('layouts.dashboard')
@section('title','Thêm loại sản phẩm')
@section('breadcrumb','Quản trị / Loại sản phẩm')
@section('page_title','Thêm loại sản phẩm')

@section('content')
<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">Thêm loại sản phẩm</h3>
      <p class="card-sub">Nhập tên loại</p>
    </div>
    <a class="btn" href="{{ route('categories.index') }}">Quay lại</a>
  </div>

  <div class="card-body">
    <form method="POST" action="{{ route('categories.store') }}" class="form">
      @csrf
      <input class="input" name="name" placeholder="Tên loại sản phẩm" required>
      <button class="btn btn-primary" type="submit">Lưu</button>
    </form>
  </div>
</div>
@endsection