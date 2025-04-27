<?php
session_start();
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Admin login check
        $stmtAdmin = $con->prepare("SELECT * FROM admins WHERE email = ? AND password = ?");
        $stmtAdmin->bind_param("ss", $email, $password);
        $stmtAdmin->execute();
        $resultAdmin = $stmtAdmin->get_result();

        // User login check
        $stmtUser = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmtUser->bind_param("ss", $email, $password);
        $stmtUser->execute();
        $resultUser = $stmtUser->get_result();

        if ($rowAdmin = $resultAdmin->fetch_assoc()) {
            $_SESSION["admin"] = $rowAdmin;
            header("Location: admin-home.php");
            exit();
        } elseif ($rowUser = $resultUser->fetch_assoc()) {
            $_SESSION["user"] = $rowUser;
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid email or password.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Email and password are required.'); window.location.href='login.php';</script>";
        exit();
    }
}
?>
