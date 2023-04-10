<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weatherdata";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the latest weather data from the database
$sql = "SELECT temperature, humidity, pressure, timestamp FROM nameofdatabase ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the weather data in a table
    echo "<table><tr><th>Temperature</th><th>Humidity</th><th>Pressure</th><th>Timestamp</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["temperature"]. "</td><td>" . $row["humidity"]. "</td><td>" . $row["pressure"]. "</td><td>" . $row["timestamp"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No weather data found.";
}

// Close the database connection
$conn->close();

?>
