@extends('layouts.app')

@section('content')

<h2>Thêm User</h2>

<div class="form-container">
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="form-group">
            <input type="text" name="name" placeholder="Tên">
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Mật khẩu">
        </div>

        <div class="form-group">
            <select name="role">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
        </div>

        <div class="button-group">
            <button type="submit" class="btn-success">Lưu</button>
            <a href="{{ route('users.index') }}" class="btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

@endsection