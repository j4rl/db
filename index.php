<!DOCTYPE html>
<?php
    session_start();
    $dbserver="localhost";
    $dbuser="root";
    $dbpass="";
    $db="can";
    $conn=mysqli_connect($dbserver, $dbuser, $dbpass, $db);
    $msg="";
    if(isset($_POST['btn'])){
        $user=$_POST['usr'];
        $pass=md5($_POST['pwd'].$user);
        $sql="SELECT * FROM tbluser WHERE user='$user' AND pass='$pass'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
            $raden=mysqli_fetch_assoc($result);
            $_SESSION['user']=$raden['user'];
            $_SESSION['level']=$raden['level'];
            $msg="Välkommen användare ".$raden['user']."!";
        }else{
            $_SESSION['user']="";
            $_SESSION['level']="";
            $msg="Fel användarnamn eller lösenord!";
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php require_once("_nav.php") ?>
    <?php if(isset(intval($_SESSION['level'])) ){

     }else{  ?>
    <form method="post" action="index.php">
        <input type="text" name="usr" placeholder="Användarnamn">
        <input type="password" name="pwd">
        <input type="submit" name="btn" value="Logga in!">
    </form>
    <?php  } ?> 
    <?=$msg?> 

</body>
</html>