<?php include('complaintLecturerHeader.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Complaint</h1>

    </div>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <?php
                // Check if the complaint ID and other parameters are provided in the URL
                if (isset($_GET['complaintID']) && isset($_GET['answer_id']) && isset($_GET['question_id']) && isset($_GET['type']) && isset($_GET['description']) && isset($_GET['created_at']) && isset($_GET['status'])) {
                    // Get the parameters from the URL
                    $complaintID = $_GET['complaintID'];
                    $answer_id = $_GET['answer_id'];
                    $question_id = $_GET['question_id'];
                    //$username = $_GET['username'];
                    $type = $_GET['type'];
                    $description = $_GET['description'];
                    $created_at = $_GET['created_at'];
                    $status = $_GET['status'];
                ?>

                    <form method="post" action="complaint-update.php">
                        <input type="hidden" name="id" value="<?php echo $complaintID; ?>">
                        <div class="form-group">
                            <label for="answer_id">Answer ID:</label>
                            <input type="text" class="form-control" id="answer_id" name="answer_id" value="<?php echo $answer_id; ?>" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="question_id">Question ID:</label>
                            <input type="text" class="form-control" id="question_id" name="question_id" value="<?php echo $question_id; ?>" readonly>
                        </div>
                        <br>
                        <!-- <div class="form-group">
                            <label for="username">User Name:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
                        </div> -->
                        <br>
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" readonly><?php echo $description; ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="created_at">Created At:</label>
                            <input type="text" class="form-control" id="created_at" name="created_at" value="<?php echo $created_at; ?>" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="investigation" <?php if ($status == "investigation") echo "selected"; ?>>investigation</option>
                                <option value="onhold" <?php if ($status == "onhold") echo "selected"; ?>>onhold</option>
                                <option value="resolved" <?php if ($status == "resolved") echo "selected"; ?>>resolved</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                <?php
                } else {
                    echo "Invalid parameters.";
                }
                ?>
            </div>
        </div>
    </div>

   
</body>
<?php include('complaint-footer.php'); ?>

</html>