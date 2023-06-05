<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- IcoMoon CSS -->
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Style -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #3A38AC;
        }
    </style>

    <title>UMP FK-EduSearch</title>
</head>
<body>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/background_login.png" alt="Image" class="img-fluid">
            </div>

            <div class="col-md-6 contents">
                <br><br><br><br><br><br><br><br><br><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3 style="color:white">Login</h3>
                            <p class="mb-4" style="color:white">Welcome back to FK-EduSearch!.</p>
                        </div>
                        <form action="loginAuthenticator.php" method="post">
                            <?php if (isset($_GET['error']) && $_GET['error'] == true): ?>
                            <div class="alert alert-danger" role="alert">
                                Your ID or Password is invalid/wrong. Please try again.
                            </div>
                            <?php endif; ?>
                            <div class="form-group first">
                                <label for="username"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>&nbsp ID</label>
                                <input type="text" class="form-control" id="username" name="username">

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                </svg>&nbsp Password</label>
                                <input type="password" class="form-control" id="password" name="password">

                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption" style="color:white">Remember me</span>
                                    <input type="checkbox" checked="checked"/>
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="verifyEmail.php" class="forgot-pass" style="color:white">Forgot Password</a></span> 
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary" style="color: white;">             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
