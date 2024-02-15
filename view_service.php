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

    <h1 class="text_title mb-5 text-center">My<span class="text_org"> Service</span></h1>

    <?php if (!empty($MyMsg)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done</strong>
            <?php echo $MyMsg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } ?>

    <div class="row">
        <div class="col-lg-12">
                <?php
                include 'db.php';

                // SQL query to retrieve data from the 'service' table
                $sql = "SELECT * FROM servicebooking_table";

                // Execute the SQL query and store the result
                $result = $conn->query($sql);

                // Check if there are any results
                if ($result->num_rows > 0) {
                    echo "<table class='table'>
        <thead>
            <tr>

                <th>Service Date</th>
                <th>Service Time</th>
                <th>Service Type</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact No</th>
                <th>Email ID</th>
                <th>Specific Issue</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";

                    // Loop through the result set and display data in rows
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>

            <td>{$row['service_date']}</td>
            <td>{$row['service_time']}</td>
            <td>{$row['service_type']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>    
            <td>{$row['contact_no']}</td>
            <td>{$row['email_id']}</td>
            <td>{$row['specific_issue']}</td>
            <td><a class='btn btn-info' href='edit_service.php?id={$row['servicebooking_id']}'>Update/Delete</a></td>
        </tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    // Display a message if no results are found
                    echo "No results";
                }

                // Close the connection when done
                $conn->close();
                ?>




        </div>
       
    </div>




</div>
<!--Main Content Section End-->


<?php
include 'footer.php';
?>