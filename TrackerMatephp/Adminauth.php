<?php  
 require('db_connect.php');

 include "db_connect.php";

if (isset($_POST['admin_email']) and isset($_POST['admin_password'])){
	
// Assigning POST values to variables.
$username = $_POST['admin_email'];
$password = $_POST['admin_password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `admin` WHERE Admin_Id='$username' and Password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

    $_SESSION['adminname']=$username;
    
    header("location:http://localhost/TrackerMatephp/dash/AdminDashboard.php");

//echo "Login Credentials verified";
// echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

}else{
    header("location:Login.php?msg=invalid");
}
}
?>