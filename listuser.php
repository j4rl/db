<!DOCTYPE html>
<?php 
    $dbserver="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="can";
    $conn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);

    $sql="SELECT * FROM tbluser";
    $result=mysqli_query($conn, $sql);
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
    <h1>List of users</h1>
        <div class="list">
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="row">
                        <span class="user"><?=$row['user']?></span> Level: <?=$row['level']?><br>
                        <span class="pass"><?=$row['pass']?></span><br>
                        <a href="deluser.php?del=<?=$row['id']?>">Delete</a><br>
                        <a href="edituser.php?edit=<?=$row['id']?>">Edit</a>
                    </div>
            <?php  } ?>
        </div>
</body>
</html>