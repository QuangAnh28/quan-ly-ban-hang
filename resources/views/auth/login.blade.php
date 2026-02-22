<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập | Quản Lý Bán Hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: Arial;
        }

        .login-box {
            background: white;
            padding: 40px;
            width: 400px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #667eea;
            color: white;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h2>🛒 Quản Lý Bán Hàng</h2>

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Nhập email" required>
        <input type="password" name="password" placeholder="Nhập mật khẩu" required>
        <button type="submit">Đăng nhập</button>
    </form>

</div>

</body>
</html>