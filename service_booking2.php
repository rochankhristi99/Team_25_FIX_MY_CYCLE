<?php
@session_start(); 
include 'header.php';
include 'db.php';
$MyErr = "";
// Second form submission

if (isset($_POST['submitBooking'])) {

    if (isset($_GET['service_date'], $_GET['service_time'])) {
        $service_date = $_GET['service_date'];
        $service_time = $_GET['service_time'];
    } else {
        echo "Error: Service date and time are not set.";
        exit();
    }

    $service_type = $_POST['gridRadios'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $contact_no = $_POST['contact_no'];
    $email_id = $_POST['email_id'];
    $specific_issue = $_POST['specific_issue'];
    $payment_status = 0;
    $regId=$_SESSION["regId"];
    // Insert data into database
    $sql = "INSERT INTO servicebooking_table(service_type, service_date, service_time, first_name, last_name, address, city, state, pincode, contact_no, email_id, specific_issue, payment_status,reg_id_fk) 
    VALUES('$service_type', '$service_date', '$service_time', '$first_name', '$last_name', '$address', '$city', '$state', '$pincode', '$contact_no', '$email_id', '$specific_issue', '$payment_status','$regId')";

    if (mysqli_query($conn, $sql)) {
        //$bookingErr = "<script>alert('Service Booked Successfully')</script>";
        echo "<script>window.location.href = 'payment.php';</script>";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
$conn->close();
?>
<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Service<span class="text_org"> Booking</span></h1>
<?php $_SESSION["regId"]; ?>

    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="validation_msg" >
        <strong>Please</strong>
        All (*) filed are required.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>



    <?php if (!empty($MyErr)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Opps..</strong>
            <?php echo $MyErr; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>


    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

        <form class="row g-3" name="bookingForm_2" action="" method="post" onsubmit="return validateBookingForm()">

                <div class="col-md-12">
                    <?php
                    if (isset($date)) {
                        echo $date;
                    }
                    ?>
                    <label for="inputEmail4" class="f-label">SERVICE TYPE*</label>
                    <fieldset class="row mb-3">

                        <div class="col-sm-12">
                            <div class="form-check f-input">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                    value="Door Step Service" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Door Step Service
                                </label>
                            </div>
                            <div class="form-check f-input">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                    value="Advanced Service">
                                <label class="form-check-label" for="gridRadios2">
                                    Advanced Service
                                </label>
                            </div>
                            <div class="form-check f-input">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3"
                                    value="Pick and Drop">
                                <label class="form-check-label" for="gridRadios3">
                                    Pick and Drop
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>


                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label">FULL NAME*</label>
                    <input type="text" name="first_name" class="f-input valid myInp" placeholder="First Name"
                        id="inputFname">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label"><br></label>
                    <input type="text" name="last_name" class="f-input valid myInp" placeholder="Last Name"
                        id="inputLname">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">ADDRESS*</label>
                    <input type="text" name="address" class="f-input valid myInp" id="inputAddress"
                        placeholder="1234 Main St">
                </div>

                <div class="col-md-4">
                    <label for="inputCity" class="f-label">CITY*</label>
                    <input type="text" name="city" class="f-input myInp" placeholder="CITY" id="inputCity">
                </div>

                <div class="col-md-4">
                    <label for="inputState" class="f-label">STATE*</label>
                    <select id="inputState" name="state" class="f-input">
                        <option selected>Choose...</option>
                        <option>BANGLADESH</option>
                        <option>FINLAND</option>
                        <option>INDIA</option>
                        <option>NIGERIA</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="inputZip" class="f-label">ZIP*</label>
                    <input type="text" name="pincode" class="f-input myInp" name placeholder="Zip" id="inputZip">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">CONTACT*</label>
                    <input type="number" name="contact_no"  class="f-input myInp" id="inputContact" placeholder="Contact">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">EMAIL*</label>
                    <input type="email" name="email_id" class="f-input myInp" id="inputEmail" placeholder="Email">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">ANY SPECIFIC ISSUE ?</label>
                    <textarea type="text" name="specific_issue" class="f-input" id="inputAddress"
                        placeholder="Any Specific Issue ?"></textarea>
                </div>

                <div class="col-12 mb-5">
                    <center>

                        <button type="submit" name="submitBooking"
                            class="btn btn-primary btn-lg w-50 mt-5">Book</button>

                    </center>
                </div>

            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<!--Main Content Section End-->
<script>
 function validateBookingForm() {
    debugger
        // Get the input fields
        var inputs = document.querySelectorAll('.myInp');
        var state = document.querySelector('select[name="state"]');
        var val_msg = document.getElementById('validation_msg');
        var isValid = true;

        inputs.forEach(function(input) {
            debugger
            // Check if input is empty
            if (!input.value.trim() || state === 'Choose...') {
                debugger
                isValid = false;
                val_msg.classList.remove('d-none');
            }
        });

        return isValid;
    }
</script>   

<?php
include 'footer.php';
?>