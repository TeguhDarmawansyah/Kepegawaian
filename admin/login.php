<?php
session_start();
include('../config/koneksi.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kepegawaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border: 2px solid #007bff;
        }
        .login-header {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-login:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .input-group-text {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h3>Sistem Kepegawaian</h3>
        </div>
        <form action="../proses/login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
    </div>
</body>
</html>