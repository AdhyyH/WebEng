<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedusearch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query
$stmt = $conn->prepare("SELECT * FROM expert");
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $options = array();

    // Fetch each row's information
    while ($row = $result->fetch_assoc()) {
        // Get the ID from the row
        $id = $row['ExpertID'];

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
                $stmt = $conn->prepare("SELECT * FROM expert WHERE ExpertID = ?");
                $stmt->bind_param("s", $selectedOption);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                
                    echo "<h2>Edit User Data</h2>";
                    echo "<form method='POST' action='update.php'>";
                    echo "<input type='hidden' name='ExpertID' value='" . $row['ExpertID'] . "'>";
                    echo "<table>";
                
                    echo "<tr>";
                    echo "<td><label for='name'>Name</label></td>";
                    echo "<td><input type='text' class='form-control' id='name' name='name' value='" . $row['name'] . "' placeholder='Enter name'></td>";
                    echo "</tr>";
                
                    echo "<tr>";
                    echo "<td><label for='qualification'>Qualification Type</label></td>";
                    echo "<td>";
                    echo "<select class='form-control' id='qualification' name='qualification'>";
                    echo "<option value='1' " . ($row['qualification'] == 1 ? 'selected' : '') . ">PhD</option>";
                    echo "<option value='2' " . ($row['qualification'] == 2 ? 'selected' : '') . ">Master</option>";
                    echo "<option value='3' " . ($row['qualification'] == 3 ? 'selected' : '') . ">Degree</option>";
                    echo "</select>";
                    echo "</td>";
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
