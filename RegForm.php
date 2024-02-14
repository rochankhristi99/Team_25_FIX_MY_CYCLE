<?php
@session_start();
include 'header.php';
include 'db.php'; // Include your database connection file
$MyMsg='';

if (isset($_POST['submitReg'])) {

    // Retrieve form data
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    // $password =  $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Insert data into registration table
    $insert_reg_query = "INSERT INTO registration_table (username, first_name, last_name, email_id, contact_no) VALUES ('$username', '$first_name', '$last_name', '$email', '$contact_no')";

    if (mysqli_query($conn, $insert_reg_query)) {
        // Retrieve the registration ID of the newly inserted record
        $reg_id = mysqli_insert_id($conn);

        // Insert data into login table
        $insert_login_query = "INSERT INTO login_table (email_id, password, reg_id_fk) VALUES ('$email', '$confirm_password', '$reg_id')";
        if (mysqli_query($conn, $insert_login_query)) {
            $MyMsg = "Registration successful.";
      
        } else {
            echo "Error inserting record into login table: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting record into registration table: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<style>
    p {
        color: red;
    }
</style>
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Regi<span class="text_org">stration</span></h1>

    <?php if (!empty($MyMsg)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done</strong>
            <?php echo $MyMsg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>


    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <form class="row g-3" name="regForm" action="" method="post">


                <div class="col-12">
                    <label for="inputeUsername" class="f-label">USERNAME*</label>
                    <input type="text" name="username" class="f-input valid" id="reg_id" placeholder="Username">
                    <p id="Registration_idError">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label">FULL NAME*</label>
                    <input type="text" name="first_name" class="f-input valid" placeholder="First Name" id="f_name">
                    <p id="fnameError"></p>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label"><br></label>
                    <input type="text" name="last_name" class="f-input valid" placeholder="Last Name" id="l_name">
                    <p id="lnameError"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">EMAIL*</label>
                    <input type="email" name="email" class="f-input" id="email" placeholder="Email">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">CONTACT*</label>
                    <input type="number" name="contact_no" class="f-input" id="contact" placeholder="Contact">
                    <p id="contactError"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">PASSWORD*</label>
                    <input type="password" name="password" class="f-input" id="password" placeholder="Password">
                    <p id="passwordError"></p><br>
                </div>


                <div class="col-12">
                    <label for="inputAddress" class="f-label">CONFIRM PASSWORD*</label>
                    <input type="password" name="confirm_password" class="f-input" id="confpassword"
                        placeholder="Confirm Password">
                    <p id="confpasswordError"></p><br>
                </div>

                <div class="col-12 mb-5">
                    <center>

                        <button type="submit" name="submitReg" class="btn btn-primary btn-lg w-50 mt-5">Book</button>

                    </center>
                </div>

            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>


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
    function validateEmail() {
        const email = document.getElementById('email').value;
        const emailError = document.getElementById('emailError');

        if (email === "" || !email.includes("@")) {
            emailError.innerHTML = "Please enter a valid email address";
            return false;
        } else {
            emailError.innerHTML = "";
            return true;
        }
    }

    // function to validate Contact 
    function validateContact() {
        const contact = document.getElementById('contact').value;
        const contactError = document.getElementById('contactError');

        if (contact === "" || !contact.includes("+")) {
            contactError.innerHTML = "Include the country code";
            return false;
        } else {
            contactError.innerHTML = "";
            return true;
        }
    }

    // function to validate password
    function validatePassword() {
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('passwordError');

        if (password.length < 6 || password.length > 20) {
            passwordError.innerHTML = "Password must be 6 - 20 characters";
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

    // event listener for real time validation 
    document.getElementById("reg_id").addEventListener("input", validateUsername);
    document.getElementById("f_name").addEventListener("input", validateFname);
    document.getElementById("l_name").addEventListener("input", validateLname);
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("password").addEventListener("input", validatePassword);
    document.getElementById("confpassword").addEventListener("input", validateConfirmPassword);
    // document.getElementById("contact").addEventListener("input", validateContact);

</script>

<?php include 'footer.php' ?>