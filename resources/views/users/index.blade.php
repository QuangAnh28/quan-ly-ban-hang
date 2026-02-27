@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>Quản lý User</h2>
    <a href="{{ route('users.create') }}" class="btn-primary">+ Thêm User</a>
</div>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert-danger">{{ session('error') }}</div>
@endif

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Role</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="center">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="center">
                    @if($user->role == 'admin')
                        <span class="badge-danger">Admin</span>
                    @else
                        <span class="badge-secondary">Staff</span>
                    @endif
                </td>
                <td class="center">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn-warning">Sửa</a>

                    @if($user->id != auth()->id())
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">Xóa</button>
                        </form>
                    @else
                        <button class="btn-disabled" disabled>Không thể xoá</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection