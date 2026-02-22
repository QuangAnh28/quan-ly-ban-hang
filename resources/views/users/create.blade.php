@extends('layouts.app')

@section('content')

<h3>Thêm User</h3>

<div class="card shadow">
    <div class="card-body">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-3">
                <label>Tên</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <button class="btn btn-success">Lưu</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>

@endsection