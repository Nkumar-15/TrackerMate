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
echo"<script>alert('Are you sure??');</script>";
$id=$_REQUEST['id'];
$sql="INSERT INTO deleterecords (Id,PrisonerName,Age,Gender,BlockAt,A_Block,B_Block,C_Block,Credit_points,Images,Crimes,Prisoner_address,Identification_marks)
SELECT Id,PrisonerName,Age,Gender,BlockAt,A_Block,B_Block,C_Block,Credit_points,Images,Crimes,Prisoner_address,Identification_marks FROM prisonertable WHERE Id='$id'";
$result1 = mysqli_query($connection,$sql) or die ( mysqli_error($connection));
$query = "DELETE FROM prisonertable WHERE Id='$id'"; 
$result = mysqli_query($connection,$query) or die ( mysqli_error($connection));
header("Location: WardenPrisoners.php"); 
?>