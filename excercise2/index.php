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
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_time = sanitizeInput($_POST["start_time"]);
    $end_time = sanitizeInput($_POST["end_time"]);
    $duration = sanitizeInput($_POST["duration"]);

    // Insert exercise data into the database
    $sql = "INSERT INTO exercise_data (start_time, end_time, duration) VALUES ('$start_time', '$end_time', '$duration')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

