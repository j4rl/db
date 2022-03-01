<!DOCTYPE html>
<?php
    require_once('func.php');
    $conn=makeConn('can');
    
    if(isset($_POST['btn'])){
        $head=$_POST['head'];
        $ingress=$_POST['ingress'];
        $text=$_POST['text'];
        $added=date("U");
        $user=$_SESSION['id'];
        $sql="INSERT INTO tblarticle (head, ingress, text, added, author) VALUES('$head','$ingress', '$text', $added, $user)";
        $result=mysqli_query($conn, $sql);
        header("Location: listarticle.php");
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add user</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php require_once("_aheader.php"); ?>
<?php require_once("_menu.php"); ?>
<div class="main">
    <form method="post" action="adduser.php">
        <input type="text" name="head" placeholder="Article header">
        <input type="text" name="ingress" placeholder="Ingress">
        <input type="text" name="text" placeholder="Text">
        <input type="submit" value="Add article" name="btn">
    </form>
</div>
</body>
</html>