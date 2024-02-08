<?php
$servername = "db";
$username = "fix_my_cycle";
$password = "abc@123";
$dbname = "fix_my_cycle_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>