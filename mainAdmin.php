<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/adminUserListStyle.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Graph-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .online {
            color: green;
        }

        .offline {
            color: red;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="mainAdmin.php">
                <div class="sidebar-brand-text mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path
                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                    </svg>&nbsp <br> FK-EduSearch <sup>Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main
            </div>

            <!--Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-wallet" viewBox="0 0 16 16">
                            <path
                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                        </svg>&nbsp Manage Account
                    </span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data & Reporting
            </div>

            <!--Data-->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database" viewBox="0 0 16 16">
                            <path
                                d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313ZM13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 5.698ZM14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13V4Zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 8.698Zm0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525Z" />
                        </svg> &nbsp Data
                    </span>
                </a>
            </li>

            <!-- Status-->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                            <path
                                d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                            <path
                                d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z" />
                        </svg> &nbsp Status
                    </span>
                </a>
            </li>

            <!-- Report-->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-activity" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                        </svg>&nbsp Report
                    </span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User Management
            </div>

            <!-- User List-->
            <li class="nav-item active">
                <a class="nav-link" href="mainAdmin.php">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg> &nbsp User List
                    </span>
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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>

                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="images/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User List</h1>
                        <a href="addUserAdmin.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Add New User</a>
                    </div>


                    <!-- User List -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
                        </div>

                        <!-- Topbar Search -->
                        <br>
                        <form method="GET"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="searchBtn">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Total Users Count -->
                        <br>
                        <div class="card-body">
                            <?php
                            // Establish database connection
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "webengproject";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Initialize total count
                            $totalCount = 0;

                            // Check if the search button is clicked and a search query is entered
                            if (isset($_GET['searchBtn']) && !empty($_GET['search'])) {
                                $searchQuery = $_GET['search'];
                                // Modify the SQL query to search for matching IDs
                                $query = "SELECT * FROM userinfo WHERE id LIKE '%$searchQuery%'";
                                $result = $conn->query($query);

                                // Get the count of users matching the search query
                                $totalCount = $result->num_rows;
                            } else {
                                // Retrieve all users from the database
                                $query = "SELECT * FROM userinfo";
                                $result = $conn->query($query);

                                // Get the total count of users
                                $totalCount = $result->num_rows;
                            }
                            ?>
                            <p>Total Users:
                                <?php echo $totalCount; ?>
                            </p>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Iterate over the fetched data and display it in the table -->
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                // Set the font color based on the status
                                                $statusColor = ($row['status'] == "Online") ? "green" : "red";
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['name']; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            // Display a message when no results are found
                                            ?>
                                            <tr>
                                                <td colspan="2">No matching IDs found.</td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                    <!--Modifier-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Modifier</h6>
                        </div>

                        <div class="modbody">
                            <div class="modcontainer">
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "webengproject";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Prepare and execute the query
                                $stmt = $conn->prepare("SELECT * FROM userinfo");
                                $stmt->execute();

                                // Get the result
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    $options = array();

                                    // Fetch each row's information
                                    while ($row = $result->fetch_assoc()) {
                                        // Get the ID from the row
                                        $id = $row['id'];

                                        // Add the ID to the options array
                                        $options[] = $id;
                                    }

                                    // Close the prepared statement and result set
                                    $stmt->close();
                                    $result->close();
                                } else {
                                    echo "No data found in the table.";
                                }

                                // Close the connection
                                $conn->close();
                                ?>
                                <form method="POST" action="">
                                    <label for="option">Select an option:</label>
                                    <select name="option" id="option">
                                        <?php
                                        foreach ($options as $option) {
                                            echo "<option>" . $option . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" value="Submit">
                                </form>

                                <?php
                                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                    $selectedOption = $_POST["option"];
                                    if (!empty($selectedOption)) {
                                        // Display all information for the selected option
                                        echo "<br>Selected option:<br>";

                                        // Connect to the database again to fetch the selected row's information
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $stmt = $conn->prepare("SELECT * FROM userinfo WHERE id = ?");
                                        $stmt->bind_param("s", $selectedOption);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();

                                            echo "<form method='POST' action='updateUserAdmin.php'>";
                                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                            echo "<table>";

                                            echo "<tr>";
                                            echo "<td><label for='name'>Name</label></td>";
                                            echo "<td><input type='text' class='form-control' id='name' name='name' value='" . $row['name'] . "' placeholder='Enter name'></td>";
                                            echo "<td><label for='ic'>IC Number</label></td>";
                                            echo "<td><input type='text' class='form-control' id='ic' name='ic' value='" . $row['ic'] . "' placeholder='Enter IC number'></td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td><label for='phonenum'>Phone Number</label></td>";
                                            echo "<td><input type='text' class='form-control' id='phonenum' name='phonenum' value='" . $row['phonenum'] . "' placeholder='Enter phone number'></td>";
                                            echo "<td><label for='honor'>Honorary Type</label></td>";
                                            echo "<td>";
                                            echo "<select class='form-control' id='honor' name='honor'>";
                                            echo "<option value='1' " . ($row['honor'] == 1 ? 'selected' : '') . ">Mr./Mrs.</option>";
                                            echo "<option value='2' " . ($row['honor'] == 2 ? 'selected' : '') . ">Dr.</option>";
                                            echo "<option value='3' " . ($row['honor'] == 3 ? 'selected' : '') . ">Assoc. Prof</option>";
                                            echo "<option value='4' " . ($row['honor'] == 4 ? 'selected' : '') . ">Prof.</option>";
                                            echo "<option value='5' " . ($row['honor'] == 5 ? 'selected' : '') . ">Prof. Madya</option>";
                                            echo "</select>";
                                            echo "</td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td><label for='work'>Working As</label></td>";
                                            echo "<td>";
                                            echo "<select class='form-control' id='work' name='work'>";
                                            echo "<option value='1' " . ($row['work'] == 1 ? 'selected' : '') . ">Lecturer</option>";
                                            echo "<option value='2' " . ($row['work'] == 2 ? 'selected' : '') . ">Senior Lecturer</option>";
                                            echo "<option value='3' " . ($row['work'] == 3 ? 'selected' : '') . ">Researcher</option>";
                                            echo "<option value='4' " . ($row['work'] == 4 ? 'selected' : '') . ">Senior Researcher</option>";
                                            echo "<option value='5' " . ($row['work'] == 5 ? 'selected' : '') . ">Part Timer</option>";
                                            echo "<option value='6' " . ($row['work'] == 6 ? 'selected' : '') . ">Administration</option>";
                                            echo "</select>";
                                            echo "</td>";
                                            echo "<td><label for='status'>Status</label></td>";
                                            echo "<td>";
                                            echo "<select class='form-control' id='status' name='status'>";
                                            echo "<option value='1' " . ($row['status'] == 1 ? 'selected' : '') . ">Offline</option>";
                                            echo "<option value='2' " . ($row['status'] == 2 ? 'selected' : '') . ">Online</option>";
                                            echo "</select>";
                                            echo "</td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td><label for='eduhist'>Education History</label></td>";
                                            echo "<td colspan='3'><textarea class='form-control' id='eduhist' name='eduhist' rows='3' placeholder='Enter education history'>" . $row['eduhist'] . "</textarea></td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td><label for='address'>Address</label></td>";
                                            echo "<td colspan='3'><textarea class='form-control' id='address' name='address' rows='5' placeholder='Enter address'>" . $row['address'] . "</textarea></td>";
                                            echo "</tr>";

                                            echo "</table>";
                                            echo "<input type='submit' value='Update'>";
                                            echo "</form>";

                                            // Add the delete button and confirmation prompt
                                            echo "<form method='POST' action='deleteAdmin.php' onsubmit='return confirmDeletion();'>";
                                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                            echo "<input type='submit' value='Delete'>";
                                            echo "</form>";
                                        } else {
                                            echo "No data found for the selected ID.";
                                        }

                                        // Close the prepared statement and result set
                                        $stmt->close();
                                        $result->close();
                                    } else {
                                        echo "No option selected.";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Graph -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Graph</h6>
                        </div>

                        <div class="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>

                        <form method="GET" action="">
                            <label for="group">Group by:</label>
                            <select name="group" id="group" onchange="this.form.submit()">
                                <option value="id" <?php if (isset($_GET['group']) && $_GET['group'] === 'id')
                                    echo 'selected'; ?>>ID</option>
                                <option value="work" <?php if (isset($_GET['group']) && $_GET['group'] === 'work')
                                    echo 'selected'; ?>>Work</option>
                                <option value="honor" <?php if (isset($_GET['group']) && $_GET['group'] === 'honor')
                                    echo 'selected'; ?>>Honorary</option>
                                <option value="status" <?php if (isset($_GET['group']) && $_GET['group'] === 'status')
                                    echo 'selected'; ?>>Status</option>
                            </select>
                        </form>

                        <?php
                        // Connect to the database
                        $conn = new mysqli('localhost', 'root', '', 'webengproject');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Get the grouping type from the form submission or set a default value
                        $groupBy = isset($_GET['group']) ? $_GET['group'] : 'id';

                        // Modify the SQL query based on the grouping type
                        if ($groupBy === 'id') {
                            $sql = "SELECT id FROM userinfo";
                            $labels = ['L', 'M', 'S'];
                        } elseif ($groupBy === 'work') {
                            $sql = "SELECT work FROM userinfo";
                            $labels = ['Lecturer', 'Senior Lecturer', 'Researcher', 'Senior Researcher', 'Part Timer', 'Administration'];
                        } elseif ($groupBy === 'honor') {
                            $sql = "SELECT honor FROM userinfo";
                            $labels = ['Mr./Mrs.', 'Dr.', 'Ts.', 'Prof.', 'Assoc. Prof.', 'Prof. Madya'];
                        } elseif ($groupBy === 'status') {
                            $sql = "SELECT status FROM userinfo";
                            $labels = ['Online', 'Offline'];
                        }

                        $result = $conn->query($sql);

                        // Create an array to store the group counts
                        $groupCounts = array_fill_keys($labels, 0);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($groupBy === 'id') {
                                    $id = $row['id'];
                                    $firstLetter = strtoupper(substr($id, 0, 1));

                                    // Increment the count based on the first letter
                                    if (array_key_exists($firstLetter, $groupCounts)) {
                                        $groupCounts[$firstLetter]++;
                                    }
                                } elseif ($groupBy === 'work') {
                                    $work = $row['work'];

                                    // Increment the count based on the work type
                                    if (array_key_exists($work, $groupCounts)) {
                                        $groupCounts[$work]++;
                                    }
                                } elseif ($groupBy === 'honor') {
                                    $honor = $row['honor'];

                                    // Increment the count based on the honorary type
                                    if (array_key_exists($honor, $groupCounts)) {
                                        $groupCounts[$honor]++;
                                    }
                                } elseif ($groupBy === 'status') {
                                    $status = $row['status'];

                                    // Increment the count based on the status
                                    if (array_key_exists($status, $groupCounts)) {
                                        $groupCounts[$status]++;
                                    }
                                }
                            }
                        }

                        // Close the database connection
                        $conn->close();
                        ?>

                        <script>
                            // Create the bar graph
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?php echo json_encode($labels); ?>,
                                    datasets: [{
                                        label: 'ID Group Count',
                                        data: <?php echo json_encode(array_values($groupCounts)); ?>,
                                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            precision: 0
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Fakulti Komputeran Universiti Malaysia Pahang 2023 </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="js/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="js/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/adminUserList.js"></script>


</body>

</html>