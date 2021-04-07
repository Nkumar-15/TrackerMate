<?php
ob_start();
 session_start();
if(!isset($_SESSION['wardenname'])){
    header('Location: ../Login.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../Login.php');
}
?>

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
$query = "SELECT * from prisonertable where Id='$id'"; 
$result = mysqli_query($connection, $query) or die ( mysqli_error($connection));
$row = mysqli_fetch_assoc($result);

// $sql = "SELECT Images from prisonertable where Id='".$id."'";
$image = $row['Images'];
$image_src = 'upload/'.$image;

if(isset($_POST['remark']))
{	 
	 $remarks = $_POST['review'];
	 
	 $sql="UPDATE prisonertable SET Remarks='$remarks' WHERE id='$id'";
	 if (mysqli_query($connection, $sql)) {
		header('Location: WardenPrisoners.php'); 
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($connection);
	 }
	 mysqli_close($connection);
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>Info</title>
  <link rel="icon" type="image/png" href="../img/icon.png">
	<!-- <link rel="stylesheet" href="styles.css"> -->
	<!-- <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> -->
</head>
<style>
   @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #e7e1e1;
}

.wrapper{
  position: absolute;
    top: 50%;
    left: 50%;
  transform: translate(-50%,-50%);
  width: 80%;
  min-height: 80%;
  max-height:90%;
  display: flex;
  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}

.wrapper .left{
  width: 30%;
  background:#df48fa;
  padding: 30px 25px;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  text-align: center;
  color: black;
}

.wrapper .left img{
  border-radius: 5px;
  margin-top: 40px;
}

.wrapper .left h4{
  font-size: 25px;
  margin-top: 10px;
}

.wrapper .left p{
  margin-top: 10px;
  font-size: 20px;
}

