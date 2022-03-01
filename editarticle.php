<!DOCTYPE html>
<?php
    require_once('func.php');
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
        <input type="text" name="ingress" value="<?=$row['ingress']?>">
        <input type="text" name="text" value="<?=$row['text']?>">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="hidden" name="added" value="<?=$row['added']?>">
        <div class="fullformdiv">
            <input type="range" name="status" id="lvl" min="1" max="100" value="<?=$row['status']?>" onchange="showLevel()">
            <span id="nrlevel"></span>
        </div>
        <input type="submit" value="Submit changes" name="btn">
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