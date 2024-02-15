<?php
include 'header.php';
include 'db.php';

$bookingErr = "";
$date = $time = "";
$MyErr = "";

if (isset($_POST['btnCont'])) {
    // Check if user is logged in
    if (!isset($_SESSION["useremail"])) {
        $MyErr = "Please log in first to book a service.";
    } else {
        $date = $_POST['serv_date'];
        $time = $_POST['serv_time'];

        // Check if the time slot is available
        $sql = "SELECT COUNT(*) as count FROM servicebooking_table WHERE service_date = '$date' AND service_time = '$time'";
        $result = $conn->query($sql);

        if ($result) {
            $count = $result->fetch_assoc()['count'];

            if ($count >= 3) {
                $bookingErr = "Please choose another time or date. This slot is already booked.";
            } else {
                // Redirect to the next page if the slot is available
                echo "<script>window.location.href='service_booking2.php?service_date=$date&service_time=$time';</script>";
                exit();
            }
        } else {
            // Handle query error if necessary
            echo "Error executing query: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Service<span class="text_org"> Booking</span></h1>

    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="valDateTime" >
        <strong>Please</strong>
        Select date and time
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

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
            <form class="row g-3" name="bookingForm_1" action="" onsubmit="return validateForm()" method="post">

                <div class="col-12">
                    <label for="inputAddress" class="f-label">Date*</label>
                    <input type="date" name="serv_date" min="<?php echo date('Y-m-d'); ?>" class="f-input" id="inputDate" placeholder="DD/MM/YYYY">
                </div>

                <div class="col-md-12">
                    <label for="inputState" class="f-label">Time*</label>
                    <select id="inputid" name="serv_time" id="inputTime" class="f-input">
                        <option selected>Choose...</option>
                        <option>10:00-12:00</option>
                        <option>12:00-14:00</option>
                        <option>14:00-16:00</option>
                        <option>16:00-18:00</option>
                    </select>
                </div>

                <div class="col-12 mb-5">
                    <center>
                        <?php /* if (!empty($MyErr)) { */?>
                        <!-- <button type="submit" name="btnCont" class="btn btn-primary btn-lg w-50"
                                disabled>Continue</button> -->

                        <?php /* } else { */
                        ?>
                        <button type="submit" name="btnCont" class="btn btn-primary btn-lg w-50 ">Continue</button>
                        <?php
                        /*
                    } */
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
<script>

    function validateForm() {
        debugger
        // Get the Date and Time input fields
         var dateInput = document.querySelector('input[name="serv_date"]');
         var timeInput = document.querySelector('select[name="serv_time"]');
       
        var valDateTimeDiv = document.getElementById('valDateTime');

        // Get the values of Date and Time
        var dateValue = dateInput.value;
        var timeValue = timeInput.value;

        // Perform validation
        var isValid = true;

        // Check if Date is not empty
        if (!dateValue || timeValue === 'Choose...') {
            debugger
            isValid = false;
            valDateTimeDiv.classList.remove('d-none');
        }

        return isValid;
    }
</script>

<?php
include 'footer.php';
?>