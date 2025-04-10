@extends('dashboard')

@section('content')
<style>
  body {
    background-color: #1c1c1e;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #f5e6f7;
  }

  .form-container {
    background-color: #2c2c2e;
    padding: 30px;
    border-radius: 15px;
    max-width: 700px;
    margin: 40px auto;
    box-shadow: 0 0 20px rgba(255, 192, 203, 0.1);
  }

  h2 {
    text-align: center;
    color: #ffb6c1;
    margin-bottom: 30px;
  }

  label {
    font-weight: bold;
    margin-top: 15px;
    display: block;
    color: #ffd6ec;
  }

  input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    background-color: #3a3a3c;
    color: #fff;
    border: 1px solid #555;
    border-radius: 8px;
  }

  .btn-submit {
    background-color: #b983ff;
    color: white;
    padding: 10px 20px;
    margin-top: 25px;
    border: none;
    border-radius: 10px;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.2s ease;
  }

  .btn-submit:hover {
    background-color: #a66cff;
  }
</style>

<div class="form-container">
  <h2>Chỉnh sửa người dùng</h2>
  <form action="{{ route('users.updateUser', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Loại tài khoản</label>
    <input type="text" name="account_type" value="{{ $user->account_type }}" required>

    <label>Mã người dùng</label>
    <input type="text" name="user_id" value="{{ $user->user_id }}" required>

    <label>Tên người dùng</label>
    <input type="text" name="name" value="{{ $user->name }}" required>

    <label>Email</label>
    <input type="email" name="email" value="{{ $user->email }}" required>

    <label>Địa chỉ</label>
    <input type="text" name="address" value="{{ $user->address }}">

    <label>Số điện thoại</label>
    <input type="text" name="phone" value="{{ $user->phone }}">

    <label>Chức vụ</label>
    <input type="text" name="role" value="{{ $user->role }}">

    <button type="submit" class="btn-submit">Cập nhật</button>
  </form>
</div>
@endsection
