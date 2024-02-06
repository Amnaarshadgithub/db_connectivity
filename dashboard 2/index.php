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

// Retrieve data from the database
$sql = "SELECT * FROM health_data"; // Example query to fetch health data
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Access data fields and display them in your dashboard layout
        $calories_burnt = $row["calories_burnt"];
        $exercise_time = $row["exercise_time"];
        $sleep_time = $row["sleep_time"];
        // Add more data fields as needed

        // Display the data in your dashboard format
        echo "<h1>Dashboard</h1>";
        echo "<div>";
        echo "<h3>Calories Burnt</h3>";
        echo "<p>$calories_burnt kcal</p>";
        echo "</div>";
        echo "<div>";
        echo "<h3>Exercise Time</h3>";
        echo "<p>$exercise_time minutes</p>";
        echo "</div>";
        echo "<div>";
        echo "<h3>Sleep Time</h3>";
        echo "<p>$sleep_time hours</p>";
        echo "</div>";
        // Add more HTML structure to display additional data fields
        
    }
} else {
    echo "No data available";
}

$conn->close();
?>
