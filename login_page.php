<?php
@session_start(); 
include 'header.php';

include 'db.php';
// Check if form is submitted
if (isset($_POST['submit'])) {
    if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
        $email = $_POST['txtEmail'];
        $pswd = $_POST['txtPassword'];

        $result = mysqli_query($conn, "SELECT * FROM login_table WHERE email_id= '$email' AND password= '$pswd' ");

        if ($result) {
            // Fetch the row
            $row = mysqli_fetch_array($result);

            // Check if row is not null
            if ($row) {
                $username = $row['email_id'];

                $_SESSION["useremail"] = $username; 
                header("Location: services.php");
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

    <div class="body_sec">

    <h1 class="text_title mb-5 text-center">Log<span class="text_org">in</span></h1>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form class="row g-3" name="loginForm" action="" method="post">

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
                <div class="col-12 mb-5">
                    <center>
                        <button type="submit" name="btnCont" class="btn btn-primary btn-lg w-50 ">Continue</button>
                    </center>
                </div>
            </div>
        </div>
               

            </form>

            <!-- Second Form -->
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<!--Main Content Section End-->

<?php
include 'footer.php';
?>