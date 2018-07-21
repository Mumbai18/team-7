<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"mysql");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



 $email=$_POST['email'];
 $password=$_POST['password'];

// $email=stripcslashes($email);
// $password=stripcslashes($password);
// $email=mysql_real_escape_string($email);
// $password=mysql_real_escape_string($password); 


//mysql_select_db("login");

 $sql = "SELECT * from authenticate_user where email='$email' and password='$password'";
$runquery1=mysqli_query($conn, $sql);
$count=mysqli_num_rows($runquery1);
if ($count==1) {
	$_SESSION['email']=$email;
    header("Location: myProfile_m/index.php");
} else {
  
    	echo "<script>alert(' Incorrect username or password ')</script>";
	echo "<script>window.open('index.php','_self')</script>";
  
}
$conn->close();


?>

    
  