<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
<?php
$mysqli = new mysqli("localhost", "root", "", "book");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
