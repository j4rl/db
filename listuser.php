<!DOCTYPE html>
<?php 
    require_once('func.php');


    if(!isset($_SESSION['level'])) header("Location: index.php");

    $conn=makeConn('can');

    $sql="SELECT * FROM tbluser ORDER BY level DESC, lastlogin DESC";
    $result=mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php require_once("_aheader.php"); ?>
<?php require_once("_menu.php"); ?>
    
        <div class="main">
            <h1>List of users</h1>
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="row">
                        <span class="real"><?=$row['realname']?></span><br>
                        <span class="user"><?=$row['user']?></span><br>Level: <?=$row['level']?><br>
                        <span class="pass"><?=$row['pass']?></span><br>
                        <span class="time"><?=lastLogin($row['id'])?></span><br>
                        <div>
                        <?php if(isLevel(80)){ ?><a href="deluser.php?del=<?=$row['id']?>"><img src="delete.png"></a><?php } ?>
                        <?php if(isLevel(80)){ ?><a href="edituser.php?edit=<?=$row['id']?>"><img src="edit.png"></a><?php } ?>
                        </div>
                    </div>
            <?php  } ?>
        </div>
</body>
</html>