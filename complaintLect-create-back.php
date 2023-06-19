<?php
require_once 'inc_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['answer_id']) && isset($_POST['type']) && isset($_POST['description'])) {
        $answer_id = $_POST['answer_id'];
        $type = $_POST['type'];
        $description = $_POST['description'];

        // Connect to the database
        $mysql = mysqli_connect("localhost", "root", "", "fkedusearch") or die(mysqli_connect_error());

        $answer_id = mysqli_real_escape_string($mysql, $answer_id);
        $type = mysqli_real_escape_string($mysql, $type);
        $description = mysqli_real_escape_string($mysql, $description);

        $query = "INSERT INTO complaints (answer_id, type, description, created_at, status) 
                  VALUES ('$answer_id', '$type', '$description', NOW(), 'investigation')";
        $result = mysqli_query($mysql, $query);

        if ($result) {
            // Data inserted successfully
            echo "Data saved successfully.";
        } else {
            // Error occurred
            echo "Error: " . mysqli_error($mysql);
        }

        // Close the database connection
        mysqli_close($mysql);
    }
}

header("Location: complaintLect-create.php");
exit();
?>
