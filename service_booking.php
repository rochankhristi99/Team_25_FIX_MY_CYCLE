<?php
include 'header.php';
include 'db.php';

$bookingErr = "";
$date = $time = "";
$MyErr = "";

// Check if $_SESSION["useremail"] exists
if (!isset($_SESSION["useremail"])) {
    // Redirect or handle the case where user email is not set
    $MyErr = "Please Login first to book service.";
}

if (isset($_POST['btnCont'])) {
    $date = $_POST['serv_date'];
    $time = $_POST['serv_time'];

    // Check if there are already more than three records with the same date and time
    $sql = "SELECT COUNT(*) as count FROM servicebooking_table WHERE service_date = ? AND service_time = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $date, $time);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count >= 3) {
        $bookingErr = "Please select another time or date. This time slot is already booked.";
    } else {
        // Proceed to the next page if the time slot is available
        echo "<script>window.location.href = 'service_booking2.php?service_date=$date&service_time=$time';</script>";
        exit();
    }
}

$conn->close();
?>

<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Service<span class="text_org"> Booking</span></h1>


    <?php if (!empty($MyErr)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Opps..</strong>
            <?php echo $MyErr; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>

    <?php if (!empty($bookingErr)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps..</strong>
            <?php echo $bookingErr; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>


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
                        <option>10:00-12:00</option>
                        <option>12:00-14:00</option>
                        <option>14:00-16:00</option>
                        <option>16:00-18:00</option>
                    </select>
                </div>

                <div class="col-12 mb-5">
                    <center>
                        <?php if (!empty($MyErr)) { ?>
                            <button type="submit" name="btnCont" class="btn btn-primary btn-lg w-50" disabled>Continue</button>

                        <?php } else {
                            ?>
                            <button type="submit" name="btnCont" class="btn btn-primary btn-lg w-50 ">Continue</button>
                            <?php
                        }

                        ?>

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