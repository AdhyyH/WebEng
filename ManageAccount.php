<?php
include 'db_connection.php';
$userID = $_GET['userID'];

// SQL query to retrieve user information based on userID
$sql = "SELECT userID, userName, academicStatus, researchType, socmedlink, email
        FROM user
        WHERE userID = '$userID';
        ";

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
    <title>Manage Account</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage Account</h1>
                    </div>
                    <!-- Content Row -->
                    <!-- Begin inside Content -->

                    
                    <div class="container-fluid">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
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
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="taskName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="taskName" placeholder="Enter name" value="<?php echo $userName; ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="taskName" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="taskName" placeholder="Enter email" value="<?php echo $email; ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="taskName" class="form-label">Social media</label>
                                                        <input type="text" class="form-control" id="taskName" placeholder="No information" value="<?php echo $socmedLink; ?>" readonly>
                                                    </div>

                                                    <!-- select research type -->
                                                    <div class="mb-3">
                                                        <label for="taskStatus" class="form-label">Research Type</label>
                                                        <input type="text" class="form-control" id="taskName" placeholder="No information" value="<?php echo $researchType; ?>" readonly>
                                                    </div>

                                                    <!-- select academic status -->
                                                    <div class="mb-3">
                                                        <label for="taskStatus" class="form-label">Academic Status</label>
                                                        <input type="text" class="form-control" id="taskName" placeholder="No information" value="<?php echo $academicStatus; ?>" readonly>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" name="update">
                                                        <a href="ManageAccountUpdate.php?userID=<?php echo $userID; ?>" class="text-light">Update</a>
                                                    </button>
                                                    
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

            </body>

            </html>
