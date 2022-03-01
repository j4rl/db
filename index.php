<!DOCTYPE html>
<?php
    require_once('func.php');
    
    $conn=makeConn('can');
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
            $msg="Welcome ".$raden['realname']."!";
            $id=$raden['id'];
            setNewUserLoginTime($id);
        }else{
            session_destroy();
            $msg="Wrong username or password!<br>...loser!";
        }
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: index.php");
    } 

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php require_once("_header.php"); ?>
<?php require_once("_menu.php"); ?>

    <?php if(isset($_SESSION['level']) ){ ?>
            <form method="post" action="index.php" class="log">
                <input type="submit" name="logout" value="Log out!">
            </form>
    <?php }else{  ?>
    <form method="post" action="index.php" class="log">
        <h1>Log in</h1>
        <input type="text" name="usr" placeholder="Användarnamn">
        <input type="password" name="pwd">
        <input type="submit" name="btn" value="Log in!">
    </form>
    <?php  } ?> 

<div class="main">

    <?=$msg?> 
</div>

</body>
</html>