@extends('dashboard')

@section('content')
<style>
  body {
    background-color: #1c1c1e;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #f5e6f7;
  }
  .container {
    background-color: #2c2c2e;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 0 20px rgba(255, 192, 203, 0.1);
  }
  .title {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 30px;
    color: #ffb6c1;
  }
  .table {
    background-color: #3a3a3c;
    border-radius: 10px;
    overflow: hidden;
  }
  .table thead {
    background-color: #5c5470;
    color: #f5e6f7;
  }
  .table tbody tr {
    color: #f8e8f9;
  }
  .table tbody tr:hover {
    background-color: #4a4458;
  }
  .table th, .table td {
    vertical-align: middle !important;
  }
  .action-icons i {
    cursor: pointer;
    margin: 0 5px;
    font-size: 18px;
    transition: color 0.2s;
  }
  .action-icons i.fa-plus-circle {
    color: #b983ff;
  }
  .action-icons i.fa-edit {
    color: #ffb6c1;
  }
  .action-icons i.fa-trash-alt {
    color: #ff6b81;
  }
  .action-icons i:hover {
    color: #ffd6ec;
  }
  .btn-add {
    display: inline-block;
    margin-bottom: 20px;
    color: #fff;
    background-color: #b983ff;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.2s ease;
  }
  .btn-add:hover {
    background-color: #a66cff;
  }
</style>

<div class="container mt-5">
  <h2 class="title">Quản lí nhân viên</h2>
  <div class="mb-3 text-end">
    <a href="{{ route('users.UserCreate') }}" class="btn-add">
      <i class="fas fa-plus-circle me-1"></i> Thêm nhân viên
    </a>
  </div>
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>Loại tài khoản</th>
        <th>ID người dùng</th>
        <th>Tên người dùng</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Chức vụ</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->account_type }}</td>
        <td>{{ $user->user_id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->role }}</td>
        <td class="action-icons">
          <form action="{{ route('users.deleteUser', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn p-0 border-0 bg-transparent" onclick="return confirm('Bạn có chắc chắn muốn xoá?');" title="Xoá">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
          <a href="{{ route('users.deleteCategory', $user->id) }}" title="Sửa">
            <i class="fas fa-edit"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
