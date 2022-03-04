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
            <div class="container"><h1>List of users</h1><?php if(isLevel(80)){ ?><a href="adduser.php"><img src="add64.png"></a><?php } ?></div>
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="row">
                        <div class="real"><?=setIcon($row['level'])?><?=$row['realname']?></div>
                        Username: <span class="mono"><?=$row['user']?></span><br>Level: <span class="mono" onLoad="setIcon();"><?=$row['level']?></span><br>
                        <span class="pass"><?=$row['pass']?></span>
                        Last login: <span class="mono"><?=lastLogin($row['id'])?></span>
                        <div>
                        <?php if(isLevel(80)){ ?><a href="deluser.php?del=<?=$row['id']?>"><img src="delete.png"></a><?php } ?>
                        <?php if(isLevel(80)){ ?><a href="edituser.php?edit=<?=$row['id']?>"><img src="edit.png"></a><?php } ?>
                        </div>
                    </div>
            <?php  } ?>
        </div>
</body>
</html>
