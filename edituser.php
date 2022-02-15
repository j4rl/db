<!DOCTYPE html>
<?php
    $dbserver="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="can";
    $conn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);

    //Is editform submitted?
    if(isset($_POST['btn'])){
        $id=$_POST['id'];
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $level=$_POST['level'];
        $sql="UPDATE tbluser SET user='$user', pass='$pass', level=$level WHERE id=$id";
        $result=mysqli_query($conn, $sql);
        header("Location: listuser.php");
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit user</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php require_once("_header.php"); ?>
<?php require_once("_menu.php"); ?>
<h1>Edit user</h1> 
<div class="edit">
    <?php
//first time around, lets check if we got a redirection from listuser (is there a $_GET)?
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql="SELECT * FROM tbluser WHERE id=$id";
        $result=mysqli_query($conn, $sql);
        $user=mysqli_fetch_assoc($result);
?>
    <form method="post" action="edituser.php">
        <input type="hidden" name="id" value="<?=$user['id']?>">
        <input type="text" name="user" value="<?=$user['user']?>">
        <input type="hidden" name="pass" value="<?=$user['pass']?>">
        <input type="range" name="level" id="level" min="1" max="100" value="<?=$user['level']?>" onchange="showLevel()">
        <span id="nrlevel"></span>
        <input type="submit" value="Edit user" name="btn">
    </form>
<?php  } ?>

</div>   
</body>
</html>
<script>
    function showLevel(){
        var nrlevel=document.getElementById("nrlevel");
        var level=document.getElementById("level");
        nrlevel.innerHTML=level.value;
        if(parseInt(level.value)<10){
            level.style.color='red';
        }
        
    }
</script>