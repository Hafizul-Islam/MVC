<?php include 'resources/views/layout/header.php' ?>
<?php include 'resources/views/layout/search.php' ?>
<article class="postcontent">
	<?php 
		foreach ($postById as $key => $value) {

	?>
		<div class="postdetails">
			<div class="title">
				<h2><?php echo $value['title']; ?></h2>
				<p>Category: <a href="<?php echo BASE_URL;?>Index2/viewCategoryPost/<?php echo $value['categoryId']; ?>"><?php echo $value['category_name']; ?> </a></p>
			</div>
			<div class="description">
				<p><?php echo $value['content']; ?> </p>
			</div>
		</div>
	<?php 
		}
	?>
	
</article>

<?php include 'resources/views/layout/sidebar.php' ?>
<?php include 'resources/views/layout/footer.php' ?>
