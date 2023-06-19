<?php
// Database credentials
$host = 'localhost';
$db   = 'webengproject';
$user = 'root';
$pass = '';

// Establishing a database connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Function to check email validity
function checkEmailValidity($email)
{
    global $conn;

    // Prepare a SQL statement to retrieve user data from the database based on the provided email
    $stmt = $conn->prepare("SELECT * FROM login WHERE emailUser = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Email exists in the database, email is valid
        return true;
    }

    // Email does not exist in the database, email is not valid
    return false;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email from the form
    $email = $_POST['email'];

    // Perform the email verification process
    $isEmailValid = checkEmailValidity($email);

    // Display the appropriate message based on the email validity
    if ($isEmailValid) {
        // Proceed with further actions if the email is valid
        // ...
        header("Location: verifyEmail.php?valid=true");
        exit();
    } else {
        header("Location: verifyEmail.php?valid=false");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
