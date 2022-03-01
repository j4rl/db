<!DOCTYPE html>
<?php 
    require_once('func.php');


    if(!isset($_SESSION['level'])) header("Location: index.php");

    $conn=makeConn('can');

    $sql="SELECT * FROM tblarticle ORDER BY author DESC, added DESC";
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
            <h1>List of articles</h1>
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="row">
                        <span class="head"><?=$row['head']?></span><br>
                        <span class="ingress"><?=$row['ingress']?></span><br>Status: <?=$row['status']?><br>
                        <span class="author"><?=$row['author']?></span><br>
                        <span class="time"><?=$row['added']?></span><br>
                        <div>
                        <?php if(isLevel(80)){ ?><a href="delarticle.php?del=<?=$row['id']?>"><img src="delete.png"></a><?php } ?>
                        <?php if(isLevel(80)){ ?><a href="editarticle.php?edit=<?=$row['id']?>"><img src="edit.png"></a><?php } ?>
                        </div>
                    </div>
            <?php  } ?>
        </div>
</body>
</html>