<?php
include 'db_connection.php';
$userID = $_GET['userID'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_GET['userID'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $socmedLink = $_POST['socmedLink'];
    $researchType = $_POST['researchType'];
    $academicStatus = $_POST['academicStatus'];

    // SQL query to update user information
    $sql = "UPDATE user
            SET userName = '$userName',
                email = '$email',
                socmedlink = '$socmedLink',
                researchType = '$researchType',
                academicStatus = '$academicStatus'
            WHERE userID = '$userID';";
    $result = $conn->query($sql);

    if ($result) {
        header('location: ManageAccount.php?userID='.$userID);
        exit();
    } else {
        die(mysqli_error($conn));
    }
}

// SQL query to retrieve user information based on userID
$sql = "SELECT userID, userName, academicStatus, researchType, socmedlink, email
        FROM user
        WHERE userID = '$userID';";

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

    <title>manage account</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c4367857c8.js" crossorigin="anonymous"></script>


    <style>
        /* Custom select styles */
        .form-select {
            appearance: none;
            background-color: #f8f9fc;
            border: 1px solid #d1d3e2;
            border-radius: 4px;
            padding: 8px 12px;
            width: 100%;
            font-size: 14px;
            line-height: 1.5;
            color: #333;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        /* Custom select arrow */
        .form-select:after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            color: #555;
            pointer-events: none;
        }
        /* Custom select hover state */
        .form-select:hover {
            border-color: #a1a3b2;
        }
        /* Custom select focus state */
        .form-select:focus {
            outline: none;
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->


<!-- --------------------------------------Begin Page Content---------------------------------------------- -->

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Manage Account</h1>
</div>

                    
<!-- Begin inside Content -->
<div class="container-fluid">
     
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Extract user information
                            $userID = $row['userID'];
                            $userName = $row['userName'];
                            $email = $row['email'];
                            $academicStatus = $row['academicStatus'];
                            $researchType = $row['researchType'];
                            $socmedLink = $row['socmedlink'];
                    ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <div class="mb-3">
                                                    <label for="taskName" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="taskName" placeholder="Enter name" value="<?php echo $userName; ?>" name="userName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $email; ?>" name="email">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="socmedLink" class="form-label">Social Media Link</label>
                                                    <input type="text" class="form-control" id="socmedLink" placeholder="Enter social media link" value="<?php echo $socmedLink; ?>" name="socmedLink">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="researchType" class="form-label">Research Type</label>
                                                    <select class="form-select" id="researchType" name="researchType">
                                                        <option value="Option 1" <?php echo ($researchType == 'Option 1') ? 'selected' : ''; ?>>Option 1</option>
                                                        <option value="Option 2" <?php echo ($researchType == 'Option 2') ? 'selected' : ''; ?>>Option 2</option>
                                                        <option value="Option 3" <?php echo ($researchType == 'Option 3') ? 'selected' : ''; ?>>Option 3</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="academicStatus" class="form-label">Academic Status</label>
                                                    <select class="form-select" id="academicStatus" name="academicStatus">
                                                        <option value="Option A" <?php echo ($academicStatus == 'Option A') ? 'selected' : ''; ?>>Option A</option>
                                                        <option value="Option B" <?php echo ($academicStatus == 'Option B') ? 'selected' : ''; ?>>Option B</option>
                                                        <option value="Option C" <?php echo ($academicStatus == 'Option C') ? 'selected' : ''; ?>>Option C</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No user found.";
                    }
                    ?>
                </div>
                <!-- End inside Content -->
            </div>


        


<!-- --------------------------------------End Page Content---------------------------------------------- -->
   

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

</body>

</html>