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

  input, select {
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
  <h2>Thêm người dùng</h2>
  <form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label>Loại tài khoản</label>
    <input type="text" name="account_type" required>

    <label>Mã người dùng</label>
    <input type="text" name="user_id" required>

    <label>Tên người dùng</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Mật khẩu</label>
    <input type="password" name="password" required>

    <label>Địa chỉ</label>
    <input type="text" name="address">

    <label>Số điện thoại</label>
    <input type="text" name="phone">

    <label>Chức vụ</label>
    <input type="text" name="role">

    <button type="submit" class="btn-submit">Thêm người dùng</button>
  </form>
</div>
@endsection
