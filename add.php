<?php
    $dbserver="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="can";
    $conn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);

    $username=$_POST['usr'];
    $password=md5($_POST['pwd'].$username);

    $sql="INSERT INTO tbluser (user, pass) VALUES ('$username', '$password')";
    $result=mysqli_query($conn, $sql);
    header("Location: adduser.php");

?>