.wrapper .right{
  width: 70%;
  background: #fff;
  padding: 30px 25px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.wrapper .right .info,
.wrapper .right .block,
.wrapper .right .projects{
  margin-top: 20px;
}
.wrapper .right .block{
  margin-top: 40px;
}
.wrapper .right .projects{
  margin-top: 40px;
}
.wrapper .right .info h3,
.wrapper .right .block h3,
.wrapper .right .projects h3{
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
  text-transform: uppercase;
  letter-spacing: 5px;
  font-size: 18px;
}

.wrapper .right .info_data,
.wrapper .right .block_data,
.wrapper .right .projects_data{
  display: flex;
  justify-content: space-between;
}

.wrapper .right .info_data .data,
.wrapper .right .block_data .data,
.wrapper .right .projects_data .data{
  width: 45%;
}

.wrapper .right .info_data .data h4,
.wrapper .right .block_data .data h4,
.wrapper .right .projects_data .data h4{
    color: #353c4e;
    margin-top: 4px;
}

.wrapper .right .info_data .data p,
.wrapper .right .block_data .data p,
.wrapper .right .projects_data .data p{
  font-size: 14px;
  margin-top: 8px;
  color: #919aa3;
}

.ipt{
  padding: 4px;
}
.iptbtn{
  padding: 3px;
}
.sdata{
  margin-right: 50px;
}
.wrapper .right .projects_data .data .iptbtn{
    margin-top:5px;
    margin-left: 85px;
}
.adta{
  margin-right: 50px;
}
.wrapper .right .projects_data .data .ipt{
 margin-top: 8px;
}
.wrapper .right .projects_data .data li{
 margin-top: 10px;
 font-weight: 100;
 color: #919aa3;
}
</style>
<body>

<div class="wrapper">
    <div class="left">
        <img src="<?php echo $image_src?>"
        alt="user" width="200">
        <h4><?php echo $row['Id'];?></h4>
         <p><?php echo $row['PrisonerName'];?></p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Prisoner Details</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Age</h4>
                    <p><?php echo $row['Age'];?></p>
                 </div>
                 <div class="data">
                   <h4>Gender</h4>
                    <p><?php echo $row['Gender'];?></p>
                </div>
                <div class="data">
                   <h4>No of Crimes</h4>
                    <p><?php echo $row['Crimes'];?></p>
                </div>
                 <div class="data">
                   <h4>Address</h4>
                    <p><?php echo $row['Prisoner_address'];?></p>
                </div>
                 <div class="data">
                   <h4>Identification Marks</h4>
                    <p><?php echo $row['Identification_marks'];?></p>
                </div>  
            </div>
        <div class="block">
            <h3>Block Details</h3>
             <div class="block_data">
             <div class="data">
                   <h4>Block</h4>
                    <p><?php echo $row['BlockAt'];?></p>
                </div>
                 <div class="data">
                   <h4>A Block</h4>
                    <p><?php echo $row['A_Block'];?></p>
                </div>
                 <div class="data">
                   <h4>B Block</h4>
                    <p><?php echo $row['B_Block'];?></p>
                </div>
                 <div class="data">
                   <h4>C Block</h4>
                    <p><?php echo $row['C_Block'];?></p>
                </div>
            </div>
        </div>
      
      <div class="projects">
            <h3>Credit Points</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4> Points</h4>
                    <p><?php echo $row['Credit_points'];?></p>
                 </div>
                        <?php
                          $status = "";
                          if(isset($_POST['dec5']) )
                          {
                          $update= "UPDATE `prisonertable` SET Credit_points = Credit_points- 5 WHERE `Id` = '$id'";
                          mysqli_query($connection, $update) or die(mysqli_error($connection));
                          // header('Location: WardenPrisoners.php'); 
                          }
                       ?>
                        <?php
                          $status = "";
                          if(isset($_POST['dec4']) )
                          {
                          $update= "UPDATE `prisonertable` SET Credit_points = Credit_points- 4 WHERE `Id` = '$id'";
                          mysqli_query($connection, $update) or die(mysqli_error($connection));
                          // header('Location: WardenPrisoners.php'); 
                          }
                       ?>
                        <?php
                          $status = "";
                          if(isset($_POST['dec1']) )
                          {
                          $update= "UPDATE `prisonertable` SET Credit_points = Credit_points- 1 WHERE `Id` = '$id'";
                          mysqli_query($connection, $update) or die(mysqli_error($connection));
                          // header('Location: WardenPrisoners.php'); 
                          }
                       ?>
                        <?php
                          $status = "";
                          if(isset($_POST['dec2']) )
                          {
                          $update= "UPDATE `prisonertable` SET Credit_points = Credit_points- 2 WHERE `Id` = '$id'";
                          mysqli_query($connection, $update) or die(mysqli_error($connection));
                          // header('Location: WardenPrisoners.php'); 
                          }
                       ?>
                        <?php
                          $status = "";
                          if(isset($_POST['dec3']) )
                          {
                          $update= "UPDATE `prisonertable` SET Credit_points = Credit_points- 3 WHERE `Id` = '$id'";
                          mysqli_query($connection, $update) or die(mysqli_error($connection));
                          // header('Location: WardenPrisoners.php'); 
                          }
                       ?>
                  <div class="data sdata">
                    <h4> -1</h4>
                    <form name="form" method="POST" action="">
                      <p><input name="dec1" type="submit" value="-1" style="padding:8px;padding-right:20px;text-align:center" /></p>
                    </form>
                  </div>
                  <div class="data sdata">
                    <h4> -2</h4>
                    <form name="form" method="POST" action="">
                      <p><input name="dec2" type="submit" value="-2" style="padding:8px;padding-right:20px;text-align:center" /></p>
                    </form>
                  </div>
                  <div class="data sdata">
                    <h4> -3</h4>
                    <form name="form" method="POST" action="">
                      <p><input name="dec3" type="submit" value="-3" style="padding:8px;padding-right:20px;text-align:center" /></p>
                    </form>
                  </div>
                  <div class="data sdata">
                    <h4> -4</h4>
                    <form name="form" method="POST" action="">
                      <p><input name="dec4" type="submit" value="-4" style="padding:8px;padding-right:20px;text-align:center" /></p>
                    </form>
                  </div>
                  <div class="data sdata">
                    <h4> -5</h4>
                    <form name="form" method="POST" action="">
                      <p><input name="dec5" type="submit" value="-5" style="padding:8px;padding-right:20px;text-align:center" /></p>
                    </form>
                  </div>
            </div>
        </div>
        <div class="projects">
      <h3>Remarks</h3>
      <div class="projects_data">
        <div class="data">
          <h4>Remarks</h4>
          <li><?php echo $row['Remarks'];?></li>
        </div>
        <div class="data">
          <h4> Add Remarks</h4>
          <form action=""method="POST">
            <p><textarea id="review" name="review" rows="4" cols="50"><?php echo $row['Remarks'];?></textarea></p>
            <input name="remark" type="submit" value="Add" style="padding:8px;padding-right:20px;text-align:center" /></p>
          </form>
        </div>
      </div>
     </div>
    </div>
</div>
</body>
</html>