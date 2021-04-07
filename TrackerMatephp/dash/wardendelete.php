<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'trackermate');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
$id=$_REQUEST['id'];
$query = "DELETE FROM warden WHERE Warden_Id='$id'"; 
$result = mysqli_query($connection,$query) or die ( mysqli_error($connection));
header("Location: Warden.php"); 
?>