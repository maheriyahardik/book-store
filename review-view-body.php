<?php
// review-view-body.php

include 'db.php'; // Make sure to replace with your actual database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u_id = filter_var($_POST['u_id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $rating = filter_var($_POST['rating'], FILTER_SANITIZE_NUMBER_INT);
    $feedback = filter_var($_POST['feedback'], FILTER_SANITIZE_STRING);

    // Validate input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    if ($rating < 1 || $rating > 5) {
        die("Rating must be between 1 and 5.");
    }
    if (!is_numeric($u_id) || $u_id < 1) {
        die("Invalid User ID.");
    }
    if (empty($feedback)) {
        die("Feedback cannot be empty.");
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO reviews (u_id, r_name, r_email, rate, feedback) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issis", $u_id, $name, $email, $rating, $feedback);

    if ($stmt->execute()) {
      header("Location: review.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
