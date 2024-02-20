<?php

//$servername = "db";
//$username = "fix_my_cycle";
//$password = "abc@123";
//$dbname = "fix_my_cycle_db";

$servername = "localhost";
$username = "bbcap23_25";
$password = "pkZhEBdh";
$dbname = "wp_bbcap23_25";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>