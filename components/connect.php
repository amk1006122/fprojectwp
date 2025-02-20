<?php
// Database Connection


$db_host = 'localhost';
$db_name = 'homedecor_db';  // Make sure this name is correct!
$db_user = 'root';  // Default XAMPP username
$db_pass = '';  // Default XAMPP password is empty

try {
    // Correct DSN format
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

    // Create a PDO instance
    $conn = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enable error reporting
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Fetch as associative array
    ]);

    // Debugging: Remove this after testing
    //echo "✅ Database Connected Successfully!"; 

} catch (PDOException $e) {
    die("❌ Database Connection Failed: " . $e->getMessage());
}
?>


