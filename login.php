<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Query untuk mendapatkan data admin
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    // Verifikasi password (tanpa hash)
    if ($admin && $password === $admin['password']) {
        $_SESSION['admin'] = $admin['id'];
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #233488;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            width: calc(100% - 22px);
            /* Adjust width to account for padding and border */
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #333;
            color: #fff;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>

</html>