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
            $_SESSION['id']=$raden['id'];
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
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/icon.css">
</head>
<body>
<?php require_once("includes/_header.php"); ?>
<?php require_once("includes/_menu.php"); ?>

    <?php if(isset($_SESSION['level']) ){ ?>
            <form method="post" action="index.php" class="log">
                <input type="submit" name="logout" value="Log out!">
            </form>
    <?php }else{  ?>
    <form method="post" action="index.php" class="log">
        <i class=".profile.icon"></i><h1>Log in</h1>
        <input type="text" name="usr" placeholder="Användarnamn">
        <input type="password" name="pwd">
        <input type="submit" name="btn" value="Log in!">
    </form>
    <?php  } ?> 

<div class="main">


    <?php
        $sql="SELECT tblarticle.head, tblarticle.ingress, tblarticle.text, tbluser.realname FROM tblarticle INNER JOIN tbluser ON tblarticle.author=tbluser.id;";
        $result=mysqli_query($conn, $sql);
        while($rad=mysqli_fetch_assoc($result)){
            echo "<div class='article'>";
            echo "<h2>".$rad['head']."</h2>";
            echo "<div class='ingress'>".$rad['ingress']."</div>";
            echo "<div class='text'>".$rad['text']."</div>";
            echo "<div class='byline'>".$rad['realname']."</div>";
            echo "</div>";
        }

?>
</div>
    <?php require_once("includes/_footer.php"); ?>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function(){
    let mess="<?=$msg?>";
     if(mess.length){
         alert(mess);
     } 
    })

     </script>