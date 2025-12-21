<?php
/**
 * Authentication System
 * Simple session-based authentication for admin users
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Admin credentials (hardcoded for simplicity)
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin123'); // Change this to a secure password

/**
 * Authenticate user
 * @param string $username
 * @param string $password
 * @return bool
 */
function login($username, $password) {
    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $_SESSION['login_time'] = time();

        // Regenerate session ID for security
        session_regenerate_id(true);

        return true;
    }
    return false;
}

/**
 * Logout user
 */
function logout() {
    $_SESSION = [];

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    session_destroy();
}

/**
 * Check if user is authenticated
 * @return bool
 */
function isAuthenticated() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Require authentication (redirect if not logged in)
 * @param string $redirect_url URL to redirect to if not authenticated
 */
function requireAuth($redirect_url = '/fti/admin-login.php') {
    if (!isAuthenticated()) {
        header("Location: $redirect_url");
        exit;
    }

    // Check session timeout (30 minutes)
    $timeout = 1800;
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > $timeout) {
        logout();
        header("Location: $redirect_url?timeout=1");
        exit;
    }

    // Update last activity time
    $_SESSION['login_time'] = time();
}

/**
 * Get logged in username
 * @return string|null
 */
function getAdminUsername() {
    return $_SESSION['admin_username'] ?? null;
}
