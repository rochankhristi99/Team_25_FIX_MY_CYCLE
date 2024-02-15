<?php
include 'header.php';
include 'db.php';
// include 'form4.php';
$MyErr = '';
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_holder_name = $_POST['inputEmail'];
    $card_number = $_POST['inputCardNumber'];
    $exp_date = $_POST['inputExpDate'];
    $cvv = $_POST['inputCVV'];
    $payment_amount = 10; // Hardcoded for simplicity, you may want to retrieve it from the form
    $regId = $_SESSION["regId"];
    $bookingId = $_GET['id'];
    $sql = "SELECT * FROM payment_cards WHERE card_holder_name = '$card_holder_name' AND card_number = '$card_number' AND exp_date = '$exp_date' AND cvv = '$cvv'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Insert record into 'payment' table
            $sql = "INSERT INTO payment (card_holder_name, card_number, payment_amount, payment_date, servicebooking_id_fk, reg_id_fk) VALUES ('$card_holder_name', '$card_number', '$payment_amount', NOW(), '$bookingId', '$regId')";

            if ($conn->query($sql) === TRUE) {
                // Update payment_status in 'servicebooking' table
                $updateSql = "UPDATE servicebooking_table SET payment_status = 'Paid' WHERE servicebooking_id = '$bookingId'";

                if ($conn->query($updateSql) === TRUE) {
                    $MyErr = "Payment Successful.";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "0 results";
    }
}
?>

<div class="body_sec">

  <h1 class="text_title mb-5 text-center">Pay<span class="text_org">ment</span></h1>

  <?php if (!empty($MyErr)) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Done..</strong>
      <?php echo $MyErr; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php } ?>


  <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
      <form class="row g-3" method="post" action="">
        <div id="Form1">
          <div class="col-md-12">
            <label class="f-label">CARD HOLDER NAME*</label>
            <input type="text" name="inputEmail" class="f-input" placeholder="Card Holder Name" required>
          </div>


          <div class="col-md-12">
            <label class="f-label">CARD NUMBER*</label>
            <input type="text" name="inputCardNumber" class="f-input" id="inputAddress" placeholder="XXXX XXXXX XXXXX"
              required>
          </div>

          <div class="row">
            <div class="col">
              <label class="f-label">EXP. DATE*</label>
              <input type="text" name="inputExpDate" class="f-input" placeholder="MM / YY">
            </div>
            <div class="col">
              <label class="f-label">CVV*</label>
              <input type="text" name="inputCVV" class="f-input" placeholder="***">
            </div>
          </div>


          <div class="col-md-12">
            <h6 class="my-3"><em>Visiting Charge : 10 €</em></h5>

              <h5 class="text_org mb-3">Payment Amount: 10 €</h4>
                <a href="https://codepen.io/tarun-sai/full/yLNBoed" target="_blank"> <img class="w-25"
                    src="https://forms.app/static/img/paypal/card.png"></a>
          </div>


          <div class="col-12 mb-5">
            <center>
              <button type="submit" class="btn btn-primary btn-lg w-50 mt-5">Pay 10 €</button>
            </center>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-3">

    </div>
  </div>

</div>
<?php include 'footer.php'; ?>