<?php
// Database configuration
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "web_eng";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo 'no';
    die("Connection failed: " . $conn->connect_error);
} 
?>
