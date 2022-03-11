<nav>
    <a href="http://<?=server()?>/db/index.php">Home</a>
    <?php if(isLevel(50)){ ?><a href="http://<?=server()?>/db/admin/user/listuser.php">List user</a><?php } ?>
    <?php if(isLevel(50)){ ?><a href="http://<?=server()?>/db/admin/article/listarticles.php">List articles</a><?php } ?>
</nav>