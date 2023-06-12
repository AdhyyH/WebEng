
        <?php 
            $name = isset($_GET["name"]) ? $_GET["name"] : "";
            $ic = isset($_GET["ic"]) ? $_GET["ic"] : "";
            $phonenum = isset($_GET["phonenum"]) ? $_GET["phonenum"] : "";
            $honor = isset($_GET["honor"]) ? $_GET["honor"] : "";
            $work = isset($_GET["work"]) ? $_GET["work"] : "";
            $eduhist = isset($_GET["eduhist"]) ? $_GET["eduhist"] : "";
            $address = isset($_GET["address"]) ? $_GET["address"] : "";
            $id = isset($_GET["id"]) ? $_GET["id"] : "";
            $status = isset($_GET["status"]) ? $_GET["status"] : "";

            // Establish database connection
            $link = mysqli_connect("localhost", "root", "", "webengproject");

            // Check the connection
            if (mysqli_connect_errno()) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Escape special characters to prevent SQL injection
            $name = mysqli_real_escape_string($link, $name);
            $ic = mysqli_real_escape_string($link, $ic);
            $phonenum = mysqli_real_escape_string($link, $phonenum);
            $honor = mysqli_real_escape_string($link, $honor);
            $work = mysqli_real_escape_string($link, $work);
            $eduhist = mysqli_real_escape_string($link, $eduhist);
            $address = mysqli_real_escape_string($link, $address);
            $id = mysqli_real_escape_string($link, $id);
            $status = mysqli_real_escape_string($link, $status);

            // Create the query string
            $query = "INSERT INTO userinfo (name, ic, phonenum, honor, work, eduhist, address, id, status,) VALUES ('$name', '$ic', '$phonenum', '$honor', '$work', '$eduhist', '$address', '$id', '$status')";

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
            window.location.href = "addUser.php";
        </script>