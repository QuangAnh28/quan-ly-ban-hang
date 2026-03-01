@extends('layouts.dashboard')

@section('title','Quản lý User')
@section('breadcrumb','Quản trị / User')
@section('page_title','Quản lý User')

@section('content')
  <div class="card">
    <div class="card-header">
      <div>
        <h3 class="card-title">Danh sách người dùng</h3>
        <p class="card-sub">Quản lý tài khoản và phân quyền</p>
      </div>
      <a href="{{ route('users.create') }}" class="btn btn-primary">+ Thêm User</a>
    </div>

    <div class="card-body">
      <div class="table-wrap">
        <table class="table">
          <thead>
            <tr>
              <th style="width:90px">ID</th>
              <th>Tên</th>
              <th>Email</th>
              <th style="width:160px">Role</th>
              <th style="width:220px">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $u)
              <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                  @if($u->role === 'Admin')
                    <span class="badge badge-admin">Admin</span>
                  @else
                    <span class="badge badge-staff">Staff</span>
                  @endif
                </td>
                <td>
                  <div class="t-actions">
                    <a class="btn btn-warning btn-sm" href="{{ route('users.edit',$u->id) }}">Sửa</a>

                    @if($u->role === 'Admin')
                      <button class="btn btn-sm" disabled style="opacity:.55;cursor:not-allowed">Không thể xoá</button>
                    @else
                      <form action="{{ route('users.destroy',$u->id) }}" method="POST" onsubmit="return confirm('Xoá user này?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Xoá</button>
                      </form>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection