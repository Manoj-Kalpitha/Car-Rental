<?php
$serverName = "localhost:3307";  // Update to "localhost" if default port is used
$dbUsername = "root";
$dbPassword = "1234";
$dbName = "car_rental";

// Create connection
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Connected successfully";
}

// Your further code here

// Close connection when done
// mysqli_close($conn);
