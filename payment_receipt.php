<?php
include 'header.php';
include 'db.php';

$MyMsg = '';
$a = $_GET['id'];
$result = mysqli_query($conn, "SELECT p.*, sb.first_name, sb.last_name, sb.service_date, sb.service_time, sb.address, sb.city, sb.state, sb.pincode, sb.contact_no, sb.email_id, sb.specific_issue,sb.service_type,sb.payment_status,p.payment_amount,sb.uniqid FROM payment p INNER JOIN servicebooking_table sb ON p.servicebooking_id_fk = sb.servicebooking_id WHERE p.servicebooking_id_fk = '$a';");

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
    $service_type = $row['service_type'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $pincode = $row['pincode'];
    $contact_no = $row['contact_no'];
    $email_id = $row['email_id'];
    $specific_issue = $row['specific_issue'];
    $amount = $row['payment_amount'];
    $payment_status = $row['payment_status'];
    $uniqid = $row['uniqid'];
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
        <div class="col-lg-2"></div>
        <div class="col-lg-8 pb-5">

            <div class="px-5 py-5 bg-white" id="printMe">
                <h2 class="text-center">
                    <img src="img/Logo.png" class="w-50" />
                </h2>
                <hr class="w-100">
                <?php if (isset($fname)): ?>
                    <table class="table w-100">
                    <tr>
                            <th>Booking Number:</th>
                            <td>
                                <?php echo $uniqid; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Customer Name:</th>
                            <td>
                                <?php echo $fname . " " . $lname; ?>
                            </td>
                            <th>Payment by</th>
                            <td>
Bank Card
                            </td>
                        </tr>
                        <tr>
                            <th>Service Date:</th>
                            <td>
                                <?php echo $service_date; ?>
                            </td>
                            <th>Service Time Slot:</th>
                            <td>
                                <?php echo $service_time; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>
                                <?php echo $address . " " . $city; ?><br>
                                <?php echo $state . " " . $pincode; ?><br>
                            </td>
                        </tr>

                        <tr>
                            <th>Contact Number:</th>
                            <td>
                                <?php echo $contact_no; ?>
                            </td>
                            <th>Email:</th>
                            <td>
                                <?php echo $email_id; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Specific Issue:</th>
                            <td>
                                <?php echo $specific_issue; ?>
                            </td>
                        </tr>
                    </table>
                    <hr class="w-100">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sr.No</th>
                            <th>Service Type</th>
                            <th>Amount</th>
                            <th>Payment</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td> <?php echo $service_type; ?></td>
                            <td> <?php echo $amount; ?></td>
                            <td> <?php echo $payment_status; ?></td>
                        </tr>
                    </table>
                <?php else: ?>
                    <p>No data found for this payment ID.</p>
                <?php endif; ?>

                        

            </div>
            <center>
            <button onclick="printDiv('printMe')" class="btn btn-secondary mt-5">Print Receipt</button>
            </center>

        </div>
        <div class="col-lg-2"></div>

    </div>

</div>
<!--Main Content Section End-->
<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
<?php
include 'footer.php';
?>