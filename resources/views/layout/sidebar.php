<aside class="sidebar">
	<div class="widget">
		<h2>Category</h2>
		<ul>
			<?php 
			foreach ($cat as $key => $value) {
			?>
			<li>
				<a href="<?php echo BASE_URL;?>Index2/viewCategoryPost/<?php echo $value['id']; ?>">
				<?php echo $value['category_name']; ?>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div class="widget">
		<h2>Latest post</h2>
		<ul>
			<?php 
				foreach ($latestpost as $key => $value) {
			?>
			<li><a href="<?php echo BASE_URL;?>Index2/viewSingle/<?php echo $value['id']; ?>">
				<?php echo $value['title']; ?>
				</a>
			</li>

			<?php 
			}
			?>
	
		</ul>
	</div>

</aside>