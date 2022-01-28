<!DOCTYPE html>
<?php
    $dbserver="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="can";
    $conn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add user</title>
</head>
<body>
    <form method="post" action="add.php">
        <input type="text" name="usr">
        <input type="password" name="pwd">
        <input type="submit" value="Add user" name="btn">
    </form>
    <?php
        $sql="SELECT * FROM `tbluser`";
        $result=mysqli_query($conn,$sql);
        
        while($row=mysqli_fetch_assoc($result)){
            echo $row['user']."<br>";
        }
    ?>
</body>
</html>