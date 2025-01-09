<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            // Redirect to HomePage.html
            header("Location: HomePage.html");
            exit();
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // User does not exist
        echo "Invalid username or password.";
    }
}
