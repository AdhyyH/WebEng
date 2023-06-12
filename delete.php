<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webengproject";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the ID of the record to delete
    $id = $_POST['id'];

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM userinfo WHERE id = ?");
    $stmt->bind_param("s", $id);

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
