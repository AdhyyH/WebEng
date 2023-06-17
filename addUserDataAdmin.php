<html>
<body>
    Information
    <?php 
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $status = isset($_POST["status"]) ? $_POST["status"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $ic = isset($_POST["ic"]) ? $_POST["ic"] : "";
        $phonenum = isset($_POST["phonenum"]) ? $_POST["phonenum"] : "";
        $honor = isset($_POST["honor"]) ? $_POST["honor"] : "";
        $work = isset($_POST["work"]) ? $_POST["work"] : "";
        $eduhist = isset($_POST["eduhist"]) ? $_POST["eduhist"] : "";
        $address = isset($_POST["address"]) ? $_POST["address"] : "";

        // Establish database connection
        $link = mysqli_connect("localhost", "root", "", "webengproject");

        // Check the connection
        if (mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Escape special characters to prevent SQL injection
        $id = mysqli_real_escape_string($link, $id);
        $status = mysqli_real_escape_string($link, $status);
        $name = mysqli_real_escape_string($link, $name);
        $ic = mysqli_real_escape_string($link, $ic);
        $phonenum = mysqli_real_escape_string($link, $phonenum);
        $honor = mysqli_real_escape_string($link, $honor);
        $work = mysqli_real_escape_string($link, $work);
        $eduhist = mysqli_real_escape_string($link, $eduhist);
        $address = mysqli_real_escape_string($link, $address);
        

        // Create the query string
        $query = "INSERT INTO userinfo (id, status, name, ic, phonenum, honor, work, eduhist, address) VALUES ('$id', '$status', '$name', '$ic', '$phonenum', '$honor', '$work', '$eduhist', '$address')";

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
        window.location.href = "addUserAdmin.php";
    </script>
</body>
</html>
