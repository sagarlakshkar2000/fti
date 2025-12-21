<?php

/**
 * Admin Logout
 */
require_once __DIR__ . '/config/auth.php';
require_once __DIR__ . '/config/config.php';

logout();

header('Location: ' . BASE_URL . '/admin-login.php');
exit;
