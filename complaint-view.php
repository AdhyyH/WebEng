<?php include('complaint-header.php'); ?>

<style>
    .complaint-details {
        background-color: #f8f9fc;
        padding: 20px;
        border-radius: 5px;
    }

    .complaint-details h2 {
        color: #333;
    }

    .complaint-details p strong {
        font-weight: bold;
    }

    .complaint-details p {
        margin-bottom: 10px;
    }
</style>

<?php
// Check if the complaint ID is provided in the query parameters
if (isset($_GET['id'])) {
    $complaintID = $_GET['id'];

    // Connect to MySQL server
    $mysql = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

    // Select the database named "fkedusearch"
    mysqli_select_db($mysql, "fkedusearch") or die(mysqli_error($mysql));

    // Query to fetch the complaint details
    $query = "SELECT * FROM complaints WHERE id = $complaintID";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the complaint details
        $row = mysqli_fetch_assoc($result);
        $type = $row['type'];
        $description = $row['description'];
        $answerID = $row['answer_id']; // Added: Fetch answer ID
        $createdAt = $row['created_at']; // Added: Fetch created at
        $status = $row['status']; // Added: Fetch status

        // Display the complaint details
        echo "<div class='complaint-details'>";
        echo "<h2>Complaint Details</h2>";
        echo "<p><strong>Complaint ID:</strong> $complaintID</p>"; // Added: Display complaint ID
        echo "<p><strong>Type:</strong> $type</p>";
        echo "<p><strong>Description:</strong> $description</p>";
        echo "<p><strong>Answer ID:</strong> $answerID</p>"; // Added: Display answer ID
        echo "<p><strong>Created At:</strong> $createdAt</p>"; // Added: Display created at
        echo "<p><strong>Status:</strong> $status</p>"; // Added: Display status
        // Display other relevant details
        // ...
        echo "</div>";

    } else {
        echo "<p>No complaint found with ID: $complaintID</p>";
    }

    // Close the database connection
    mysqli_close($mysql);
} else {
    echo "<p>No complaint ID provided.</p>";
}
?>

<button onclick="goBack()" class="btn btn-primary">Back</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<?php include('complaint-footer.php'); ?>
