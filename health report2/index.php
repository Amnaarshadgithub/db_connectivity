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

// Retrieve health data from the database
$sql = "SELECT * FROM health_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $water_intake = $row["water_intake"];
        $sleep_duration = $row["sleep_duration"];
        $exercise_duration = $row["exercise_duration"];
        $calories_burned = $row["calories_burned"];
        $calories_gained = $row["calories_gained"];
    }
} else {
    echo "No health data available.";
}

$conn->close();
?>

