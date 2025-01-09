<?php
// Database connection
$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'ShebaChakra';

$conn = new mysqli($host, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
