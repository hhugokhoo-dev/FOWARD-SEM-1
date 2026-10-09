<?php
session_start();
require_once __DIR__ . '/config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];


    // STEP 1: Query the database to find the user by email
    $stmt = $pdo->prepare('SELECT id, email, password, role FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // STEP 2: Verify the password using password_verify()
    if ($user && password_verify($password, $user['password'])) {

        // STEP 3: Store ONLY id, email, and role in $_SESSION['user']
        session_regenerate_id(true); // prevent session fixation
        $_SESSION['user'] = [
            'id'    => $user['id'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ];

        // STEP 4: Redirect to the dashboard
        header('Location: /rbac-exercise/dashboard.php');
        exit;

    } else {
        // STEP 5: If login failed, set an error message
        $error = 'Invalid email or password.';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login</h1>

    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="/rbac-exercise/login.php">
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <button type="submit">Log In</button>
    </form>

    <p><strong>Test accounts</strong> (password: <code>password</code>)</p>
    <ul>
        <li>user@example.com (role: user)</li>
        <li>editor@example.com (role: editor)</li>
        <li>admin@example.com (role: admin)</li>
    </ul>
</body>
</html>
