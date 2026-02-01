<?php

/**
 * Admin Login Page
 */
require_once __DIR__ . '/config/auth.php';
require_once __DIR__ . '/config/config.php';

// Check if already logged in
if (isAuthenticated()) {
    header('Location: ' . BASE_URL . '/admin/manage-posts.php');
    exit;
}

// Handle login form submission
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login($username, $password)) {
        header('Location: ' . BASE_URL . '/admin/manage-posts.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}

// Check for timeout message
if (isset($_GET['timeout'])) {
    $error = 'Session expired. Please login again.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FTI Travel</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #d44712 0%, #fa7d1a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .input-field:focus {
            border-color: #fa7d1a;
            outline: none;
            box-shadow: 0 0 0 3px rgba(250, 125, 26, 0.1);
        }

        .btn-login {
            background: linear-gradient(135deg, #d44712 0%, #fa7d1a 100%);
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 71, 18, 0.3);
        }
    </style>
</head>

<body>
    <div class="login-card w-full max-w-md mx-4 rounded-2xl p-8">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-orange-500 to-orange-600 mb-4">
                <i class="fas fa-user-shield text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Admin Login</h1>
            <p class="text-gray-600 mt-2">Famous Tours India</p>
        </div>

        <!-- Error Message -->
        <?php if (!empty($error)): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <p><?= htmlspecialchars($error) ?></p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="">
            <div class="mb-6">
                <label for="username" class="block text-gray-700 font-medium mb-2">
                    <i class="fas fa-user mr-2"></i>Username
                </label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    required
                    autocomplete="username"
                    class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 transition"
                    placeholder="Enter your username">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">
                    <i class="fas fa-lock mr-2"></i>Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 transition"
                    placeholder="Enter your password">
            </div>

            <button
                type="submit"
                class="btn-login w-full py-3 text-white font-semibold rounded-lg shadow-lg">
                <i class="fas fa-sign-in-alt mr-2"></i>Login
            </button>
        </form>

        <!-- Info -->
        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Default credentials: <strong>admin / admin123</strong></p>
        </div>
    </div>
</body>

</html>
