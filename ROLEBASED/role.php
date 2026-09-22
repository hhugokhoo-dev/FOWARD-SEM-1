<?php
session_start();

// 假设这是登录逻辑，查出匹配的用户
$stmt = $pdo->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        'id'    => $user['id'],
        'email' => $user['email'],
        'role'  => $user['role'],
    ];
    header('Location: /home.php');
    exit;
}