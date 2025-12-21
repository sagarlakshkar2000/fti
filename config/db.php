<?php
/**
 * Database Connection Handler
 * PDO-based MySQL connection with error handling
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'fti_db');
define('DB_USER', 'root');
define('DB_PASS', ''); // XAMPP default (empty password)
define('DB_CHARSET', 'utf8mb4');

/**
 * Get database connection
 * @return PDO
 */
function getDB() {
    static $pdo = null;

    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // Log error and show user-friendly message
            error_log("Database Connection Error: " . $e->getMessage());
            die("Database connection failed. Please check your configuration.");
        }
    }

    return $pdo;
}

/**
 * Execute a query with parameters
 * @param string $query SQL query
 * @param array $params Query parameters
 * @return PDOStatement
 */
function executeQuery($query, $params = []) {
    try {
        $db = getDB();
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        error_log("Query Error: " . $e->getMessage() . " | Query: " . $query);
        throw new Exception("Database query failed.");
    }
}

/**
 * Fetch single row
 * @param string $query SQL query
 * @param array $params Query parameters
 * @return array|false
 */
function fetchOne($query, $params = []) {
    $stmt = executeQuery($query, $params);
    return $stmt->fetch();
}

/**
 * Fetch all rows
 * @param string $query SQL query
 * @param array $params Query parameters
 * @return array
 */
function fetchAll($query, $params = []) {
    $stmt = executeQuery($query, $params);
    return $stmt->fetchAll();
}

/**
 * Insert record and return last insert ID
 * @param string $query SQL query
 * @param array $params Query parameters
 * @return int Last insert ID
 */
function insertRecord($query, $params = []) {
    executeQuery($query, $params);
    return getDB()->lastInsertId();
}
