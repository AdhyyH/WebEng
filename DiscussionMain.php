<?php
include 'db_connection.php';

// SQL query to retrieve categoryName based on categoryID
$sql = "SELECT discussion.discussionID, discussion.userID, category.categoryName, discussion.content, discussion.status, discussion.date, discussion.topic
        FROM discussion
        INNER JOIN category ON discussion.categoryID = category.categoryID";

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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

      
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            
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

            
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu ----------------------------------->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="fa-solid fa-address-card" style="color: white"></i> <!--this should redirect to ManageAccount.php-->
                    <span>Manage Account</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="fa-solid fa-book" style="color:white"></i> <!--this should redirect to DiscussionMain.php which is this page-->
                    <span>Discussion</span>
                </a>
               
            </li>

          
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

        
        <div id="content-wrapper" class="d-flex flex-column">

            
            <div id="content">

                <!-- Topbar -->
                
                

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Search -->
                <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
                </form>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                     <ul class="navbar-nav ml-auto">

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Oscar</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            
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
               


<!-- ----------------------------------------------------------------------------------------- -->
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Discussion Board</h1>
                        
</div>




<!-- Inside Content -->
<div class="container-fluid">

<!--------------------- add all the content here -------------------------------------->
<div class="d-flex justify-content-between">
    <div>
        <button type="submit" class="btn btn-primary" name="addnew">Add New</button> <!--this should redirect to DiscussionCreate-->
        <button type="submit" class="btn btn-secondary" name="insight">Post Insight</button> <!--this should redirect to DiscussionInsight-->
    </div>
    <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Sort
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropdown">
            <a class="dropdown-item" href="#">Latest</a>
            <a class="dropdown-item" href="#">Earliest</a>
        </div>
    </div>
</div>

<br>

<?php
while ($row = $result->fetch_assoc()) {
    $discussionID = $row['discussionID'];
    $userID = $row['userID'];
    $categoryName = $row['categoryName'];
    $content = $row['content'];
    $status = $row['status'];
    $date = $row['date'];
    $topic = $row['topic'];

    // Generate the HTML code for each discussion
    echo '<div class="card shadow mb-4"> 
            <div class="card-header py-3 border-left-primary">
                <h4 class="title font-weight-bold text-primary">'.$topic.'</h4>
                <div class="category">'.$categoryName.'</div>
            </div>
            <div class="card-body">
                <div class="discussion">
                    <div class="post-box">
                        <div class="post-header">
                            <div class="post-details">
                                <div class="timestamp">'.$date.'</div>
                            </div>
                        </div>
                        <div class="post-content">
                            <p class="content">'.$content.'</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-outline-primary" name="comment" onclick="location.href=\'DiscussionComment.php?discussionID='.$discussionID.'\'">Comment</button>
            <button type="submit" class="btn btn-outline-secondary" name="update" onclick="location.href=\'DiscussionUpdate.php?discussionID='.$discussionID.'\'">Update</button>
        <br><br>';
}
?>

<!--------------------------------End of Discussion Board -------------------------------------->


      
   


    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   
    <script src="js/sb-admin-2.min.js"></script>

  
    <script src="vendor/chart.js/Chart.min.js"></script>

    
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>