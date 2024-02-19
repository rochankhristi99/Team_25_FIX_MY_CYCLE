<?php
/*$service_date = "2024-02-20";
$time_range = "14:00-23:00";

$current_datetime = new DateTime();
$current_date = $current_datetime->format('Y-m-d');
$current_time = $current_datetime->format('H:i');

list($start_time, $end_time) = explode('-', $time_range);


if ($current_date == $service_date) {
    if (strtotime($current_time) < strtotime($start_time)) {
        echo "It's coming soon.";
    } elseif (strtotime($current_time) >= strtotime($start_time) && strtotime($current_time) <= strtotime($end_time)) {
        echo "It is now.";
    } else {
        echo "It's already passed.";
    }
} else {
    echo "Service date has not arrived yet.";
}*/
?>
<?php
include 'db.php';
$query = "SELECT * FROM servicebooking_table";
$result = mysqli_query($conn, $query); // Use $connection instead of $conn

if ($result && mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
        // $service_date = $row['service_date'];
        // $service_time = $row['service_time'];
        $service_date = $row['service_date'];
        $time_range = $row['service_time'];
        $id = $row['servicebooking_id'];
        $status = $row['service_status'];


        $current_datetime = new DateTime();
        $current_date = $current_datetime->format('Y-m-d');
        $current_time = $current_datetime->format('H:i');
        list($start_time, $end_time) = explode('-', $time_range);


        if ($current_date == $service_date) {
            if (strtotime($current_time) < strtotime($start_time)) {
                //echo "It's coming soon.";
            } elseif (strtotime($current_time) >= strtotime($start_time) && strtotime($current_time) <= strtotime($end_time)) {
                //echo "It is now.";
                $update_query = "UPDATE servicebooking_table SET service_status = 'In Process' WHERE servicebooking_id = '$id'";
                mysqli_query($conn, $update_query);
            } else {
                //echo "It's already passed.";
                $update_query = "UPDATE servicebooking_table SET service_status = 'Completed' WHERE servicebooking_id = '$id'";
                mysqli_query($conn, $update_query);
            }
        } else if ($current_date > $service_date && $status=='Pending' ) {
            //echo "Service date has already passed." . "    ";
            $update_query = "UPDATE servicebooking_table SET service_status = 'Completed' WHERE servicebooking_id = '$id'";
            mysqli_query($conn, $update_query);
        } else {
            //echo "Service date has not arrived yet." . "    ";
        }
    }
} else {
    echo "No records found.";
}

// Close connection
mysqli_close($conn);
?>