<?php
include 'db_connection.php';

$userID = (string)$_GET['userID'];
$discussionID = (string)$_GET['discussionID'];

// Retrieve discussion details
$discussionQuery = "SELECT discussion.date, discussion.topic, discussion.content, user.username
                    FROM discussion
                    INNER JOIN user ON discussion.userID = user.userID
                    WHERE discussion.discussionID = '$discussionID'";
$discussionResult = mysqli_query($conn, $discussionQuery);
$discussionData = mysqli_fetch_assoc($discussionResult);

// Retrieve comments
$commentsQuery = "SELECT feedback.description, feedback.datetime
                  FROM feedback
                  WHERE feedback.discussionID = '$discussionID'";
$commentsResult = mysqli_query($conn, $commentsQuery);

// Retrieve answers
$answersQuery = "SELECT answerr.description, answerr.date
                  FROM answerr
                  WHERE answerr.discussionID = '$discussionID'";
$answersResult = mysqli_query($conn, $answersQuery);

// Save comment to feedback table
if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    $insertQuery = "INSERT INTO feedback (description, datetime, discussionID) 
                    VALUES ('$comment', NOW(), '$discussionID')";
    mysqli_query($conn, $insertQuery);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manage Account</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4367857c8.js" crossorigin="anonymous"></script>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Discussion forum</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Recent Discussions</h6>
                        </div>
                        <div class="card-body">
                            <!-- Display the discussion content -->
                            <div class="discussion">
                                <div class="post-box">
                                    <div class="post-header">
                                        <div class="post-details">
                                            <div class="timestamp"><?php echo $discussionData['date']; ?></div>
                                            <div class="username"><?php echo $discussionData['username']; ?></div>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <h4 class="topic"><?php echo $discussionData['topic']; ?></h4>
                                        <p class="content"><?php echo $discussionData['content']; ?></p>
                                        <div class="feedback-buttons">
                                            <button class="btn btn-outline-primary btn-sm" name="like">
                                                <i class="far fa-thumbs-up"></i> Like
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" name="rate">
                                                <i class="far fa-star"></i> Rate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <!-- Display answers -->
                            <?php while ($answer = mysqli_fetch_assoc($answersResult)) { ?>
                                <div class="answer-box">
                                    <div class="answer-line"></div>
                                    <div class="answer-icon">
                                        <i class="far fa-comment-dots"></i>
                                    </div>
                                    <div class="answer-content">
                                        <p class="answer-description"><?php echo $answer['description']; ?></p>
                                        <p class="answer-datetime"><?php echo $answer['date']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Display feedback -->
                            <div class="feedback-container">
                                <?php
                                $numComments = mysqli_num_rows($commentsResult);
                                if ($numComments > 0) {
                                    while ($feedback = mysqli_fetch_assoc($commentsResult)) {
                                        ?>
                                        <div class="feedback-box">
                                            <div class="feedback-line"></div>
                                            <div class="feedback-icon">
                                                <i class="far fa-comment-dots"></i>
                                            </div>
                                            <div class="feedback-content">
                                                <p class="feedback-description"><?php echo $feedback['description']; ?></p>
                                                <p class="feedback-datetime"><?php echo $feedback['datetime']; ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    echo "<p>No comments</p>";
                                }
                                ?>
                            </div>


                            <div class="comment-box">
                                <div class="comment-line"></div>
                                <div class="comment-icon">
                                    <i class="far fa-comment-dots"></i>
                                </div>
                                <div class="comment-content">
                                    <form method="POST" action="">
                                        <textarea class="form-control" name="comment" placeholder="Add a comment..." rows="2"></textarea>
                                        <button type="submit" class="btn btn-info mt-2">Post</button>
                                        <a class="btn btn-outline-primary mt-2" href="DiscussionMain.php?userID=<?php echo $userID; ?>">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>
            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>
