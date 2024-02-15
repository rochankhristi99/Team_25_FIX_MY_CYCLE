<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardHolderName = $cardNumber = $expDate = $cvv = "";

    // Validate card holder name
    if (empty($_POST["inputEmail"])) {
        $cardHolderNameErr = "Card holder name is required";
    } else {
        $cardHolderName = test_input($_POST["inputEmail"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $cardHolderName)) {
            $cardHolderNameErr = "Only letters and white space allowed";
        }
    }

    // Validate card number
    if (empty($_POST["inputCardNumber"])) {
        $cardNumberErr = "Card number is required";
    } else {
        $cardNumber = test_input($_POST["inputCardNumber"]);
        if (!preg_match("/^[0-9]{16}$/", $cardNumber)) {
            $cardNumberErr = "Invalid card number format";
        }
    }

    // Validate exp. date
    if (empty($_POST["inputExpDate"])) {
        $expDateErr = "Expiration date is required";
    } else {
        $expDate = test_input($_POST["inputExpDate"]);
        
    }

    // Validate CVV
    if (empty($_POST["inputCVV"])) {
        $cvvErr = "CVV is required";
    } else {
        $cvv = test_input($_POST["inputCVV"]);
        if (!preg_match("/^[0-9]{3,4}$/", $cvv)) {
            $cvvErr = "Invalid CVV";
        }
    }

    // If all fields are valid, process the payment
    if (empty($cardHolderNameErr) && empty($cardNumberErr) && empty($expDateErr) && empty($cvvErr)) {
        

        echo "Payment processed successfully!";
    } else {
        
        echo "Validation errors occurred.";
    }
}

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>