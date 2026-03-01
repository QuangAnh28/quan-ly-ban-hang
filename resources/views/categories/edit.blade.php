    @extends('layouts.dashboard')
@section('title','Sửa loại sản phẩm')
@section('breadcrumb','Quản trị / Loại sản phẩm')
@section('page_title','Sửa loại sản phẩm')

@section('content')
<div class="card">
  <div class="card-header">
    <div>
      <h3 class="card-title">Sửa loại sản phẩm</h3>
      <p class="card-sub">Cập nhật tên loại</p>
    </div>
    <a class="btn" href="{{ route('categories.index') }}">Quay lại</a>
  </div>

  <div class="card-body">
    <form method="POST" action="{{ route('categories.update',$category->id) }}" class="form">
      @csrf
      @method('PUT')
      <input class="input" name="name" value="{{ $category->name }}" required>
      <button class="btn btn-primary" type="submit">Cập nhật</button>
    </form>
  </div>
</div>
@endsection