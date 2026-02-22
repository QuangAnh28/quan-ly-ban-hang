<h2>Sửa User</h2>

<form method="POST" action="{{ route('users.update', $user->id) }}">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $user->name }}"><br><br>
<input type="email" name="email" value="{{ $user->email }}"><br><br>

<select name="role">
    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
</select><br><br>

<button type="submit">Cập nhật</button>

</form>