<nav>
    <a href="index.php">Home</a>
    <?php if(isLevel(50)){ ?><a href="listuser.php">List user</a><?php } ?>
    <?php if(isLevel(80)){ ?><a href="adduser.php">Add user</a><?php } ?>
</nav>