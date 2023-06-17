<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webengproject";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $id = $_POST["id"];
    $name = $_POST["name"];
    $ic = $_POST["ic"];
    $phonenum = $_POST["phonenum"];
    $honor = $_POST["honor"];
    $work = $_POST["work"];
    $eduhist = $_POST["eduhist"];
    $address = $_POST["address"];

    // Validate the ID
    if (!empty($id)) {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the query to update the data
        $stmt = $conn->prepare("UPDATE userinfo SET name=?, ic=?, phonenum=?, honor=?, work=?, eduhist=?, address=? WHERE id=?");
        $stmt->bind_param("ssssssss", $name, $ic, $phonenum, $honor, $work, $eduhist, $address, $id);
        
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
