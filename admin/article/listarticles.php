<!DOCTYPE html>
<?php 
    require_once('../../func.php');

    if(!isset($_SESSION['level'])) header("Location: index.php");

    $conn=makeConn('can');

    $sql="SELECT * FROM tblarticle ORDER BY author DESC, added DESC";
    $result=mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
<?php require_once("../../includes/_aheader.php"); ?>
<?php require_once("../../includes/_menu.php"); ?>
    
        <div class="main">
        <div class="container"><h1>List of articles</h1><?php if(isLevel(80)){ ?><a href="addarticle.php"><img src="../../icons/add64.png"></a><?php } ?></div>
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="row">
                        <details>
                            <summary><?=$row['head']?></summary>
                            <p><?=$row['ingress']?></p>
                        </details>
                        <div class="list_by">By:&nbsp;&nbsp;<span class="list_mono"><?=getRealName($row['author'])?></span>&nbsp;&nbsp;Status:&nbsp;&nbsp;<span class="list_mono"><?=getStatusString(intval($row['status']))?></span></div>
                        <div class="list_added">Added:<span class="list_mono"><?=fixDate($row['added'])?></span></div>
                        <div>
                            <?php if(isLevel(80)){ ?><a href="delarticle.php?del=<?=$row['id']?>"><img src="../../icons/delete.png"></a><?php } ?>
                            <?php if(isLevel(80)){ ?><a href="editarticle.php?edit=<?=$row['id']?>"><img src="../../icons/edit.png"></a><?php } ?>
                        </div>
                    </div>
            <?php  } ?>
        </div>
        <?php require_once("../../includes/_footer.php"); ?>      
</body>
</html>