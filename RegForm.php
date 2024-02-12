<?php
$title = "Registration Form";
include 'header_2.php'?>

<form method="post" action="header_2.php">
Username: <input type="text" name="registration_id" required minlength="4"> <br><br>
Fname: <input type="text" name="first_name" required> <br><br>
Lname: <input type="text" name="last_name" required> <br><br>
Email: <input type="email" name="email_id" required> <br><br>
Contact: <input type="number" name="contact_no" > <br><br>
Password <input type="password" name="password" required min="6"> <br><br>
<input type="submit" value="submit">
</form>

<?php include 'footer.php'?>