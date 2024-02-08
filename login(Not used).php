<?php
include 'db.php';

if(isset($_POST['submit'])) 
{
if(isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) 
{
    $email = $_POST['txtEmail'];
    $pswd = $_POST['txtPassword'];

    $result = mysqli_query($conn, "SELECT * FROM login_table WHERE email_id= '$email' AND password= '$pswd' ");

    if($result) 
    {
        //I have Fetch the row
        $row = mysqli_fetch_array($result);

        //I have check row is null or not
        if($row) 
        {
            $username= $row['email_id']; 
            $_SESSION["useremail"] = $username;
        } 
        else 
        {
            echo "<script>alert('No matching user found.')</script>";
        }
    } 
    else 
    {
        echo "Error executing the query: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Email and password not provided.')</script>";
}
}
?>

<?php
/*
include 'db.php';
$email = $_POST['txtEmail'];
$pswd = $_POST['txtPassword'];
$result = mysqli_query($conn, "SELECT * FROM login_table WHERE email_id= '$email' AND password= '$pswd' ");
$row = mysqli_fetch_array($result);
$username= $row['email_id']; 
echo "Hello, ".$username;
*/?>
