<?php 

include 'db_connection.php';

// SQL query to retrieve userIDs
$sql = "SELECT userID FROM user";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose User ID</title>
</head>
<body>
    <h2>Choose User ID</h2>
    <form action="ManageAccount.php" method="GET">
        <label for="userID">User ID:</label>
        <select name="userID" id="userID">
            <?php
            while ($row = $result->fetch_assoc()) {
                $userID = $row['userID'];
                echo "<option value='{$userID}'>{$userID}</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Semak">
    </form>
</body>
</html>
