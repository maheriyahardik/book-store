<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "book") or die(mysqli_connect_error());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a_name = isset($_POST['a_name']) ? htmlspecialchars(trim($_POST['a_name'])) : '';
    $a_email = isset($_POST['a_email']) ? htmlspecialchars(trim($_POST['a_email'])) : '';
    $phno = isset($_POST['phno']) ? htmlspecialchars(trim($_POST['phno'])) : '';
    $a_city = isset($_POST['a_city']) ? htmlspecialchars(trim($_POST['a_city'])) : '';
    $a_image = isset($_FILES['a_image']) ? $_FILES['a_image'] : null;

    $errors = [];

    // Validate input fields
    if (empty($a_name)) {
        $errors[] = "Author name is required.";
    }
    if (!filter_var($a_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match('/^[0-9]{10}$/', $phno)) {
        $errors[] = "Invalid phone number. Please enter a 10-digit phone number.";
    }
    if (empty($a_city)) {
        $errors[] = "Author city is required.";
    }
    if ($a_image && $a_image['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Error uploading the image.";
    }

    // Check if there are any errors
    if (empty($errors)) {
        // Process the image upload
        $upload_dir = "Newfolder/";
        $upload_file = $upload_dir . basename($a_image['name']);

        if (move_uploaded_file($a_image['tmp_name'], $upload_file)) {
            // Insert data into the database
            $q = "INSERT INTO authors (author_name, author_email, author_number, author_city, author_img) VALUES ('$a_name', '$a_email', '$phno', '$a_city', '$upload_file')";

            if (mysqli_query($conn, $q)) {
                header("Location: authoradd.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to upload image.";
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
