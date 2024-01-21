<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
