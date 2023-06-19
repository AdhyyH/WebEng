<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webengproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query
$stmt = $conn->prepare("SELECT * FROM expertt");
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $options = array();

    // Fetch each row's information
    while ($row = $result->fetch_assoc()) {
        // Get the ID from the row
        $id = $row['ExperttID'];

        // Add the ID to the options array
        $options[] = $id;
    }

    // Close the prepared statement and result set
    $stmt->close();
    $result->close();
} else {
    echo "No data found in the table.";
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this data?");
        }
    </script>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <label for="option">Select an option:</label>
            <select name="option" id="option">
                <?php
                foreach ($options as $id => $option) {
                    echo "<option>" . $option . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Submit" name="submit">
        </form>

        <?php
        if (isset($_POST["submit"])) {
            $selectedOption = $_POST["option"];
            if (!empty($selectedOption)) {
                // Display all information for the selected option
                echo "<br>Selected option:<br>";

                // Connect to the database again to fetch the selected row's information
                $conn = new mysqli($servername, $username, $password, $dbname);
                $stmt = $conn->prepare("SELECT * FROM expertt WHERE ExperttID = ?");
                $stmt->bind_param("s", $selectedOption);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                
                    // Display the row's information
                    echo "<h2>User Information</h2>";
                    echo "<table>";
                    echo "<tr><td>Name:</td><td>" . $row['name'] . "</td></tr>";
                    echo "<tr><td>Qualification Title:</td><td>" . $row['Qualification'] . "</td></tr>";
                    echo "</table>";
                
                    // Add the delete button and confirmation prompt
                    echo "<form method='POST' action='delete.php' onsubmit='return confirmDeletion();'>";
                    echo "<input type='hidden' name='ExperttID' value='" . $row['ExperttID'] . "'>";
                    echo "<input type='submit' value='Delete'>";
                    echo "</form>";
                } else {
                    echo "No data found for the selected ID.";
                }
                

                // Close the prepared statement and result set
                $stmt->close();
                $result->close();
            } else {
                echo "No option selected.";
            }
        }
        ?>

        <br>
        <a href="mainAdmin.php" class="button">Back</a>
    </div>
</body>
</html>
