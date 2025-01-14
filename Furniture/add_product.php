<!-- add_service.php -->
<?php
include 'db_connection.php';

// Insert service into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO services (service_name, description, price) VALUES ('$service_name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Service added successfully!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}
?>