<?php
include 'db_connection.php';
$userID = $_GET['userID']; 


// SQL query to retrieve categoryName based on categoryID
$sql = "SELECT user.userID, user.userName, user.email, user.academicStatus, user.researchType, socmed.socmedtype, socmed.socmedName, socmed.socmedlink
        FROM user
        LEFT JOIN socmed ON user.socmedID = socmed.socmedID";


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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-user" style="color: white"></i>
                </div>
                <div class="sidebar-brand-text mx-3">User</div>
            </a>

            <!-- Divider: The line above dashboard-->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-house" style="color: white"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider: The line above dashboard -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="fa-solid fa-address-card" style="color: white"></i>
                    <span>Manage Account</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="fa-solid fa-book" style="color:white"></i>
                    <span>Discussion</span>
                </a>
               
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" >
                    <i class="fa-solid fa-list" style="color: white"></i>
                    <span>Complaint List</span>
                </a>
        
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                     <ul class="navbar-nav ml-auto">

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Royston</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
<!-- End of Topbar -->

<!-- --------------------------------------Begin Page Content---------------------------------------------- -->

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Manage Account</h1>
                        
</div>

<!-- Content Row -->
                    
<!-- Begin inside Content -->
<div class="container-fluid">
    <!-- DataTales Example -->

    <!-- add all the content here -->
    
    
    <?php
while ($row = $result->fetch_assoc()) {
    $userID = $row['userID'];
    $userName = $row['userName'];
    $email = $row['email'];
    $academicStatus = $row['academicStatus'];
    $researchType = $row['researchType'];
    $socmedType = $row['socmedtype'];
    $socmedName = $row['socmedName'];
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
                        <input type="text" class="form-control" id="taskName" placeholder="Enter name" value="<?php echo $userName; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="taskName" class="form-label">Email</label>
                        <input type="email" class="form-control" id="taskName" placeholder="Enter email" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="taskName" class="form-label">Social media</label>
                        <input type="text" class="form-control" id="taskName" placeholder="Enter social media link here" value="<?php echo $socmedLink; ?>">
                    </div>

                    <!-- select research type -->
                    <div class="mb-3">
                        <label for="taskStatus" class="form-label">Research Type</label>
                        <select class="form-select" id="taskStatus">
                            <option selected disabled>Select Research Type</option>
                            <option value="1" <?php if ($researchType == 1) echo 'selected'; ?>>CSRG</option>
                            <option value="2" <?php if ($researchType == 2) echo 'selected'; ?>>ViSiC</option>
                            <option value="3" <?php if ($researchType == 3) echo 'selected'; ?>>MIRG</option>
                        </select>
                    </div>

                    <!-- select academic status -->
                    <div class="mb-3">
                        <label for="taskStatus" class="form-label">Academic Status</label>
                        <select class="form-select" id="taskStatus">
                            <option selected disabled>Select Academic Status</option>
                            <option value="1" <?php if ($academicStatus == 1) echo 'selected'; ?>>To Do</option>
                            <option value="2" <?php if ($academicStatus == 2) echo 'selected'; ?>>In Progress</option>
                            <option value="3" <?php if ($academicStatus == 3) echo 'selected'; ?>>Done</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update">
                    <a href="ManageAccountUpdate.php?userID=' . $userID . " class="text-light">Update</a>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}
?>

      <!-- -------------------end-------------------------------------------------------------- -->
   

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