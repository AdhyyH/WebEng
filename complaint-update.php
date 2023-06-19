<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $complaintID = $_POST['id'];
        $status = $_POST['status'];

        // Connect to the database
        $mysql = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

        // Select the database
        mysqli_select_db($mysql, "webengproject") or die(mysqli_error($mysql));

        // Update the status in the database
        $query = "UPDATE complaints SET status = '$status' WHERE id = $complaintID";
        $result = mysqli_query($mysql, $query);

        // Check if the update was successful
        if ($result) {
            echo "Status updated successfully.";
            // Redirect back to complaint-list-view.php
            header("Location: complaintLect-list-front.php");
            exit();

        } else {
            echo "Error updating status: " . mysqli_error($mysql);
        }

        // Close the database connection
        mysqli_close($mysql);
    } else {
        echo "Invalid parameters.";
    }
}
