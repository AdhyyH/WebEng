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

        .error-message {
            color: red;
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
                            <h3 style="color:white">Verify Email</h3>
                            <p class="mb-4" style="color:white">Please verify your email.</p>
                        </div>
                        <form action="emailAuthenticator.php" method="post">
                            <div class="form-group first">
                                <label for="username"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>&nbsp Email</label>
                                <input type="text" class="form-control" id="username" name="email">
                            </div>
                            <?php
                                // Check if the email is invalid and display the error message
                                if (isset($_GET['valid']) && $_GET['valid'] === 'false') {
                                    echo '<div class="error-message">Your email is wrong/not in the database. Please try again later.</div>';
                                }
                            ?>
                            <br>
                            <input type="submit" value="Verify" class="btn btn-block btn-primary">
                            <br>
                            <span class="ml-auto" style="text-align: center;"><a href="index.php" class="forgot-pass" style="color:white">Back</a></span>
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
