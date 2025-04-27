<?php
session_start();
include 'db.php'; // Ensure this file contains your database connection code

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_var($_POST['u_name'], FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phno = $_POST['phno'];

    $errors = [];

    // Validate input
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (strlen($password) < 4) {
        $errors[] = "Password must be at least 4 characters long.";
    }
    if (!preg_match('/^[0-9]+$/', $phno)) {
        $errors[] = "Phone number must be numeric.";
    }

    if (empty($errors)) {
        // Prepare the statement with the correct column names
        $stmt = $conn->prepare("INSERT INTO users (u_name, email, password, phno) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $phno);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful.";
            header('Location: register.php');
            exit();
        } else {
            $_SESSION['errors'][] = "Error: " . $stmt->error;
            header('Location: register.php');
            exit();
        }

        $stmt->close();
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }

    $conn->close();
}
?>
