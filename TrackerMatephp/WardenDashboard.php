<?php
include "db_connect.php";
if(!isset($_SESSION['wardenname'])){
    header('Location: Login.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: Login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden</title>
    <link rel="icon" href="img/icon.png"size="64x64">
</head>
<body>
    
    <h1>Hello Warden</h1>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
</body>
</html>