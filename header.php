<?php
/*
session_start();
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fix My Cycle</title>
    <link rel="icon" href="img/logo_fav.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web/css/all.min.css">
    <link href="css/general.css" rel="stylesheet">
    <link href="css/rochan.css" rel="stylesheet">
    <link href="css/keya.css" rel="stylesheet">
    <link href="css/neeru.css" rel="stylesheet">
    <link href="css/mudathir.css" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form name="loginForm" action="" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-12">
                            <label class="f-label">Email*</label>
                            <input type="email" name="txtEmail" class="f-input" placeholder="Email">
                        </div>

                        <div class="col-12">
                            <label class="f-label">Password*</label>
                            <input type="password" name="txtPassword" class="f-input" placeholder="Password">
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <?php
    include 'db.php';

    if (isset($_POST['submit']))
     {
        if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
            $email = $_POST['txtEmail'];
            $pswd = $_POST['txtPassword'];

            $result = mysqli_query($conn, "SELECT * FROM login_table WHERE email_id= '$email' AND password= '$pswd' ");

            if ($result) {
                //I have Fetch the row
                $row = mysqli_fetch_array($result);

                //I have check row is null or not
                if ($row) {
                    $username = $row['email_id'];
                    $_SESSION["useremail"] = $username;
                } else {
                    echo "<script>alert('No matching user found.')</script>";
                }
            } else {
                echo "Error executing the query: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Email and password not provided.')</script>";
        }
    }
    ?>





    <!--Navigation and Header Section Start-->
    <nav class="navbar navbar-expand-lg bg_light_blue">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/Logo.png" class="nav-logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service_booking.php">SERVICE BOOKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tutorials.php">TUTORIALS</a>
                    </li>

                    <?php
                    if (isset($_SESSION["useremail"])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" style="padding-top: unset;" href="index.php">
                                <img class="user_logo" src="img/user.png" />
                                <?php echo strtoupper($_SESSION["useremail"]); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">LOGOUT</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <button type="button buttonOrg" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            LOGIN
                        </button>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    
    <!--Navigation and Header Section 1 End-->

   
