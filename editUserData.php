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
$stmt = $conn->prepare("SELECT * FROM userinfo");
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $options = array();

    // Fetch each row's information
    while ($row = $result->fetch_assoc()) {
        // Get the ID from the row
        $id = $row['id'];

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
            margin: 0;
        }

        .container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
            text-align: center;
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

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table td {
            padding: 5px 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <label for="option">Select an option:</label>
            <select name="option" id="option">
                <?php
                foreach ($options as $option) {
                    echo "<option>" . $option . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $selectedOption = $_POST["option"];
            if (!empty($selectedOption)) {
                // Display all information for the selected option
                echo "<br>Selected option:<br>";

                // Connect to the database again to fetch the selected row's information
                $conn = new mysqli($servername, $username, $password, $dbname);
                $stmt = $conn->prepare("SELECT * FROM userinfo WHERE id = ?");
                $stmt->bind_param("s", $selectedOption);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    // Display the row's information in a table
                    echo "<table>";
                    echo "<tr><td>ID:</td><td>" . $row['id'] . "</td></tr>";
                    echo "<tr><td>Name:</td><td>" . $row['name'] . "</td></tr>";
                    echo "<tr><td>IC:</td><td>" . $row['ic'] . "</td></tr>";
                    echo "<tr><td>Phone Num:</td><td>" . $row['phonenum'] . "</td></tr>";
                    echo "<tr><td>Honorary Title:</td><td>" . $row['honor'] . "</td></tr>";
                    echo "<tr><td>Work as:</td><td>" . $row['work'] . "</td></tr>";
                    echo "<tr><td>Education History:</td><td>" . $row['eduhist'] . "</td></tr>";
                    echo "<tr><td>Address:</td><td>" . $row['address'] . "</td></tr>";
                    echo "</table>";

                    // Add the edit button and form
                    echo "<br>";
                    echo "<form method='POST' action='updateUserData.php'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input type='submit' value='Edit'>";
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
