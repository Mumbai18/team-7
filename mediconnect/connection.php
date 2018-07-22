<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	echo "Connection failure";
    die("Connection failed: " . mysqli_connect_error());
}