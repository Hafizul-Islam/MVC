<?php include 'resources/views/layout/header.php' ?>
<?php include 'resources/views/layout/search.php' ?>

<article class="postcontent">
	<?php 
		foreach ($searchPost as $key => $value) {
	?>
		<div class="post">
			<h2> <a href="<?php echo BASE_URL;?>Index2/viewSingle/<?php echo $value['id']; ?>"><?php echo $value['title']; ?> </a> </h2>
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
