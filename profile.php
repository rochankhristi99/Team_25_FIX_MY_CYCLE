<?php
include 'header.php';
include 'db.php';


if (isset($_GET['upd'])) {
    if ($_GET['upd'] == 'true') {
        $MyMsg = "Your information is updated Successfully.";
    } else {
        $MyMsg = '';
    }
}

//$MyMsg = '';
$a = $_SESSION["regId"];
$result = mysqli_query($conn, "SELECT * FROM registration_table WHERE registration_id= '$a'");
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($conn, "SELECT * FROM login_table WHERE reg_id_fk= '$a'");
$row2 = mysqli_fetch_array($result2);

if (isset($_POST['submitUpdate'])) {

    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contactno'];
    $pswd = $_POST['inputPswd'];

    $query = mysqli_query($conn, "UPDATE registration_table set username='$uname', first_name='$fname', last_name='$lname',contact_no='$contact' where registration_id='$a'");
    
    $query2 = mysqli_query($conn, "UPDATE login_table set password='$pswd' where reg_id_fk='$a'");
    
    if ($query && $query2) {
        //$MyMsg = "Your information is updated Successfully.";
        echo "<script>window.location.href = 'profile.php?upd=true';</script>";
    } else {

        // echo "Error inserting record into registration table: " . mysqli_error($conn);
        echo "<script>window.location.href = 'ErrorPage.php';</script>";
    }
}
?>

<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">My<span class="text_org"> Profile</span></h1>


    <?php if (!empty($MyMsg)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done</strong>
            <?php echo $MyMsg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>

    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">

            <form class="row g-3" name="profile_form" action="" method="post" onsubmit="return validateForm()">


                <div class="col-12">
                    <label for="inputAddress" class="f-label">USERNAME*</label>
                    <input type="text" name="uname" value="<?php echo $row['username']; ?>" class="f-input"
                        id="inputUsername" placeholder="Username" required>
                    <p id="Registration_idError" class="text-danger">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label">FULL NAME*</label>
                    <input type="text" name="fname" value="<?php echo $row['first_name']; ?>" class="f-input"
                        placeholder="First Name" id="inputFirstname" required>
                    <p id="fnameError" class="text-danger"></p>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label"><br></label>
                    <input type="text" name="lname" value="<?php echo $row['last_name']; ?>" class="f-input"
                        placeholder="Last Name" id="inputLastname" required>
                    <p id="lnameError" class="text-danger"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">Contact*</label>
                    <input type="text" name="contactno" value="<?php echo $row['contact_no']; ?>" class="f-input"
                        id="inputContact" placeholder="Contact" required>
                    <p id="contactError" class="text-danger"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">Email*</label>
                    <input type="email" value="<?php echo $row['email_id']; ?>" class="f-input" id="inputEmail"
                        placeholder="Email" disabled>
                </div>

                <div class="col-12">
                    <label for="inputPswd" class="f-label">Change Password*</label>
                    <div class="password-input-container" style="position: relative;">
                        <input type="password" value="<?php echo $row2['password']; ?>" class="f-input password" name="inputPswd" id="inputPswd">
                        <span class="toggle-eye" onclick="togglePasswordVisibility()">
                            <i id="eyeIcon" class="fa fa-eye eyeIcon"></i>
                        </span>
                    </div>
                    <p id="PaswdError" class="text-danger"></p>
                </div>


                <div class="col-12 mb-5">
                    <center>
                        <button type="submit" name="submitUpdate"
                            class="btn btn-primary btn-lg w-50 mt-5">Update</button>
                    </center>
                </div>


            </form>
        </div>
        <div class="col-lg-3">

        </div>
    </div>

</div>
<!--Main Content Section End-->
<!-- <script>
    function togglePasswordVisibility() {
        var input = document.getElementById("inputPswd");
        var eyeIcon = document.getElementById("eyeIcon");

        if (input.type === "password") {
            input.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script> -->
<script>

    // function to validate Username 
    function validateUsername() {
        const reg_id = document.getElementById('inputUsername').value;
        const reg_idError = document.getElementById('Registration_idError');

        if (reg_id.length < 4 || reg_id.length > 20) {
            reg_idError.innerHTML = "Username must be 4 - 20 characters";
            return false;
        } else {
            reg_idError.innerHTML = "";
            return true;
        }
    }

    // function to validate Fname 
    function validateFname() {
        const f_name = document.getElementById('inputFirstname').value;
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
        const l_name = document.getElementById('inputLastname').value;
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

    // function to validate password
    function validatePassword() {
        debugger
        const password = document.getElementById('inputPswd').value;
        const passwordError = document.getElementById('PaswdError');
        var pswdRegex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}/;
        if (!pswdRegex.test(password)) {
            passwordError.innerHTML = "Must contain at least one number, one uppercase and lowercase letter, and be between 6 and 12 characters long";
            return false;
        } else {
            passwordError.innerHTML = "";
            return true;
        }
    }
    // event listener for real time validation 
    document.getElementById("inputUsername").addEventListener("input", validateUsername);
    document.getElementById("inputFirstname").addEventListener("input", validateFname);
    document.getElementById("inputLastname").addEventListener("input", validateLname);
    document.getElementById("inputContact").addEventListener("input", validateContact);
    document.getElementById("inputPswd").addEventListener("input", validatePassword);

    function validateForm() {

        var isUsernameValid = validateUsername();
        var isFirstnameValid = validateFname();
        var isLastnameValid = validateLname();
        var isContactValid = validateContact();
        var isvalidatePassword = validatePassword();

        if (isUsernameValid && isFirstnameValid && isLastnameValid && isContactValid && isvalidatePassword) {

            return true;
        } else {

            return false;
        }
    }
</script>

<?php
include 'footer.php';
?>