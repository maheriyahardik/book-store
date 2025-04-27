<?php
session_start();
include 'connection.php';

// Set the default timezone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');

// Check if user is logged in
if (!isset($_SESSION['u_id'])) {
    echo "You need to be logged in to place an order.";
    exit();
}

if (isset($_GET['b_id'])) {
    $book_id = $_GET['b_id'];
    $user_id = $_SESSION['u_id']; // Assuming user is logged in and user_id is stored in session

    $date = date("Y-m-d H:i:s"); // Get the current date and time in IST

    // Check if the book exists
    $bookQuery = "SELECT * FROM books WHERE b_id='$book_id'";
    $bookResult = mysqli_query($con, $bookQuery);
    if (mysqli_num_rows($bookResult) == 0) {
        echo "Invalid book ID.";
        header("Location: index.php");
        exit();
    }

    // Check if the user exists (though this should normally not be necessary since the user is logged in)
    $userQuery = "SELECT * FROM users WHERE u_id='$user_id'";
    $userResult = mysqli_query($con, $userQuery);
    if (mysqli_num_rows($userResult) == 0) {
        echo "Invalid user ID.";
        header("Location: index.php");
        exit();
    }

    // Insert order into the orders table
    $query = "INSERT INTO orders (u_id, b_id,order_date) VALUES ('$user_id', '$book_id', '$date')";
    if (mysqli_query($con, $query)) {
        echo "Order placed successfully!";
        header("Location: book.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid book ID.";
}
?>
