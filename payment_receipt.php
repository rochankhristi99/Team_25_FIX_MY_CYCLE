<?php
include 'header.php';
include 'db.php';

$MyMsg = '';
$a = $_GET['id'];
$result = mysqli_query($conn, "SELECT p.*, sb.first_name, sb.last_name, sb.service_date, sb.service_time, sb.address, sb.city, sb.state, sb.pincode, sb.contact_no, sb.email_id, sb.specific_issue 
                                FROM payment p
                                INNER JOIN servicebooking_table sb ON p.servicebooking_id_fk = sb.servicebooking_id
                                WHERE p.id = '$a'");

if (!$result) {
    // Query failed, handle the error
    echo "Error: " . mysqli_error($conn);
} else {
    $row = mysqli_fetch_array($result);

    // Data variables from service_booking table
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $service_date = $row['service_date'];
    $service_time = $row['service_time'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $pincode = $row['pincode'];
    $contact_no = $row['contact_no'];
    $email_id = $row['email_id'];
    $specific_issue = $row['specific_issue'];
}

?>

<style>
    p {
        color: red;
    }
</style>
<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Booking<span class="text_org"> Receipt</span></h1>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="receipt">
                <h2>Booking Details</h2>
                <?php if (isset($cardholder_name)): ?>
                    <p><strong>Cardholder Name:</strong> <?php echo $cardholder_name; ?></p>
                    <p><strong>First Name:</strong> <?php echo $fname; ?></p>
                    <p><strong>Last Name:</strong> <?php echo $lname; ?></p>
                    <p><strong>Date:</strong> <?php echo $service_date; ?></p>
                    <p><strong>Time:</strong> <?php echo $service_time; ?></p>
                    <p><strong>Address:</strong> <?php echo $address; ?></p>
                    <p><strong>City:</strong> <?php echo $city; ?></p>
                    <p><strong>State:</strong> <?php echo $state; ?></p>
                    <p><strong>Pincode:</strong> <?php echo $pincode; ?></p>
                    <p><strong>Contact Number:</strong> <?php echo $contact_no; ?></p>
                    <p><strong>Email:</strong> <?php echo $email_id; ?></p>
                    <p><strong>Specific Issue:</strong> <?php echo $specific_issue; ?></p>
                <?php else: ?>
                    <p>No data found for this payment ID.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>

</div>
<!--Main Content Section End-->

<?php
include 'footer.php';
?>
