<?php
// Database credentials
$host = 'localhost';
$db   = 'webengProject';
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

    // Prepare a SQL statement to retrieve user data from the database based on the provided username
    $stmt = $conn->prepare("SELECT * FROM login WHERE loginID = ? AND loginPass = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User exists, verify the password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, redirect to mainAdmin.html
            header("Location: mainAdmin.html");
            exit();
        }
    }

    // Invalid username or password
    header("Location: index.php?error=true");
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
