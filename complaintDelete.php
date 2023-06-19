<?php include('complaint-header.php'); ?>
<?php
// Retrieve complaint information from POST parameters
$complaintID = $_POST['complaintID'];
$answerID = $_POST['answerID'];
$questionID = $_POST['questionID'];
$type = $_POST['type'];
$description = $_POST['description'];
$createdAt = $_POST['created_at'];
$status = $_POST['status'];

// Connect to MySQL server
$mysql = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

// Select the database named "fkedusearch"
mysqli_select_db($mysql, "webengproject") or die(mysqli_error($mysql));

// Construct the delete query
$deleteQuery = "DELETE FROM complaints WHERE id = '$complaintID'";

// Execute the delete query
if (mysqli_query($mysql, $deleteQuery)) {
    // Deletion successful
    echo "Complaint deleted successfully.";
} else {
    // Deletion failed
    echo "Error deleting complaint: " . mysqli_error($mysql);
}

// Close the database connection
mysqli_close($mysql);
?>
<?php include('complaint-footer.php'); ?>