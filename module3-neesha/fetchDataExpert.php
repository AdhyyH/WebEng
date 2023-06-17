<?php
// Assuming you are using MySQL as your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedusearch";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the data from the database
$sql = "SELECT ExpertID, name, status FROM expert";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
