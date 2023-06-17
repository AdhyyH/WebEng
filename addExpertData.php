<html>
<body>
    Information
    <?php 
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $qualification = isset($_POST["qualification"]) ? $_POST["qualification"] : "";

        // Establish database connection
        $link = mysqli_connect("localhost", "root", "", "fkedusearch");

        // Check the connection
        if (mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Escape special characters to prevent SQL injection
        $name = mysqli_real_escape_string($link, $name);
        $qualification = mysqli_real_escape_string($link, $qualification);        

        // Create the query string
        $query = "INSERT INTO userinfo (name, qualification) VALUES ('$name', '$qualification')";

        // Run the query
        if (mysqli_query($link, $query)) {
            // Display a popup message using JavaScript
            echo '<script>alert("The data has already been submitted");</script>';
        } else {
            die("Insert failed: " . mysqli_error($link));
        }
        // Close the database connection
        mysqli_close($link);
    ?>
    <script>
        // Redirect to welcomeUser.php after displaying the popup
        window.location.href = "addExpert.php";
    </script>
</body>
</html>
