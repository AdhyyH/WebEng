<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webengproject";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the ID of the record to delete
    $ExpertId = $_POST['ExpertID'];

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM expertt WHERE ExpertID = ?");
    $stmt->bind_param("s", $ExpertId);

    // Execute the delete statement
    if ($stmt->execute()) {
        echo "<script>alert('Data deleted successfully.'); window.location.href = 'mainAdmin.php';</script>";
    } else {
        echo "<script>alert('Error deleting data: " . $stmt->error . "');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
