<?php
include 'header.php';
include 'db.php';

// Second form submission
if (isset($_POST['submitBooking'])) {

    if (isset($_GET['service_date'], $_GET['service_time'])) {
        $service_date = $_GET['service_date'];
        $service_time = $_GET['service_time'];
        

    }  else {

        echo "Error: Service date, time, or type not set.";
    }
    $service_type =$_POST['gridRadios'];
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

    // Insert data into database
    $sql = "INSERT INTO servicebooking_table(service_type, service_date, service_time, first_name, last_name, address, city, state, pincode, contact_no, email_id, specific_issue, payment_status) 
    VALUES('$service_type', '$service_date', '$service_time', '$first_name', '$last_name', '$address', '$city', '$state', '$pincode', '$contact_no', '$email_id', '$specific_issue', '$payment_status')";

    if (mysqli_query($conn, $sql)) {
        //$bookingErr = "<script>alert('Service Booked Successfully')</script>";
        echo "<script>window.location.href = 'payment_cards.php';</script>";
   
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
$conn->close();
?>
<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Service<span class="text_org"> Booking</span></h1>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <form class="row g-3" name="bookingForm_2" action="" method="post">

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
                    <input type="text" name="first_name" class="f-input" placeholder="First Name" id="inputEmail4">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label"><br></label>
                    <input type="text" name="last_name" class="f-input" placeholder="Last Name" id="inputPassword4">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">ADDRESS*</label>
                    <input type="text" name="address" class="f-input" id="inputAddress" placeholder="1234 Main St">
                </div>

                <div class="col-md-4">
                    <label for="inputCity" class="f-label">CITY*</label>
                    <input type="text" name="city" class="f-input" placeholder="CITY" id="inputCity">
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
                    <input type="text" name="pincode" class="f-input" name placeholder="Zip" id="inputZip">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">CONTACT*</label>
                    <input type="text" name="contact_no" class="f-input" id="inputAddress" placeholder="Contact">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">EMAIL*</label>
                    <input type="email" name="email_id" class="f-input" id="inputAddress" placeholder="Email">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">ANY SPECIFIC ISSUE ?*</label>
                    <textarea type="text" name="specific_issue" class="f-input" id="inputAddress"
                        placeholder="Any Specific Issue ?"></textarea>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label text_org">PAYMENT*</label>
                    <h6 class="my-3"><em>Visiting Charge : 10 €</em></h5>

                        <h5 class="text_org mb-3">Payment Amount: 10 €</h4>
                            <a href="https://codepen.io/tarun-sai/full/yLNBoed" target="_blank"> <img class="w-25"
                                    src="https://forms.app/static/img/paypal/card.png"></a>
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

<?php
include 'footer.php';
?>