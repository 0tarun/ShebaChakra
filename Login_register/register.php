<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Check if the username or email already exists
    $check_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $username, $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Username or email already exists
        echo "<script>alert('An account with this username or email already exists.');</script>";
    } else {
        // Insert the new user
        $sql = "INSERT INTO users (name, username, email, phone, address, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $username, $email, $phone, $address, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!');</script>";
            header("Location: HomePage.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
            $stmt->close();
        }
        $check_stmt->close();
    }
    ?>