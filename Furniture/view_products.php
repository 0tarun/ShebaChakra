<!-- user_view.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Services</title>
</head>

<body>
    <h1>Services for Purchase</h1>
    <div>
        <?php
        include 'db_connection.php';

        // Retrieve services from the database
        $sql = "SELECT * FROM services";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div style='border: 1px solid #000; margin: 10px; padding: 10px;'>";
                echo "<h2>" . $row['service_name'] . "</h2>";
                echo "<p>Description: " . $row['description'] . "</p>";
                echo "<p>Price: $" . $row['price'] . "</p>";
                echo "<button>Buy Now</button>";
                echo "</div>";
            }
        } else {
            echo "<p>No services available.</p>";
        }

        ?>
    </div>
</body>

</html>