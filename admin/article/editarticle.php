<!DOCTYPE html>
<?php
    require_once('../../func.php');
    $conn=makeConn('can');

    //Is editform submitted?
    if(isset($_POST['btn'])){
        $id=$_POST['id'];
        $head=$_POST['head'];
        $ingress=$_POST['ingress'];
        $text=$_POST['text'];
        $added=intval($_POST['added']);
        $status=intval($_POST['status']);
        $sql="UPDATE tblarticle SET head='$head', ingress='$ingress', text='$text', added=$added, status=$status, author=$auth WHERE id=$id";
        $result=mysqli_query($conn, $sql);
        header("Location: listarticles.php");
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit user</title>
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
<?php require_once("../../includes/_aheader.php"); ?>
<?php require_once("../../includes/_menu.php"); ?>
 
<div class="main">
    <?php
//first time around, lets check if we got a redirection from listuser (is there a $_GET)?
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql="SELECT * FROM tblarticle WHERE id=$id";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
?>
    <form method="post" action="editarticle.php"><h1>Edit article</h1>
        <input type="text" name="head" value="<?=$row['head']?>">
        <textarea name="ingress" style="resize:vertical;" rows="4"><?=$row['ingress']?></textarea>
        <textarea name="text" style="resize:vertical;" rows="10"><?=$row['text']?></textarea>
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="hidden" name="added" value="<?=$row['added']?>">
        <div class="fullformdiv">
            <input type="range" name="status" id="lvl" min="1" max="10" value="<?=$row['status']?>" onchange="showLevel()">
            <span id="nrlevel"></span>
        </div>
        <input type="submit" value="Submit changes" name="btn">
    </form>

<?php  } ?>

</div>  
<?php require_once("../../includes/_footer.php"); ?>       
</body>
</html>
<script>
        function showLevel(){
        var level=document.getElementById('lvl').value;
        document.getElementById('nrlevel').innerHTML=level;
        }
        showLevel();



</script>
