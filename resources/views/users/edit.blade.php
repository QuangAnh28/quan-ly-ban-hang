@extends('layouts.app')

@section('content')

<h2>Sửa User</h2>

<div class="form-container">
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <input type="text" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <input type="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <select name="role">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <div class="button-group">
            <button type="submit" class="btn-success">Cập nhật</button>
            <a href="{{ route('users.index') }}" class="btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

@endsection