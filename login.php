<?php
include 'db.php';

// Check if email and password are set in $_POST
if(isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
    $email = $_POST['txtEmail'];
    $pswd = $_POST['txtPassword'];

    // Prepare and execute the query
    $result = mysqli_query($conn, "SELECT * FROM login_table WHERE email_id= '$email' AND password= '$pswd' ");

    // Check if any rows were returned
    if($result) {
        // Fetch the row
        $row = mysqli_fetch_array($result);

        // Check if $row is not null
        if($row) {
            $username= $row['email_id']; 
            echo $row['email_id'];
            print_r($row); // Print the entire row
        } else {
            echo "No matching user found.";
        }
    } else {
        echo "Error executing the query: " . mysqli_error($conn);
    }
} else {
    echo "Email and password not provided.";
}
?>
