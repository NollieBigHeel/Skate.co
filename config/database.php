<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'dan');
define('DB_PASS', '');
define('DB_NAME', 'skateco_db');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if($conn->connect_error) {
    die('Connection Failed '. $conn->connect_error);
}
