<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health tracker";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity_per_time = sanitizeInput($_POST["quantity_per_time"]);
    $frequency = sanitizeInput($_POST["frequency"]);

    // Calculate total water intake
    $total_water_intake = $quantity_per_time * $frequency;

    // Insert water intake data into the database
    $sql = "INSERT INTO water_intake_data (quantity_per_time, frequency, total_water_intake) VALUES ('$quantity_per_time', '$frequency', '$total_water_intake')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
