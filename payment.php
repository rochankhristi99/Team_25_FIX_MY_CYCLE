<?php
include 'header.php';
include 'db.php';

$MyErr = '';
$notFoundError = "";
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $card_holder_name = $_POST['inputCardHolderName'];
  $card_number = $_POST['inputCardNumber'];
  $exp_date = $_POST['inputExpDate'];
  $cvv = $_POST['inputCVV'];
  $payment_amount = 10; 
  $regId = $_SESSION["regId"];
  $bookingId = $_GET['id'];
  $sql = "SELECT * FROM payment_cards WHERE card_holder_name = '$card_holder_name' AND card_number = '$card_number' AND exp_date = '$exp_date' AND cvv = '$cvv'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $sql = "INSERT INTO payment (card_holder_name, card_number, payment_amount, payment_date, servicebooking_id_fk, reg_id_fk) VALUES ('$card_holder_name', '$card_number', '$payment_amount', NOW(), '$bookingId', '$regId')";

      if ($conn->query($sql) === TRUE) {
        $paymentId = mysqli_insert_id($conn);
        $updateSql = "UPDATE servicebooking_table SET payment_status = 'Paid' WHERE servicebooking_id = '$bookingId'";

        if ($conn->query($updateSql) === TRUE) {
          $MyErr = "Payment Successful.";
        } else {
          //echo "Error updating record: " . $conn->error;
          echo "<script>window.location.href = 'ErrorPage.php';</script>";
        }
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<script>window.location.href = 'ErrorPage.php';</script>";
      }
    }
  } else {
    $notFoundError = "Card Details Not Found";
  }
}
?>

<div class="body_sec">

  <h1 class="text_title mb-5 text-center">Pay<span class="text_org">ment</span></h1>

  <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="validation_msg">
    <strong>Please</strong>
    All (*) filed are required.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>


  <?php if (!empty($MyErr)) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Done..</strong>
      <?php echo $MyErr; ?>
      <br>
      <a href="payment_receipt.php?id=<?php $paymentId ?>">View Receipt</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php } ?>


  <?php if (!empty($notFoundError)) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo $notFoundError; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php } ?>


  <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
      <form class="row g-3" action="" method="post" onsubmit="return validatePaymentForm()">

        <div id="Form1">
          <div class="col-md-12">
            <label class="f-label">CARD HOLDER NAME*</label>
            <input type="text" name="inputCardHolderName" id="inputCardHolderName" class="f-input myInp"
              oninput="this.value = this.value.toUpperCase()" placeholder="Card Holder Name" required>
            <p id="aplhaError" class="text-danger"></p>
          </div>


          <div class="col-md-12">
            <label class="f-label">CARD NUMBER*</label>
            <input type="text" name="inputCardNumber" maxlength="19" class="f-input myInp" id="inputCardNumber"
              placeholder="XXXX-XXXX-XXXX-XXXX" required>
            <p id="cardNumError" class="text-danger"></p>
          </div>

          <div class="row">
            <div class="col">
              <label class="f-label">EXP. DATE*</label>
              <input type="text" name="inputExpDate" id="inputExpDate" class="f-input myInp" placeholder="MM / YY"
                required>
              <p id="expDateError" class="text-danger"></p>
            </div>
            <div class="col">
              <label class="f-label">CVV*</label>
              <input type="text" name="inputCVV" id="inputCVV" class="f-input myInp" placeholder="***" required>
              <p id="cvvError" class="text-danger"></p>
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
<script>

  function validatAplha() {
    const onlyAplha = document.getElementById('inputCardHolderName').value;
    const onlyAplhaErr = document.getElementById('aplhaError');

    var Apharegex = /^[a-zA-Z\s]+$/;

    if (onlyAplha === "" || !Apharegex.test(onlyAplha)) {
      onlyAplhaErr.innerHTML = "Input must contain only alphabets.";
      return false;
    } else {
      onlyAplhaErr.innerHTML = "";
      return true;
    }
  }

  //function for valid card Number
  function validatCardNum() {
    const cardNum = document.getElementById('inputCardNumber').value;
    const cardNumErr = document.getElementById('cardNumError');

    var regex = /^\d{4}-\d{4}-\d{4}-\d{4}$/;

    if (cardNum === "" || !regex.test(cardNum)) {
      cardNumErr.innerHTML = "Invalid card number format.";
      return false;
    } else {
      cardNumErr.innerHTML = "";
      return true;
    }
  }

  //function for valid Exp Date
  function validatExpDate() {
    const expDate = document.getElementById('inputExpDate').value;
    const expDateErr = document.getElementById('expDateError');

    var regex = /^(0[1-9]|1[0-2])\/\d{2}$/;

    if (expDate === "" || !regex.test(expDate)) {
      expDateErr.innerHTML = "Invalid Exp pate format.";
      return false;
    } else {
      expDateErr.innerHTML = "";
      return true;
    }
  }

  //function for valid CVV
  function validatCVV() {
    const cvvInput = document.getElementById('inputCVV').value;
    const cvvInputErr = document.getElementById('cvvError');

    var regex = /^[0-9]{3,4}$/;

    if (cvvInput === "" || !regex.test(cvvInput)) {
      cvvInputErr.innerHTML = "Invalid CVV format.";
      return false;
    } else {
      cvvInputErr.innerHTML = "";
      return true;
    }
  }

  document.getElementById("inputCardHolderName").addEventListener("input", validatAplha);
  document.getElementById("inputCardNumber").addEventListener("input", validatCardNum);
  document.getElementById("inputExpDate").addEventListener("input", validatExpDate);
  document.getElementById("inputCVV").addEventListener("input", validatCVV);

  function validatePaymentForm() {
    debugger
    // Perform all validation checks
    var isCardHoldNumbValid = validatAplha();
    var isCardNumValid = validatCardNum();
    var isExpValid = validatExpDate();
    var isCVVValid = validatCVV();


    if (isCardHoldNumbValid && isCardNumValid && isExpValid && isCVVValid) {
      return true;
    }
    else {
      return false;
    }


    // var inputs = document.querySelectorAll('.myInp');
    // var val_msg = document.getElementById('validation_msg');

    // inputs.forEach(function (input) {
    //   debugger
    //   // Check if input is empty
    //   if (!input.value.trim()) {
    //     val_msg.classList.remove('d-none');
    //     return false;

    //   }
    //   else {
    //     if (isFirstnameValid && isLastnameValid && isContactValid && isAplhaValid) {

    //       return true;
    //     }
    //     else {
    //       return true;
    //     }
    //   }
    // });

  }

</script>


<?php include 'footer.php'; ?>