<?php  
 require('db_connect.php');

 include "db_connect.php";

if (isset($_POST['warden_email']) and isset($_POST['warden_password'])){
	
// Assigning POST values to variables.
$username = $_POST['warden_email'];
$password = $_POST['warden_password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `warden` WHERE Warden_Id='$username' and Warden_Password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

    $_SESSION['wardenname']=$username;

    header("location:http://localhost/TrackerMatephp/dash/WardenDashboard.php");

//echo "Login Credentials verified";
// echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

}else{
    header("location:Login.php?msg=invalid");
//echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
}
?>