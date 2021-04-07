<?php
ob_start();
session_start();
if(!isset($_SESSION['adminname'])){
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
$query = "SELECT * from prisonertable where Id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ( mysqli_error($connection));
$row = mysqli_fetch_assoc($result);
$image = $row['Images'];
$image_src = "upload/".$image;
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
  max-height: 85%;
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
  /* border:2px white solid; */
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
.wrapper .right .log{
  margin-top: 20px;
}
.wrapper .right .block{
  margin-top: 40px;
}
.wrapper .right .log{
  margin-top: 40px;
}
.wrapper .right .info h3,
.wrapper .right .block h3,
.wrapper .right .log h3{
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
.wrapper .right .log_data{
  display: flex;
  justify-content: space-between;
}

.wrapper .right .info_data .data,
.wrapper .right .block_data .data,
.wrapper .right .log_data .data{
  width: 45%;
}

.wrapper .right .info_data .data h4,
.wrapper .right .block_data .data h4,
.wrapper .right .log_data .data h4{
    color: #353c4e;
    margin-top: 4px;
}

.wrapper .right .info_data .data p,
.wrapper .right .block_data .data p,
.wrapper .right .log_data .data p{
  font-size: 14px;
  margin-top: 8px;
  color: #919aa3;
}


</style>
<body>
  <div class="wrapper">
    <div class="left">
      <img src="<?php echo $image_src ?>"alt="user" width="200">
      <h4><?php echo $row['Id'];?></h4>
      <p><?php echo $row['PrisonerName'];?></p>
    </div>
    <div class="right">
      <div class="log">
        <h3>Log Details</h3>
        <div class="log_data">
          <div class="data">
            <h4>Source</h4>
            <p><?php echo $row['source'];?></p>
          </div>                 
          <div class="data">
            <h4>Destination</h4>
            <p><?php echo $row['destination'];?></p>
          </div>                 
          <div class="data">
            <h4>Start Time</h4>
            <p><?php echo $row['start_at'];?></p>
          </div>                 
          <div class="data">
            <h4>End Time</h4>
            <p><?php echo $row['end_at'];?></p>
          </div>                 
        </div>      
      </div>
    </div>
  </div>
</body>
</html>