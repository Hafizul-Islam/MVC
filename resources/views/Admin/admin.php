<?php include 'resources/views/layout/header.php' ?>

Admin page <hr/>
<?php include 'resources/views/Admin/adminLeft.php' ?>

<article class="adminright">
	<h2>Welcome to <?php echo session::get("username"); ?></h2>
</article>
<?php include 'resources/views/layout/footer.php' ?>