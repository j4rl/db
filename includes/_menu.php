<nav>
    <a href="/index.php">Home</a>
    <?php if(isLevel(50)){ ?><a href="/admin/user/listuser.php">List user</a><?php } ?>
    <?php if(isLevel(50)){ ?><a href="/admin/article/listarticles.php">List articles</a><?php } ?>
</nav>