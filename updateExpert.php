<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webengproject";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $name = $_POST["name"];
    $honor = $_POST["qualification"];

    // Validate the ID
    if (!empty($id)) {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the query to update the data
        $stmt = $conn->prepare("UPDATE expertt SET name=?, qualification=?, WHERE ExperttID=?");
        $stmt->bind_param("ssssssss", $name, $qualification);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data updated successfully.'); window.location.href = 'mainAdmin.php';</script>";
        } else {
            echo "<script>alert('Error updating data: " . $stmt->error . "');</script>";
        }

        // Close the prepared statement
        $stmt->close();

        // Close the connection
        $conn->close();
    } else {
        echo "<script>alert('Invalid ID.');</script>";
    }
}
?>
