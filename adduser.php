<!DOCTYPE html>
<?php
    $dbserver="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="brak";
    $conn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);

    if(isset($_POST['btn'])){
        $user=$_POST['usr'];
        $pass=md5($_POST['pwd']);
        $sql="INSERT INTO `tbluser`(`username`, `password`) VALUES ('$user','$pass')";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add user</title>
</head>
<body>
    <form method="post" action="adduser.php">
        <input type="text" name="usr">
        <input type="password" name="pwd">
        <input type="submit" value="Add user" name="btn">
    </form>
    <?php
        $sql="SELECT * FROM `tbluser`";
        $result=mysqli_query($conn,$sql);
        
        while($row=mysqli_fetch_assoc($result)){
            echo $row['username']."<br>";
        }
    ?>
</body>
</html>