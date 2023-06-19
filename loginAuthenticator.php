<?php
// Database credentials
$host = 'localhost';
$db = 'webengProject';
$user = 'root';
$pass = '';

// Establishing a database connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Function to handle login attempts
function handleLoginAttempt($username, $password)
{
    global $conn;

    // Check if the username or password is blank
    if ($username === '' || $password === '') {
        // Redirect back to index.php with the error parameter
        header("Location: index.php?error=blank");
        exit();
    }

    // Prepare a SQL statement to retrieve user data from the database based on the provided username
    $stmt = $conn->prepare("SELECT * FROM login WHERE loginID = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User exists, verify the password
        $user = $result->fetch_assoc();
        if ($password === $user['loginPass']) {
            // Password is correct, redirect to the appropriate page based on the ID prefix
            $idPrefix = substr($user['loginID'], 0, 1);
            if ($idPrefix === 'L') {
                header("Location: complaintLect-list-front.php");
                exit();
            } elseif ($idPrefix === 'M') {
                header("Location: ManageAccount.php");
                exit();
            } elseif ($idPrefix === 'S') {
                header("Location: MainAdmin.php");
                exit();
            }
        }
    }

    // Invalid username or password
    header("Location: index.php?error=wrong");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Call the function to handle the login attempt
    handleLoginAttempt($username, $password);
}

// Close the database connection
$conn->close();
?>