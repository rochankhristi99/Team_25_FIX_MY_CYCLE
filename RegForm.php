<?php
$title = "Registration Form";
include 'header.php';
include 'header_2.php'?>

<form method="post" action="header .php">
Username: <input type="text" name="registration_id" required minlength="4" maxlength="15" id="reg_id"> <br><br>
<p id= "Registration_idError"></p><br>

Fname: <input type="text" name="first_name" required minlength="4" maxlength="30" id="F_name"> <br><br>
<p id= "fnameError"></p><br>

Lname: <input type="text" name="last_name" required minlength="4" maxlength="30" id="L_name"> <br><br>
<p id= "lnameError"></p><br>

Email: <input type="email" name="email_id" required id="email"> <br><br>
<p id= "emailError"></p><br>

Contact: <input type="number" name="contact_no" id="contact"> <br><br>
<p id= "contactError"></p><br>

Password <input type="password" name="password" required min="6" maxlength="15" id="password"> <br><br>
<p id= "passwordError"></p><br>

<button  type="submit" name="submit"> Submit</button>
</form>

<script>
// function to validate Username 
function validateUsername(){
    const Username= document.getElementById(reg_id.value);
    const UsernameError= document.getElementById(reg_id.valueError)

    if (reg_id.length < 4 || reg_id.length > 20){
        reg_idError.innerHTML = "Username must be 4 - 20 characters";
    return false;
    }

    else{
        reg_idError.innerHTML ="";
        return truth;
    }

}

// function to validate Fname 
function validateFname(){
    const fname= document.getElementById(f_name.value);
    const fnameError= document.getElementById(f_name.valueError)

    if (fname.length < 3 || fname.length > 20){
        fnameError.innerHTML = "First name must be 3 - 20 characters";
    return false;
    }

    else{
        f_nameError.innerHTML ="";
        return truth;
    }

}

// function to validate Lname
function validateLname(){
    const lname= document.getElementById(l_name.value);
    const lnameError= document.getElementById(l_name.valueError)

    if (lname.length < 3 || lname.length > 20){
        lnameError.innerHTML = "Last name must be 3 - 20 characters";
    return false;
    }

    else{
        lnameError.innerHTML ="";
        return truth;
    }

}

// function to validate email
function validateEmail(){
    const email= document.getElementById(email.value);
    const emailError= document.getElementById(email.valueError)

    if (email === "" || !email.include("@")){
        emailError.innerHTML = "Please enter a valid email address";
    return false;
    }

    else{
        emailError.innerHTML ="";
        return truth;
    }
}

// function to validate Contact 
function validateContact (){
    const Contact= document.getElementById(contact.value);
    const ContactError= document.getElementById(contact.valueError)

    if (contact.length === "" || !contat.include("+")){
        reg_idError.innerHTML = "Include the country code";
    return false;
    }

    else{
      contactError.innerHTML ="";
        return truth;
    }

}

// function to validate password
function validatePassword(){
    const password= document.getElementById(password.value);
    const passwordError= document.getElementById(password.valueError)

    if (password.length < 6 || reg_id.length > 20){
        passwordError.innerHTML = "Password must be 6 - 20 characters";
    return false;
    }

    else{
        passwordError.innerHTML ="";
        return truth;
    }

}

// event listener for real time validation 
document.getElementById("reg_id").addEventlistener("input", validateUsername);
document.getElementById("f_name").addEventlistener("input", validateFname);
document.getElementById("l_name").addEventlistener("input", validateLname);
document.getElementById("email").addEventlistener("input", validateEmail);
document.getElementById("password").addEventlistener("input", validatePassword);
document.getElementById("contact").addEventlistener("input", validateContact);

</script>

<?php include 'footer.php'?>