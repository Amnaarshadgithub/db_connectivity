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
    $time = sanitizeInput($_POST["time"]);
    $carbohydrates = sanitizeInput($_POST["carbohydrates"]);
    $protein = sanitizeInput($_POST["protein"]);
    $calories = sanitizeInput($_POST["calories"]);

    // Insert meal data into the database
    $sql = "INSERT INTO meal_data (time, carbohydrates, protein, calories) VALUES ('$time', '$carbohydrates', '$protein', '$calories')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
