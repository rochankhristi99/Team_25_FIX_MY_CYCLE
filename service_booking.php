<?php
include 'header.php';
include 'db.php';

$bookingErr = "";
$date = $time = ""; // Initialize variables

// First form submission
if (isset($_POST['btnCont'])) {
    $date = $_POST['serv_date'];
    $time = $_POST['serv_time'];

    // Redirect to the second form page with date and time as query parameters
    echo "<script>window.location.href = 'service_booking2.php?service_date=$date&service_time=$time';</script>";
    exit();
}

$conn->close();
?>


<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Service<span class="text_org"> Booking</span></h1>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form class="row g-3" name="bookingForm_1" action="" method="post">

                <div class="col-12">
                    <label for="inputAddress" class="f-label">Date*</label>
                    <input type="date" name="serv_date" class="f-input" id="inputAddress" placeholder="DD/MM/YYYY">
                </div>

                <div class="col-md-12">
                    <label for="inputState" class="f-label">Time*</label>
                    <select id="inputid" name="serv_time" class="f-input">
                        <option selected>Choose...</option>
                        <option>10:00 - 12:00</option>
                        <option>12:00 - 14:00</option>
                        <option>14:00 - 16:00</option>
                        <option>16:00 - 18:00</option>
                    </select>
                </div>

                <div class="col-12 mb-5">
                    <center>
                        <button type="submit" name="btnCont" class="btn btn-primary btn-lg w-50 ">Continue</button>
                    </center>
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