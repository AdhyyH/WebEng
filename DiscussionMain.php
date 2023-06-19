<?php
include 'db_connection.php';
$userID = $_GET['userID'] ?? '';

// Retrieve the search query
$search = $_GET['search'] ?? '';
$categories = $_GET['categories'] ?? '';
$topic = $_GET['topic'] ?? '';
$sort = $_GET['sort'] ?? '';

// Prepare the SQL query with search and sort conditions
$sql = "SELECT discussion.discussionID, discussion.userID, categories.categoriesName, discussion.content, discussion.status, discussion.date, discussion.topic
        FROM discussion
        INNER JOIN categories ON discussion.categoriesID = categories.categoriesID
        WHERE discussion.content LIKE '%$search%'
        AND categories.categoriesName LIKE '%$categories%'
        AND discussion.topic LIKE '%$topic%'";

// Add the ORDER BY clause based on the sort parameter
if ($sort === 'latest') {
    $sql .= ' ORDER BY discussion.date DESC';
} elseif ($sort === 'earliest') {
    $sql .= ' ORDER BY discussion.date ASC';
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Discussion Board</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4367857c8.js" crossorigin="anonymous"></script>
    <!-- this page style -->
    <style>
        .btn-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-info:hover {
            background-color: #138496;
            color: #fff;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Discussion Board</h1>
                    </div>
                    
                    <!-- Inside Content -->
                    <div class="container-fluid">
                        <!-- Add New and Sort buttons -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-primary" onclick="redirectToDiscussionCreate('<?php echo $userID; ?>')">Add New</button>
                                <button type="button" class="btn btn-secondary" onclick="redirectToDiscussionInsight('<?php echo $userID; ?>')">Post Insight</button>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Sort</button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropdown">
                                    <a class="dropdown-item" href="?search=<?php echo $search; ?>&categories=<?php echo $categories; ?>&topic=<?php echo $topic; ?>&sort=latest&userID=<?php echo $userID; ?>">Latest</a>
                                    <a class="dropdown-item" href="?search=<?php echo $search; ?>&categories=<?php echo $categories; ?>&topic=<?php echo $topic; ?>&sort=earliest&userID=<?php echo $userID; ?>">Earliest</a>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- Search form -->
                        <form method="GET" action="">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $search; ?>">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Category" name="category" value="<?php echo $categories; ?>">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Topic" name="topic" value="<?php echo $topic; ?>">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>

                        <!-- Discussion Board -->
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $discussionID = $row['discussionID'];
                            $thisuserID = $row['userID'];
                            $categoriesName = $row['categoriesName'];
                            $content = $row['content'];
                            $status = $row['status'];
                            $date = $row['date'];
                            $topic = $row['topic'];

                            // Generate the HTML code for each discussion
                            echo '<div class="card shadow mb-4">
                                        <div class="card-header py-3 border-left-primary">
                                            <h4 class="title font-weight-bold text-primary">' . $topic . '</h4>
                                            <div class="category">' . $categoriesName . '</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="discussion">
                                                <div class="post-box">
                                                    <div class="post-header">
                                                        <div class="post-details">
                                                            <div class="timestamp">' . $date . '</div>
                                                        </div>
                                                    </div>
                                                    <div class="post-content">
                                                        <p class="content">' . $content . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-outline-primary" name="comment">
                                                <a href="DiscussionComment.php?discussionID=' . $discussionID . '&userID=' . $userID . '">
                                                    <span style="font-weight: bold;">Comment</span>
                                                </a>
                                            </button>';

                            // Add the condition to display the "Update" button
                            if ($thisuserID == $userID) {
                                echo '<button type="submit" class="btn btn-outline-secondary" name="update">
                                            <a href="DiscussionUpdate.php?discussionID=' . $discussionID . '&userID=' . $userID . '">
                                                <span style="font-weight: bold;">Update</span>
                                            </a>
                                        </button>';
                            }
                            
                            echo '</div>
                                </div>';
                        }
                        ?>

                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>
    <!-- End of Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Additional scripts for this page -->
    <script>
        function redirectToDiscussionCreate(userID) {
            window.location.href = "DiscussionCreate.php?userID=" + userID;
        }

        function redirectToDiscussionInsight(userID) {
            window.location.href = "DiscussionInsight.php?userID=" + userID;
        }
    </script>
</body>

</html>
