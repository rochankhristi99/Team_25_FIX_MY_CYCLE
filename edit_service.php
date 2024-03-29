<?php
include 'header.php';
include 'db.php';

$MyMsg = '';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM servicebooking_table WHERE servicebooking_id= '$id'");
$row = mysqli_fetch_array($result);


if (isset($_POST['submitUpdate'])) {
    $service_date = $_POST['serv_date'];
    $service_time = $_POST['serv_time'];
    $service_type=$_POST['gridRadios'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $contact_no = $_POST['contact_no'];
    $email_id = $_POST['email_id'];
    $specific_issue = $_POST['specific_issue'];


    // Check if the time slot is available
    $sql = "SELECT COUNT(*) as count FROM servicebooking_table WHERE service_date = '$service_date' AND service_time = '$service_time'";
    $result2 = $conn->query($sql);

    if ($result2) {
        $count = $result2->fetch_assoc()['count'];

        if ($count >= 3) {
            $bookingErr = "Please choose another time or date. This slot is already booked.";
        } else {
            //update
            $query = mysqli_query($conn, "UPDATE servicebooking_table 
           SET service_date='$service_date', 
               service_time='$service_time', 
service_type='$service_type',
               first_name='$first_name', 
               last_name='$last_name', 
               address='$address', 
               city='$city', 
               state='$state', 
               pincode='$pincode', 
               contact_no='$contact_no', 
               email_id='$email_id', 
               specific_issue='$specific_issue' 
           WHERE servicebooking_id='$id'");
            if ($query) {
                $MyMsg = "Service booking information is updated successfully.";
            } else {
                echo "Error updating record in servicebooking_table: " . mysqli_error($conn);
            }

        }
    } else {
        // Handle query error if necessary
        echo "Error executing query: " . $conn->error;
        //echo "<script>window.location.href = 'ErrorPage.php';</script>";
    }

}
?>

<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Service<span class="text_org"> Booking</span></h1>

    <?php if (!empty($MyMsg)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done...</strong>
            <?php echo $MyMsg; ?>
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

            <form class="row g-3" name="bookingForm_2" action="" method="post" onsubmit="return validateBookingForm()">

                <div class="col-md-12">
                    <label for="inputAddress" class="f-label">Date*</label>
                    <input type="date" name="serv_date" min="<?php echo date('Y-m-d'); ?>" class="f-input"
                        id="inputDate" value="<?php echo $row['service_date']; ?>" required placeholder="DD/MM/YYYY">
                </div>

                <div class="col-md-12">
                    <label for="inputState" class="f-label">Time*</label>
                    <select id="inputTime" name="serv_time" class="f-input">
                        <option value=''>Choose...</option>
                        <?php
                        $groups = array("10:00-12:00", "12:00-14:00", "14:00-16:00", "16:00-18:00");
                        foreach ($groups as $time) {
                            $selected = ($row['service_time'] == $time) ? 'selected' : '';
                            echo "<option value='$time' $selected>$time</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-12">

                    <label for="inputEmail4" class="f-label">SERVICE TYPE*</label>
                    <fieldset class="row mb-3">

                        <?php
                        if ($row['service_type'] == 'Door Step Service') {
                            ?>
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
                                <?php
                        } else if ($row['service_type'] == 'Advanced Service') {
                            ?>
                                    <div class="col-sm-12">
                                        <div class="form-check f-input">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                                value="Door Step Service">
                                            <label class="form-check-label" for="gridRadios1">
                                                Door Step Service
                                            </label>
                                        </div>
                                        <div class="form-check f-input">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                                value="Advanced Service" checked>
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
                                    <?php
                        } else {
                            ?>
                                        <div class="col-sm-12">
                                            <div class="form-check f-input">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                                    value="Door Step Service">
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
                                                    value="Pick and Drop" checked>
                                                <label class="form-check-label" for="gridRadios3">
                                                    Pick and Drop
                                                </label>
                                            </div>
                                        <?php
                        }
                        ?>

                                </div>

                    </fieldset>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label">FULL NAME*</label>
                    <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"
                        class="f-input valid myInp" placeholder="First Name" id="inputFname" required>
                    <p id="fnameError" class="text-danger"></p>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label"><br></label>
                    <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"
                        class="f-input valid myInp" placeholder="Last Name" id="inputLname" required>
                    <p id="lnameError" class="text-danger"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">ADDRESS*</label>
                    <input type="text" name="address" value="<?php echo $row['address']; ?>" class="f-input valid myInp"
                        id="inputAddress" placeholder="1234 Main St" required>
                </div>

                <div class="col-md-4">
                    <label for="inputlblCity" class="f-label">CITY*</label>
                    <input type="text" name="city" value="<?php echo $row['city']; ?>" class="f-input myInp"
                        placeholder="CITY" id="inputCity" required>
                    <p id="aplhaError" class="text-danger"></p>
                </div>

                <div class="col-md-4">
                    <label for="inputState" class="f-label">STATE*</label>

                    <select id="inputState" name="state" class="f-input" required>
                        <option value=''>Choose...</option>
                        <?php
                        $groups = array("BANGLADESH", "FINLAND", "INDIA", "NIGERIA");
                        foreach ($groups as $state) {
                            $selected = ($row['state'] == $state) ? 'selected' : '';
                            echo "<option value='$state' $selected>$state</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="inputZip" class="f-label">ZIP*</label>
                    <input type="text" name="pincode" value="<?php echo $row['pincode']; ?>" class="f-input myInp" name
                        placeholder="Zip" id="inputZip" required>
                </div>

                <div class="col-12">
                    <label for="inputCont" class="f-label">CONTACT*</label>
                    <input type="text" name="contact_no" value="<?php echo $row['contact_no']; ?>" class="f-input myInp"
                        maxlength="13" minlength="10" id="inputContact" placeholder="Contact" required>
                    <p id="contactError"></p>
                </div>

                <div class="col-12">
                    <label for="inputemail" class="f-label">EMAIL*</label>
                    <input type="email" name="email_id" value="<?php echo $row['email_id']; ?>" class="f-input myInp"
                        id="inputEmail" placeholder="Email" required>
                </div>

                <div class="col-12">
                    <label for="inputSI" class="f-label">ANY SPECIFIC ISSUE ?</label>
                    <input type="text" name="specific_issue" value="<?php echo $row['specific_issue']; ?>"
                        class="f-input" id="inputSpecIssue" placeholder="Any Specific Issue ?"></input>
                </div>

                <div class="col-12 mb-5">
                    <center>

                        <button type="submit" name="submitUpdate"
                            class="btn btn-primary btn-lg w-50 mt-3">Update</button>

                    </center>
                </div>

            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<script>
    // function to validate Fname 
    function validateFname() {
        const f_name = document.getElementById('inputFname').value;
        const fnameError = document.getElementById('fnameError');

        if (f_name.length < 3 || f_name.length > 20) {
            fnameError.innerHTML = "First name must be 3 - 20 characters";
            return false;
        } else {
            fnameError.innerHTML = "";
            return true;
        }
    }

    // function to validate Lname
    function validateLname() {
        const l_name = document.getElementById('inputLname').value;
        const lnameError = document.getElementById('lnameError');

        if (l_name.length < 3 || l_name.length > 20) {
            lnameError.innerHTML = "Last name must be 3 - 20 characters";
            return false;
        } else {
            lnameError.innerHTML = "";
            return true;
        }
    }

    // function to validate Contact 
    function validateContact() {
        const contact = document.getElementById('inputContact').value;
        const contactError = document.getElementById('contactError');

        // Regular expression to match a string that starts with a '+', followed by digits
        var contactRegex = /^\+\d+$/;

        if (contact === "" || !contactRegex.test(contact)) {
            contactError.innerHTML = "Contact number must be start with (+ country code) and only digits e.g. +358 XX XXXXXXX";
            return false;
        } else {
            contactError.innerHTML = "";
            return true;
        }
    }

    function validatAplha() {
        const onlyAplha = document.getElementById('inputCity').value;
        const onlyAplhaErr = document.getElementById('aplhaError');

        var Apharegex = /^[a-zA-Z]+$/;

        if (onlyAplha === "" || !Apharegex.test(onlyAplha)) {
            onlyAplhaErr.innerHTML = "Input must contain only alphabets.";
            return false;
        } else {
            onlyAplhaErr.innerHTML = "";
            return true;
        }
    }

    document.getElementById("inputFname").addEventListener("input", validateFname);
    document.getElementById("inputLname").addEventListener("input", validateLname);
    document.getElementById("inputContact").addEventListener("input", validateContact);
    document.getElementById("inputCity").addEventListener("input", validatAplha);

    function validateBookingForm() {
        debugger
        // Perform all validation checks
        var isFirstnameValid = validateFname();
        var isLastnameValid = validateLname();
        var isContactValid = validateContact();
        var isAplhaValid = validatAplha();

        // Get the input fields
        var inputs = document.querySelectorAll('.myInp');
        var state = document.querySelector('select[name="state"]');
        var val_msg = document.getElementById('validation_msg');
        var isValid = true;

        if (isFirstnameValid && isLastnameValid && isContactValid && isAplhaValid) {
            debugger
            return isValid;
        }
        else {
            debugger
            isValid = false;
        }

        return isValid;
    }

</script>
<?php
include 'footer.php';
?>