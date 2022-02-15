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
        $user=$_POST['usr'];
        $pass=$_POST['pwd'];
        $level=$_POST['lvl'];
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
<?php require_once("_aheader.php"); ?>
<?php require_once("_menu.php"); ?>
 
<div class="main"><h1>Edit user</h1>
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
        <input type="text" name="usr" value="<?=$user['user']?>">
        <input type="hidden" name="pwd" value="<?=$user['pass']?>">
        <div class="fullformdiv">
            <input type="range" name="lvl" id="lvl" min="1" max="100" value="<?=$user['level']?>" onchange="showLevel()">
            <span id="nrlevel"></span>
        </div>
        <input type="submit" value="Edit user" name="btn">
    </form>
<?php  } ?>

</div>   
</body>
</html>
<script>
        function showLevel(){
        var level=document.getElementById('lvl').value;
        document.getElementById('nrlevel').innerHTML=level;
        }
        showLevel();



</script>