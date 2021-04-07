<?php
include 'db_connect.php';
if(isset($_POST['save']))
{	 
	 $id = $_POST['id'];
	 $name = $_POST['name'];
	 $age = $_POST['age'];
     $gender = $_POST['gender'];
     $block = $_POST['block'];
     $ablock = $_POST['ablock'];
     $bblock = $_POST['bblock'];
     $cblock = $_POST['cblock'];
	 $sql = "INSERT INTO prisonertable (Id,PrisonerName,Age,Gender,BlockAt,A_Block,B_Block,C_Block)
	 VALUES ('$id','$name','$age','$gender','$block','$ablock','$bblock','$cblock')";
	 if (mysqli_query($connection, $sql)) {
    echo"<script>alert('Data Added Sucessfully!!')</script>";
  }
   else {
    echo"<script>alert('User Already exist')</script>";
    // echo "Error: " . $sql . " " . mysqli_error($connection);
	 }
	 mysqli_close($connection);
}