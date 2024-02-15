<?php
@session_start();
$loginErr = "";
include 'db.php';
// Check if form is submitted
if (isset($_POST['login_btn'])) {
    $email = $_POST['txtEmail'];
    $pswd = $_POST['txtPassword'];
    $result = mysqli_query($conn, "SELECT * FROM login_table WHERE email_id= '$email' AND password= '$pswd' ");
    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row) {
            $username = $row['email_id'];
            $_SESSION["useremail"] = $username;
            $regId = $row['reg_id_fk'];
            $_SESSION["regId"] = $regId;
            echo "<script>window.location.href = 'home.php';</script>";

        } else {
            //$loginErr = "Username or password is incorrect";
            echo "<script>";
            // echo "document.getElementById('myError').style.display = 'inline';";
            echo "alert('Username or Password is incorrect');";
            echo "</script>";
        }
    } else {
        echo "Error executing the query:" . mysqli_error($conn);
    }
}
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
        .error {
            color: red;
        }

    </style>
</head>

<body>
    <!-- Modal -->
    <span id="myError" class="error" style="display:none;">Username or password is
        incorrect</span>
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
                            <input type="email" name="txtEmail" class="f-input" id="txtEmail" placeholder="Email"
                                style="margin-bottom: 6px;" required>
                            <span id="emailError" class="error"></span><br><br>
                        </div>

                        <div class="col-12">
                            <label class="f-label">Password*</label>
                            <input type="password" name="txtPassword" class="f-input" id="txtPassword"
                                placeholder="Password" style="margin-bottom: 30px;" maxlength="12" minlength="6"
                                required>
                            <span id="passwordError" class="error"></span>
                            <span class="error" id="error">
                                <?php echo $loginErr; ?>
                            </span>

                        </div>
                        <a class="f-label" href="RegForm.php">registration ?</a>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" name="login_btn" onclick="validateForm()"
                            class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--Navigation and Header Section Start-->
    <nav class="navbar navbar-expand-lg bg_light_blue">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img src="img/Logo.png" class="nav-logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">HOME</a>
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" style="padding-top: unset;" href="profile.php">
                                <img class="user_logo" src="img/user.png" />
                                <?php /* echo strtoupper($_SESSION["useremail"]);*/ ?>
                            </a>
                        </li> -->
                        
                        <li class="nav-item" id="userDropdown">
                            <a class="nav-link" href="#" onclick="toggleDropdown()">
                                <img class="user_logo" src="img/user.png" />
                                <?php echo strtoupper($_SESSION["useremail"]); ?>
                            </a>
                            <div class="dropdown-menu" id="dropdownContent">
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <a class="dropdown-item" href="view_service.php">My Services</a>
                                <!-- Add more dropdown items as needed -->
                            </div>
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
                        <!-- <a href="login_page.php" class="btn btn-primary">LOGIN</a> -->
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        // function validateForm() {
        //     debugger
        //     var email = document.getElementById("txtEmail").value;
        //     var password = document.getElementById("txtPassword").value;


        //     if (!email.includes("@")) {
        //         document.getElementById("emailError").innerHTML = "Please enter a valid email address.";
        //         return false;
        //     }
        //     else if (password.length > 12 || password.length < 6) {
        //         document.getElementById("passwordError").innerHTML = "Password must be between 6-12 characters only.";


        //         return false;
        //     } else {
        //         document.loginForm.submit();
        //         return true;
        //     }
        // }
        var currentMyPage = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        for (var i = 0; i < navLinks.length; i++) {
            var link = navLinks[i];
            var linkHref = link.getAttribute('href');

            if (linkHref === currentMyPage) {
                link.classList.add('active');
                break; // Once found, no need to continue loop
            }
        }


        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.nav-link')) {
                var dropdownContent = document.getElementById("dropdownContent");
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                }
            }
        }

    </script>