<div class="searchoption">
	<div class="menu">
		<a href="<?php echo BASE_URL."Index2/home";?>">Home</a>
	</div>
	<div class="search">
		<form action="<?php echo BASE_URL."Index2/search";?>" method="post">
			<input type="text" name="searchKey" placeholder="Search here....">
			<select name="catId" id="" class="categorysearch">
				<option value="">select one</option>
				<?php 
					foreach ($cat as $key => $value) {
				?>
					<option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
				<?php 
					}
				?>
			</select>
			<button class="btncls" type="submit">search</button>
		</form>
	</div>
</div>