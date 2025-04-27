<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $b_id = isset($_POST['b_id']) ? intval($_POST['b_id']) : 0;
    $cardNumber = isset($_POST['cardNumber']) ? htmlspecialchars($_POST['cardNumber']) : '';
    $cardName = isset($_POST['cardName']) ? htmlspecialchars($_POST['cardName']) : '';
    $expiryDate = isset($_POST['expiryDate']) ? htmlspecialchars($_POST['expiryDate']) : '';
    $cvv = isset($_POST['cvv']) ? htmlspecialchars($_POST['cvv']) : '';
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.0;

    // Replace with actual payment processing code
    // For example, call the payment API with the provided details

    $paymentSuccess = true; // Simulate successful payment

    if ($paymentSuccess) {
        // Prepare an SQL statement for inserting the payment details into the credit_cards table
        $stmt = $con->prepare("INSERT INTO credit_cards (b_id, card_number, card_name, expiry_date, cvv, amount) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssd", $b_id, $cardNumber, $cardName, $expiryDate, $cvv, $amount);

        if ($stmt->execute()) {
            header("Location: payment_d.php?b_id=" . $b_id . "&amount=" . $amount);
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Payment failed. Please try again.";
    }

    $con->close();
}
?>
