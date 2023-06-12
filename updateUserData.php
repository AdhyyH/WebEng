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
        }

        .container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            width: 500px;
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
                
                    echo "<h2>Edit User Data</h2>";
                    echo "<form method='POST' action='update.php'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<table>";
                
                    echo "<tr>";
                    echo "<td><label for='name'>Name</label></td>";
                    echo "<td><input type='text' class='form-control' id='name' name='name' value='" . $row['name'] . "' placeholder='Enter name'></td>";
                    echo "<td><label for='ic'>IC Number</label></td>";
                    echo "<td><input type='text' class='form-control' id='ic' name='ic' value='" . $row['ic'] . "' placeholder='Enter IC number'></td>";
                    echo "</tr>";
                
                    echo "<tr>";
                    echo "<td><label for='phonenum'>Phone Number</label></td>";
                    echo "<td><input type='text' class='form-control' id='phonenum' name='phonenum' value='" . $row['phonenum'] . "' placeholder='Enter phone number'></td>";
                    echo "<td><label for='honor'>Honorary Type</label></td>";
                    echo "<td>";
                    echo "<select class='form-control' id='honor' name='honor'>";
                    echo "<option value='1' " . ($row['honor'] == 1 ? 'selected' : '') . ">Mr./Mrs.</option>";
                    echo "<option value='2' " . ($row['honor'] == 2 ? 'selected' : '') . ">Dr.</option>";
                    echo "<option value='3' " . ($row['honor'] == 3 ? 'selected' : '') . ">Assoc. Prof</option>";
                    echo "<option value='4' " . ($row['honor'] == 4 ? 'selected' : '') . ">Prof.</option>";
                    echo "<option value='5' " . ($row['honor'] == 5 ? 'selected' : '') . ">Prof. Madya</option>";
                    echo "</select>";
                    echo "</td>";
                    echo "</tr>";
                
                    echo "<tr>";
                    echo "<td><label for='work'>Working As</label></td>";
                    echo "<td>";
                    echo "<select class='form-control' id='work' name='work'>";
                    echo "<option value='1' " . ($row['work'] == 1 ? 'selected' : '') . ">Lecturer</option>";
                    echo "<option value='2' " . ($row['work'] == 2 ? 'selected' : '') . ">Senior Lecturer</option>";
                    echo "<option value='3' " . ($row['work'] == 3 ? 'selected' : '') . ">Researcher</option>";
                    echo "<option value='4' " . ($row['work'] == 4 ? 'selected' : '') . ">Senior Researcher</option>";
                    echo "<option value='5' " . ($row['work'] == 5 ? 'selected' : '') . ">Part Timer</option>";
                    echo "<option value='6' " . ($row['work'] == 6 ? 'selected' : '') . ">Administration</option>";
                    echo "</select>";
                    echo "</td>";
                    echo "<td><label for='status'>Status</label></td>";
                    echo "<td>";
                    echo "<select class='form-control' id='status' name='status'>";
                    echo "<option value='1' " . ($row['status'] == 1 ? 'selected' : '') . ">Offline</option>";
                    echo "<option value='2' " . ($row['status'] == 2 ? 'selected' : '') . ">Online</option>";
                    echo "</select>";
                    echo "</td>";
                    echo "</tr>";
                
                    echo "<tr>";
                    echo "<td><label for='eduhist'>Education History</label></td>";
                    echo "<td colspan='3'><textarea class='form-control' id='eduhist' name='eduhist' rows='3' placeholder='Enter education history'>" . $row['eduhist'] . "</textarea></td>";
                    echo "</tr>";
                
                    echo "<tr>";
                    echo "<td><label for='address'>Address</label></td>";
                    echo "<td colspan='3'><textarea class='form-control' id='address' name='address' rows='5' placeholder='Enter address'>" . $row['address'] . "</textarea></td>";
                    echo "</tr>";
                
                    echo "</table>";
                
                    echo "<input type='submit' value='Update'>";
                    echo "</form>";
                } else {
                    echo "No data found for the selected option.";
                }
                

                $stmt->close();
                $conn->close();
            } else {
                echo "Please select an option.";
            }
        }
        ?>

        <br>
        <a href="mainAdmin.php" class="button">Back</a>
    </div>
</body>
</html>
