<?php
$servername = "localhost";
$username = "id2718577_mediconnect_admin";
$password = "mediconnect@123";
$dbname="id2718577_mediconnect_database";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>