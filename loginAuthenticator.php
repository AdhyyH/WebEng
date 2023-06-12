<?php

    // Establish the database connection
    $link = mysqli_connect("localhost", "root", "", "webengproject");

    // Check the connection
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the entered username and password from the login form
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    // Prepare and execute a SQL query to check the user's credentials
    $stmt = $link->prepare("SELECT id, name FROM user_login WHERE user_name = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    // Check if the query returned any rows (i.e., the username and password matched)
    if ($stmt->num_rows > 0) {
        // Start the session and store the user's ID and name
        session_start();
        $stmt->bind_result($id, $name);
        $stmt->fetch();
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;

        // Redirect the user to the welcome page
        header("Location: welcomeAdmin.html");
        exit();
    } else {
        // Invalid username and password
        $error = "Invalid username and password";
        header("Location: index.php?error=" . urlencode($error));
    }

    // Close the database connection
    $stmt->close();
    $link->close();
?>

