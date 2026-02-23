@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Quản lý User</h3>
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        + Thêm User
    </a>
</div>

{{-- Thông báo thành công --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Thông báo lỗi --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th width="60">ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th width="120">Role</th>
                    <th width="180">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td class="text-center">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        @if($user->role == 'admin')
                            <span class="badge bg-danger">Admin</span>
                        @else
                            <span class="badge bg-secondary">Staff</span>
                        @endif
                    </td>
                    <td class="text-center">

                        {{-- Nút sửa --}}
                        <a href="{{ route('users.edit', $user->id) }}" 
                           class="btn btn-warning btn-sm">
                            Sửa
                        </a>

                        {{-- Không cho xoá chính mình --}}
                        @if($user->id != auth()->id())
                            <form action="{{ route('users.destroy', $user->id) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xoá user này?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Xóa
                                </button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>
                                Không thể xoá
                            </button>
                        @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Chưa có user nào trong hệ thống.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection