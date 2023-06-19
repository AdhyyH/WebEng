<?php
$userID = $_GET['userID'];
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
                        <h1 class="h3 mb-0 text-gray-800">Post Insight</h1>
                    </div>
                    <!-- Inside Content -->
                    <div class="container-fluid">
                        <!-- Add all the content here -->
                        <div class="d-flex">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="sortDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Category
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="sortDropdown">
                                    <a class="dropdown-item" href="#">Option 1</a>
                                    <a class="dropdown-item" href="#">Option 2</a>
                                    <a class="dropdown-item" href="#">rrrrrrr</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="sortDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="sortDropdown">
                                    <a class="dropdown-item" href="#">Option 1</a>
                                    <a class="dropdown-item" href="#">Option 2</a>
                                    <a class="dropdown-item" href="#">Option 3</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 border-left-primary">
                                <h6 class="m-0 font-weight-bold text-primary">Posts Statistics</h6>
                            </div>
                            <!-- Area Chart -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="postChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- End of Main Content -->
                        
                    </div>
                    <!-- End of Content Wrapper -->
                </div>
                <!-- End of Page Wrapper -->
           
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
            <!-- Charts.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <!-- PHP and JavaScript code to fetch data and create the chart -->
            <?php
            include 'db_connection.php';
            
            // Retrieve the number of posts per month, year, or week
            $sql = "SELECT DATE_FORMAT(date, '%Y-%m-%d') AS interval_date, COUNT(*) AS post_count
                    FROM discussion
                    GROUP BY interval_date";
            $result = $conn->query($sql);
            
            // Initialize arrays to store the data
            $labels = [];
            $data = [];
            
            // Process the query result
            while ($row = $result->fetch_assoc()) {
                $labels[] = $row['interval_date'];
                $data[] = $row['post_count'];
            }
            
            // Close the database connection
            $conn->close();
            ?>
            <script>
                // JavaScript code to create the chart using Chart.js
                document.addEventListener("DOMContentLoaded", function () {
                    var ctx = document.getElementById("postChart").getContext("2d");
            
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: [{
                                label: 'Number of Posts',
                                data: <?php echo json_encode($data); ?>,
                                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                                borderColor: 'rgba(78, 115, 223, 1)',
                                pointRadius: 3,
                                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                            scales: {
                                x: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Time Interval'
                                    }
                                },
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Number of Posts'
                                    }
                                }
                            }
                        }
                    });
                });
            </script>


    
    
   

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