<?php include 'resources/views/layout/header.php' ?>
<?php include 'resources/views/layout/search.php' ?>

<article class="postcontent">
	<?php 
		foreach ($postBycat as $key => $value) {
	?>
		<div class="post">
			<div class="title">
				<h2><?php echo $value['title']; ?></h2>
				<p>Category: <?php echo $value['category_name']; ?> </p>
			</div>
			<p><?php 

				$text = $value['content']; 
				if(strlen($text)>100){
					$text = substr($text,0,250);
					echo $text;
				}

			?></p>
			<div class="rreadmore"><a href="<?php echo BASE_URL;?>Index2/viewSingle/<?php echo $value['id']; ?>">Read more</a></div>
		</div>
	<?php 
	}
	?>
</article>
<?php include 'resources/views/layout/sidebar.php' ?>

<?php include 'resources/views/layout/footer.php' ?>
