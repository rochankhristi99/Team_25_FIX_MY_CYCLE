<?php
include 'header.php';
include 'db.php';

$MyMsg = '';
$a = $_SESSION["regId"];
$result = mysqli_query($conn, "SELECT * FROM registration_table WHERE registration_id= '$a'");
$row = mysqli_fetch_array($result);


if (isset($_POST['submitUpdate'])) {

    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contactno'];

    $query = mysqli_query($conn, "UPDATE registration_table set username='$uname', first_name='$fname', last_name='$lname',contact_no='$contact' where registration_id='$a'");
    if ($query) {
        $MyMsg = "Your information is updated Successfully.";

    } else {

        echo "Error inserting record into registration table: " . mysqli_error($conn);
    }
}
?>
<style>
    p {
        color: red;
    }
</style>
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

            <form class="row g-3" name="profile_form" action="" method="post">


                <div class="col-12">
                    <label for="inputAddress" class="f-label">USERNAME*</label>
                    <input type="text" name="uname" value="<?php echo $row['username']; ?>" class="f-input"
                        id="inputUsername" placeholder="Username">
                        <p id="Registration_idError">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label">FULL NAME*</label>
                    <input type="text" name="fname" value="<?php echo $row['first_name']; ?>" class="f-input"
                        placeholder="First Name" id="inputFirstname">
                        <p id="fnameError"></p>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="f-label"><br></label>
                    <input type="text" name="lname" value="<?php echo $row['last_name']; ?>" class="f-input"
                        placeholder="Last Name" id="inputLastname">
                        <p id="lnameError"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">Contact*</label>
                    <input type="text" name="contactno" value="<?php echo $row['contact_no']; ?>" class="f-input"
                        id="inputContact" placeholder="Contact">
                        <p id="contactError"></p>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="f-label">Email*</label>
                    <input type="email" value="<?php echo $row['email_id']; ?>" class="f-input" id="inputEmail"
                        placeholder="Email" disabled>
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

        if (contact === "" || !contact.includes("+")) {
            contactError.innerHTML = "Include the country code";
            return false;
        } else {
            contactError.innerHTML = "";
            return true;
        }
    }



    // event listener for real time validation 
    document.getElementById("inputUsername").addEventListener("input", validateUsername);
    document.getElementById("inputFirstname").addEventListener("input", validateFname);
    document.getElementById("inputeLastname").addEventListener("input", validateLname);

    //document.getElementById("contact").addEventListener("input", validateContact);

</script>

<?php
include 'footer.php';
?>