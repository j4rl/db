<!DOCTYPE html>
<?php
    $dbserver="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="can";
    $conn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);

    if(isset($_POST['btn'])){
        $user=$_POST['usr'];
        $pass=md5($_POST['pwd'].$user);
        $sql="INSERT INTO tbluser(user,pass) VALUES('$user','$pass')";
        $result=mysqli_query($conn, $sql);
        header("Location: listuser.php");
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add user</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php require_once("_aheader.php"); ?>
<?php require_once("_menu.php"); ?>
<div class="main">
    <form method="post" action="adduser.php">
        <input type="text" name="usr">
        <input type="password" name="pwd">
        <input type="submit" value="Add user" name="btn">
    </form>
</div>
</body>
</html>