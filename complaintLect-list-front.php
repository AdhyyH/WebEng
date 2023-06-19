<?php include('complaintLecturerHeader.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Complaint List</h1>

    </div>

    <!-- Content Row -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <form method="GET" action="">
            <div class="form-group">
                <label for="dateType">Select Date Type:</label>
                <select class="form-control" id="dateType" name="dateType">
                    <option value="day">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        // Check if dateType is set in the URL parameters
        if (isset($_GET['dateType'])) {
            $dateType = $_GET['dateType'];

            // Connect to MySQL server
            $mysql = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

            // Select the database named "fkedusearch"
            mysqli_select_db($mysql, "webengproject") or die(mysqli_error($mysql));

            // Query to fetch total complaints by type based on selected dateType
            $query = "SELECT type, COUNT(*) as total FROM complaints WHERE DATE(created_at) >= CURDATE() - INTERVAL 1 $dateType GROUP BY type";
            $result = mysqli_query($mysql, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='mt-3'>";
                echo "<h5>Total Complaints by Type ($dateType):</h5>";
                echo "<ul>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $type = $row["type"];
                    $total = $row["total"];
                    echo "<li>$type: $total</li>";
                }
                echo "</ul>";
                echo "</div>";
            } else {
                echo "<p>No complaints found for the selected $dateType.</p>";
            }

            // Close the database connection
            mysqli_close($mysql);
        }
        ?>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Complaint</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Complaint ID</th>
                                <th>Answer ID</th>
                                <th>Question ID</th>
                                <!-- <th>User Name</th> -->
                                <th>Type</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // Connect to MySQL server
                            $mysql = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

                            // Select the database named "fkedusearch"
                            mysqli_select_db($mysql, "webengproject") or die(mysqli_error($mysql));

                            $query = "SELECT c.id AS complaintID, a.id AS answerID, q.id AS questionID, c.type, c.description, c.status, c.created_at
                            FROM complaints c, answers a, questions q, users u 
                            WHERE c.answer_id = a.id AND a.question_id = q.id AND q.user_id = u.id";

                            $result = mysqli_query($mysql, $query);

                            if (mysqli_num_rows($result) > 0) {
                                // Output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["complaintID"];
                                    $answer_id = $row["answerID"];
                                    $question_id = $row["questionID"];
                                    // $username = $row["first_name"];
                                    $type = $row["type"];
                                    $description = $row["description"];
                                    $created_at = $row["created_at"];
                                    $status = $row["status"];
                                    $statusColor = '';
                                    switch ($status) {
                                        case 'onhold':
                                            $statusColor = 'rgba(255, 99, 132, 0.5)';
                                            break;
                                        case 'investigation':
                                            $statusColor = 'rgba(54, 162, 235, 0.5)';
                                            break;
                                        case 'resolved':
                                            $statusColor = 'rgba(75, 192, 192, 0.5)';
                                            break;
                                        default:
                                            $statusColor = '';
                                            break;
                                    }
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $id; ?>
                                        </td>
                                        <td>
                                            <?php echo $answer_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $question_id; ?>
                                        </td>
                                        <!-- <td><?php echo $username; ?></td> -->
                                        <td>
                                            <?php echo $type; ?>
                                        </td>
                                        <td>
                                            <?php echo $description; ?>
                                        </td>
                                        <td>
                                            <?php echo $created_at; ?>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill" style="background-color: <?php echo $statusColor; ?>"><?php echo $status; ?></span>
                                        </td>
                                        <td>
                                           <a href="complaint-edit-front.php?complaintID=<?php echo $id; ?>&answer_id=<?php echo $answer_id; ?>&question_id=<?php echo $question_id; ?>&type=<?php echo $type; ?>&description=<?php echo $description; ?>&created_at=<?php echo $created_at; ?>&status=<?php echo $status; ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                        
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function displayEditPopup(id, answerId, questionId, username, type, description, createdAt, status) {
            var editPopup = document.getElementById("editPopup");
            editPopup.style.display = "block";

            var editPageUrl = "complaint-edit-front.php?id=" + id + "&answer_id=" + answerId + "&question_id=" + questionId + "&type=" + type + "&description=" + description + "&created_at=" + createdAt + "&status=" + status;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", editPageUrl, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var editPopupContent = document.querySelector(".edit-popup-content");
                    editPopupContent.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function closeEditPopup() {
            var editPopup = document.getElementById("editPopup");
            editPopup.style.display = "none";
        }
    </script>

    </body>

    </html>
</div>
<?php include('complaint-footer.php'); ?>