<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
?>
<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "book") or die(mysqli_connect_error());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a1 = isset($_POST['sem']) ? htmlspecialchars(trim($_POST['sem'])) : '';
    $a2 = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
    $a3 = isset($_POST['b_price']) ? htmlspecialchars(trim($_POST['b_price'])) : '';
    $a5 = isset($_POST['b_description']) ? htmlspecialchars(trim($_POST['b_description'])) : '';

    $errors = [];

    // Validate input fields
    if (empty($a1)) {
        $errors[] = "Semester is required.";
    }
    if (empty($a2)) {
        $errors[] = "Subject is required.";
    }
    if (empty($a3) || !is_numeric($a3) || $a3 <= 0) {
        $errors[] = "Please enter a valid book price.";
    }
    if (empty($a5)) {
        $errors[] = "Book description is required.";
    }

    $a4 = "Newfolder/" . basename($_FILES['b_image']['name']);
    if (!move_uploaded_file($_FILES['b_image']['tmp_name'], $a4)) {
        $errors[] = "Failed to upload image.";
    }

    // Check if there are any errors
    if (empty($errors)) {
        // Insert data into the database
        $q = "INSERT INTO books (sem, subject, b_price, b_image, b_description) VALUES ('$a1', '$a2', '$a3', '$a4', '$a5')";

        if (mysqli_query($conn, $q)) {
            header("Location: bookadd.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
?>
