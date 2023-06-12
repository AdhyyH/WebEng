<?php
// Assuming you have a database connection established

// Retrieve the id parameter from the GET request
$id = $_GET['id'];

// Perform the database query to fetch the data based on the id
// Replace this with your own database query logic
$query = "SELECT * FROM userinfo WHERE id = $id";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
  // Fetch the data as an associative array
  $data = mysqli_fetch_assoc($result);

  // Return the data as JSON
  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  // Handle the case where the query failed
  echo "Failed to fetch data from the database.";
}
?>
