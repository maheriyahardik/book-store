<?php
session_start();
// Clear all session variables
  $_SESSION["admin"] = " ";
$_SESSION["user"] = " ";
session_destroy(); // Destroy the session
header("Location: login.php"); // Redirect to login page
exit();
?>
