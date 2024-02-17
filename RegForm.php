<?php
@session_start();
include 'header.php';
include 'db.php'; 
$MyMsg = '';

if (isset($_POST['submitReg'])) {

    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $confirm_password = $_POST['confirm_password'];

    $check_email = "SELECT * FROM login_table WHERE email_id = '$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        $MyErr = "Email already exists. Please choose a different email.";
    } else {
        $insert_reg_query = "INSERT INTO registration_table (username, first_name, last_name, email_id, contact_no) VALUES ('$username', '$first_name', '$last_name', '$email', '$contact_no')";

        if (mysqli_query($conn, $insert_reg_query)) {
            $reg_id = mysqli_insert_id($conn);

            $insert_login_query = "INSERT INTO login_table (username,email_id, password, reg_id_fk) VALUES ('$username','$email', '$confirm_password', '$reg_id')";
            if (mysqli_query($conn, $insert_login_query)) {
                $MyMsg = "Registration successful.";

            } else {
               // echo "Error inserting record into login table: " . mysqli_error($conn);
               echo "<script>window.location.href = 'ErrorPage.php';</script>";

            }
        } else {
           // echo "Error inserting record into registration table: " . mysqli_error($conn);
           echo "<script>window.location.href = 'ErrorPage.php';</script>";
        }
    }

    // Close database connection
    mysqli_close($conn);
}
?>
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Regi<span class="text_org">stration</span></h1>

    <?php if (!empty($MyMsg)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done</strong>
            <?php echo $MyMsg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>

    <?php if (!empty($MyErr)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Opps...</strong>
            <?php echo $MyErr; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <form class="row g-3" name="regForm" action="" method="post" onsubmit="return validateForm()">

                <div class="col-12">
                    <label for="inputeUsername" class="f-label">USERNAME*</label>
                    <input type="text" name="username" class="f-input valid" id="reg_id" placeholder="Username" required>
                    <p id="Registration_idError" class="text-danger"></p>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label">FULL NAME*</label>
                    <input type="text" name="first_name" class="f-input valid" placeholder="First Name" id="f_name" required>
                    <p id="fnameError" class="text-danger"></p>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label"><br></label>
                    <input type="text" name="last_name" class="f-input valid" placeholder="Last Name" id="l_name" required>
                    <p id="lnameError" class="text-danger"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">EMAIL*</label>
                    <input type="email" name="email" class="f-input" id="email" placeholder="Email" required>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">CONTACT*</label>
                    <input type="text" name="contact_no" maxlength="13" minlength="13" class="f-input" id="contact"
                        placeholder="Contact" required>
                    <p id="contactError" class="text-danger"></p>
                </div>


                <div class="col-12">
                    <label for="inputPswd" class="f-label">Password*</label>
                    <div class="password-input-container" style="position: relative;">
                        <input type="password"  class="f-input password" name="password" id="password">
                        <span class="toggle-eye" onclick="togglePasswordVisibility()">
                            <i id="eyeIcon" class="fa fa-eye eyeIcon"></i>
                        </span>
                    </div>
                    <p id="PaswdError" class="text-danger"></p>
                </div>

                <div class="col-12">
                    <label for="inputPswd" class="f-label">CONFIRM Password*</label>
                    <div class="password-input-container" style="position: relative;">
                        <input type="password"  class="f-input password2" name="confirm_password" id="confpassword">
                        <span class="toggle-eye" onclick="togglePasswordVisibility2()">
                            <i id="eyeIcon" class="fa fa-eye eyeIcon"></i>
                        </span>
                    </div>
                    <p id="confpasswordError" class="text-danger"></p>
                </div>

                <div class="col-12 mb-5">
                    <center>

                        <button type="submit" name="submitReg" class="btn btn-primary btn-lg w-50 mt-5">Submit</button>

                    </center>
                </div>

            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<script>
 
</script>

<script>
    
    // function to validate Username 
    function validateUsername() {
        const reg_id = document.getElementById('reg_id').value;
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
        const f_name = document.getElementById('f_name').value;
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
        const l_name = document.getElementById('l_name').value;
        const lnameError = document.getElementById('lnameError');

        if (l_name.length < 3 || l_name.length > 20) {
            lnameError.innerHTML = "Last name must be 3 - 20 characters";
            return false;
        } else {
            lnameError.innerHTML = "";
            return true;
        }
    }

    // function to validate email
    // function validateEmail() {
    //     const email = document.getElementById('email').value;
    //     const emailError = document.getElementById('emailError');

    //     if (email === "" || !email.includes("@")) {
    //         emailError.innerHTML = "Please enter a valid email address";
    //         return false;
    //     } else {
    //         emailError.innerHTML = "";
    //         return true;
    //     }
    // }

    // function to validate Contact 
    function validateContact() {
        const contact = document.getElementById('contact').value;
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
    const password = document.getElementById('password').value;
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

    function validateConfirmPassword() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confpassword').value;
        const confirmPasswordError = document.getElementById('confpasswordError');

        if (password !== confirmPassword) {
            confirmPasswordError.innerHTML = "Passwords do not match";
            return false;
        } else {
            confirmPasswordError.innerHTML = "";
            return true;
        }
    }

    document.getElementById("reg_id").addEventListener("input", validateUsername);
    document.getElementById("f_name").addEventListener("input", validateFname);
    document.getElementById("l_name").addEventListener("input", validateLname);
    // document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("password").addEventListener("input", validatePassword);

    document.getElementById("confpassword").addEventListener("input", validateConfirmPassword);
    document.getElementById("contact").addEventListener("input", validateContact);


    function validateForm() {
        debugger
        // Perform all validation checks
        var isUsernameValid = validateUsername();
        var isFirstnameValid = validateFname();
        var isLastnameValid = validateLname();
       // var isEmailValid = validateEmail();
        var isContactValid = validateContact();
        var isPasswordValid = validatePassword();
        var isConfirmPasswordValid = validateConfirmPassword();

        // Check if all validations pass
        if (isUsernameValid && isFirstnameValid && isLastnameValid /*&& isEmailValid*/ && isContactValid && isPasswordValid && isConfirmPasswordValid) {
            return true;
        } else {

            return false;
        }
    }
</script>

<?php include 'footer.php' ?>