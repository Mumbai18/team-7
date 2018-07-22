<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	echo "Connection failure";
    die("Connection failed: " . mysqli_connect_error());
}
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$date=date("Y-m-d");
$status="unverified";
$posts="no";
$u_image='my_pic.jpg';

$get_email="SELECT * from authenticate_user where email='$email'";

$runquery=mysqli_query($conn, $get_email);
$check=mysqli_num_rows($runquery);
if ($check==1) {
    echo "<script>alert('Email already registered!');</script>";
    exit();
} 

elseif (strlen($password)<5) {
	 echo "<script>alert('Minimum password length is 5');</script>";
	 exit();
}

else{

$sql = "INSERT INTO authenticate_user(name,email,password,status,registerdate,lastlogin,posts,u_image)
VALUES('$name','$email','$password','$status','$date','$date','$posts','$u_image')";
$runquery1=mysqli_query($conn, $sql);
if ($runquery1) {
    echo "New record created successfully";
     header("Location:myProfile_m/index.php");
} else {
    echo "Failed!!1";
}

// echo "Registration Successful!!!!!!!!!!1";

}
mysqli_close($conn);
?>